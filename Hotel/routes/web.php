<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FAQCategoryController;
use App\Http\Controllers\FAQItemController;
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

/*Add Rooms */
Route::get('/add_room_view', [AdminController::class, 'addview']);

Route::post('/upload_room', [AdminController::class, 'upload']);



/*Booking Request */

Route::get('/booking', [AdminController::class, 'booking']);

Route::get('/approved_booking/{id}', [AdminController::class, 'approved_booking']);

Route::get('/denied_booking/{id}', [AdminController::class, 'denied_booking']);




/*Room Updating */
Route::get('/rooms', [AdminController::class, 'rooms']);

Route::get('/editroom/{id}', [AdminController::class, 'editroom']);

Route::get('/delete_room/{id}', [AdminController::class, 'delete_room']);

Route::post('/changing_room/{id}', [AdminController::class, 'changing_room']);



/*Admin Rights */
Route::get('/users_rights', [AdminController::class, 'users_rights']);
Route::get('/promote_user/{id}', [AdminController::class, 'promote_user']);
Route::get('/discard_user/{id}', [AdminController::class, 'discard_user']);



Route::get('/detail/{id}', [BookController::class, 'showDetail']);

Route::post('/reservation', [BookController::class, 'reservation']);


/*My reservation */
Route::get('/myreservation', [HomeController::class, 'myreservation']);

Route::get('/cancel_book/{id}', [HomeController::class, 'cancel_book']);


/*Contact form */
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/add_contactform', [HomeController::class, 'add_contactform']);



/*Contact managment */
Route::get('/contact_forms', [AdminController::class, 'contact_forms']);
Route::get('/delte_froms/{id}', [AdminController::class, 'delte_froms']);


/*FAQ*/
// Route for displaying FAQ items
Route::get('/faq', [FAQItemController::class, 'display'])->name('faq.display');
// Route for displaying FAQ categories (assuming you want a separate route for categories)
Route::get('/faq/categories', [FAQCategoryController::class, 'index'])->name('faq.categories.index');