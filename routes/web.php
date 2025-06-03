<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\PlanController;
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
Route::resource('users', UserController::class);

//Movie Routes
Route::resource('movies', MovieController::class);
Route::post('/movies/{movie}/update-status', [MovieController::class, 'updateStatus']);

//Series Routes
Route::get('/series/seasons', [SeasonController::class, 'listSeries'])->name('series.seasons.list-series');
Route::get('/series/episodes', [EpisodeController::class, 'listSeries'])->name('series.episodes.list-series');
Route::get('/series/{series_id}/seasons/episodes', [EpisodeController::class, 'listSeasons'])->name('series.episodes.list-seasons');
Route::get('/series/{series_id}/episodes', [EpisodeController::class, 'index'])->name('series.episodes.index');
Route::get('/series/{series_id}/episodes/create', [EpisodeController::class, 'create'])->name('series.episodes.create');
Route::post('/series/{series_id}/episodes/store', [EpisodeController::class, 'store'])->name('series.episodes.store');
Route::get('/series/{series_id}/episodes/{episode}/edit', [EpisodeController::class, 'edit'])->name('series.episodes.edit');
Route::patch('/series/{series_id}/episodes/{episode}/update', [EpisodeController::class, 'update'])->name('series.episodes.update');
Route::get('/series/{series_id}/episodes/{episode}/show', [EpisodeController::class, 'show'])->name('series.episodes.show');

Route::get('/series/{series_id}/seasons/{season_id}/episodes', [EpisodeController::class, 'index'])->name('series.seasons.episodes.index');
Route::get('/series/{series_id}/seasons/{season_id}/episodes/create', [EpisodeController::class, 'create'])->name('series.seasons.episodes.create');
Route::post('/series/{series_id}/seasons/{season_id}/episodes/store', [EpisodeController::class, 'store'])->name('series.seasons.episodes.store');
Route::get('/series/{series_id}/seasons/{season_id}/episodes/{episode}/edit', [EpisodeController::class, 'edit'])->name('series.seasons.episodes.edit');
Route::patch('/series/{series_id}/seasons/{season_id}/episodes/{episode}/update', [EpisodeController::class, 'update'])->name('series.seasons.episodes.update');
Route::delete('/episodes/{episode}/destroy', [EpisodeController::class, 'destroy'])->name('episodes.destroy');
Route::get('/series/{series_id}/seasons/{season_id}/episodes/{episode}/show', [EpisodeController::class, 'show'])->name('series.seasons.episodes.show');
Route::post('/episodes/{episode}/update-status', [EpisodeController::class, 'updateStatus']);

Route::get('/series/{series_id}/seasons', [SeasonController::class, 'index'])->name('series.seasons.index');
Route::get('/series/{series_id}/seasons/create', [SeasonController::class, 'create'])->name('series.seasons.create');
Route::post('/series/{series_id}/seasons/store', [SeasonController::class, 'store'])->name('series.seasons.store');
Route::get('/series/{series_id}/seasons/{season}/edit', [SeasonController::class, 'edit'])->name('series.seasons.edit');
Route::patch('/series/{series_id}/seasons/{season}/update', [SeasonController::class, 'update'])->name('series.seasons.update');
Route::get('/series/{series_id}/seasons/{season}/show', [SeasonController::class, 'show'])->name('series.seasons.show');
Route::delete('/seasons/{season}/destroy', [SeasonController::class, 'destroy'])->name('seasons.destroy');
Route::post('/seasons/{season}/update-status', [SeasonController::class, 'updateStatus']);

Route::resource('series', SeriesController::class);
Route::post('/series/{serie}/update-status', [SeriesController::class, 'updateStatus']);

//Category Routes
Route::resource('categories', CategoryController::class);

//Genres Routes
Route::resource('genres', GenresController::class);

Route::resource('plans', PlanController::class);
Route::post('/plans/{plan}/update-status', [PlanController::class, 'updateStatus']);


// File Upload Routes
Route::post('/upload', [FileController::class, 'upload']);
Route::post('/upload/temp', [FileController::class, 'uploadTemp']);
Route::delete('/upload/revert', [FileController::class, 'delete']);
Route::delete('/upload/temp/revert', [FileController::class, 'deleteTemp']);
Route::delete('/upload/video-s3/revert', [FileController::class, 'deleteVideoS3']);

// Proxy Routes
Route::get('/proxy', [ProxyController::class, 'fetch']);

