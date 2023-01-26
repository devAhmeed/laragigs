<?php

use App\Models\Jobs;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\UsersController;

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

Route::get('/', [JobsController::class, "index"]); // Index
Route::get('/jobs/create', [JobsController::class, "create"])->middleware('auth'); // Create Job Form

Route::post('/jobs', [JobsController::class, "store"])->middleware('auth'); // Store Job


Route::get('/jobs/{job}/edit', [JobsController::class, "edit"])->middleware('auth'); // Edit Job

Route::put('/jobs/{job}', [JobsController::class, "update"])->middleware('auth'); // Update Job

Route::delete('/jobs/{job}', [JobsController::class, "destroy"])->middleware('auth'); // Delete Job

Route::get('/jobs/manage', [JobsController::class, 'manage'])->middleware('auth');

Route::get('/jobs/{job}', [JobsController::class, "show"]); // Find Job

// User Routes //


// Show User Register
Route::get('/register', [UsersController::class, 'register'])->middleware('guest');

// Create New User
Route::post('/users', [UsersController::class, 'store']);

// Logging User Out
Route::post('/logout', [UsersController::class, 'logout'])->middleware('auth');


// Show Login Form
Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');

// Loggin User In

Route::post('/login/auth', [UsersController::class, 'auth']);
