<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    // Create New User
    public function register()
    {
        return view('users.register');
    }

    // Storing User Data
    public function store(Request $request)
    {
        $userData = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:10', 'confirmed']
        ]);

        // Hashing Password
        $userData['password'] = bcrypt($userData['password']);

        // Creating User
        $user = Users::create($userData);

        auth()->login($user);

        return redirect('/')->with('message', 'User Created Successfully and Logged In ');
    }


    // Log User Out
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged Out Successfully ! ');
    }


    // Logging User In
    public function login()
    {
        return view('users.login');
    }



    // Auth User
    public function auth(Request $request)
    {
        $userData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ''
        ]);

        if (auth()->attempt($userData)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', "You Have Successfully Logged In");
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
