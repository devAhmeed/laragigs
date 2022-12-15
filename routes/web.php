<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Jobs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('jobs', [
        'jobs' => Jobs::all()
    ]);
});
Route::get('jobs/{id}', function ($id) {
    // $jobs =
    return view('Job', [
        'job' => Jobs::find($id)
    ]);
});


// Route::get('/profile', function (Request $req) {
//     return response($req->name . " " . $req->id)->header('Content-Type', 'application/json');
// });
// Route::get('/profile/{id}', function ($id) {
//     return response($id);
// })->where('id', '[0-9]+');
