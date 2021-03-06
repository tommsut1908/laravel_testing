<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FacebookLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Employee;

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

Route::post('/logout', [UserController::class, 'logOut'])->name('logout')->middleware('auth');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index')->middleware('auth');

Route::get('/employee/getEmployeeDT',[EmployeeController::class, 'getEmployeeDT'])->name('employee.getEmployeeDT')->middleware('auth');

Route::get('/employee/create', function () {
    return view('employee/create');
})->name('employee/create')->middleware('auth');
Route::post('/employee/create', [EmployeeController::class, 'createEmployee'])->middleware('auth');

Route::get('/facebook', [FacebookLoginController::class, 'redirect']);
Route::get('/callback', [FacebookLoginController::class, 'callback']);