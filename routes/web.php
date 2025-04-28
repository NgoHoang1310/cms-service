<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProxyController;
use Illuminate\Support\Facades\Route;

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
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

//Movie Routes
Route::resource('movies', MovieController::class);

//Category Routes
Route::resource('categories', CategoryController::class);

//Genres Routes
Route::resource('genres', GenresController::class);

Route::get('/proxy-image', function (\App\Services\FirebaseService $firebaseService) {
    $url = request('url');

    if (!$url) {
        return response('Missing URL', 400);
    }

   return $firebaseService->getPublicFileUrl($url);
});

// File Upload Routes
Route::post('/upload', [FileController::class, 'upload']);
Route::post('/upload/temp', [FileController::class, 'uploadTemp']);
Route::delete('/upload/revert', [FileController::class, 'delete']);
Route::delete('/upload/temp/revert', [FileController::class, 'deleteTemp']);

// Proxy Routes
Route::get('/proxy', [ProxyController::class, 'fetch']);

