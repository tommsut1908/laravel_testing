<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('index');
})->name('home');

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::get('/forgot-password', function () {
    return view('auth/register');
})->name('password.request');

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');

Route::get('/profile-edit', function () {
    return view('profile');
})->name('profile.edit')->middleware('auth');

Route::get('/employee', function () {
    return view('employee/index');
})->name('employee.index')->middleware('auth');

Route::post('/logout', [UserController::class, 'logOut'])->name('logout')->middleware('auth');