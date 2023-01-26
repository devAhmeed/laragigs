<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobsController extends Controller
{


    // Show All Jobs
    public function index()
    {
        return view('Jobs.index', [
            'jobs' => Jobs::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Show Specific Job
    public function show(Jobs $job)
    {
        return view('Jobs.show', [
            'job' => $job
        ]);
    }

    // Show Edit Page
    public function edit(Jobs $job)
    {
        if ($job->user_id !== auth()->id()) {
            abort(403, 'Unauthorized Access');
        }
        return view('Jobs.edit', [
            'job' => $job
        ]);
    }

    // Update Job
    public function update(Request $request, Jobs $job)
    {
        if ($job->user_id !== auth()->id()) {
            abort(403, 'Unauthorized Access');
        }
        $newJobData = $request->validate([
            'email' => ['required', 'email'],
            'title' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $newJobData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $job->update($newJobData);

        return back()->with('message', 'Job Updated Sucessfully');
    }

    // Delete Job
    public function destroy(Jobs $job)
    {
        if ($job->user_id !== auth()->id()) {
            abort(403, 'Unauthorized Access');
        }
        $job->delete();
        return redirect('/')->with('message', 'Job deleted sucessfully 😞 ');
    }


    // Show Create Form
    public function create()
    {
        return view('Jobs.create');
    }


    // Save Data To DB
    public function store(Request $request)
    {
        $newJobData = $request->validate([
            'email' => ['required', 'email'],
            'title' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'company' => ['required', Rule::unique('jobs', 'company')],
            'location' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $newJobData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $newJobData['user_id'] = auth()->id();
        Jobs::create($newJobData);



        return redirect('/')->with('message', 'Job Created Sucessfully');
    }

    // Manage Function
    public function manage()
    {
        return view('jobs.manage', ['jobs' => auth()->user()->jobs()->get()]);
    }
}
