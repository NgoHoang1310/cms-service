<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return view('test');
});

// Auth Routes
Route::get('/sign-in', function () {
    return view('auth/sign-in');
});

Route::get('/sign-up', function () {
    return view('auth/sign-up');
});

// Dashboard Routes

Route::get('/', function () {
    return view('dashboard/dash-board');
});

// User Routes
Route::get('/user', [UserController::class, 'index']);
