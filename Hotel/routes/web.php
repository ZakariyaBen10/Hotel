<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
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


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_room_view', [AdminController::class, 'addview']);


Route::post('/upload_room', [AdminController::class, 'upload']);

Route::get('/detail/{id}', [BookController::class, 'showDetail']);

Route::post('/reservation', [BookController::class, 'reservation']);

Route::get('/myreservation', [HomeController::class, 'myreservation']);

Route::get('/cancel_book/{id}', [HomeController::class, 'cancel_book']);
