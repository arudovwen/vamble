<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');

Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');
Route::post('/check/booking', [App\Http\Controllers\BookingController::class, 'checkbooking'])->name('checkbooking');
Route::get('/find/booking/{booking}', [App\Http\Controllers\ReservationController::class, 'findbooking'])->name('findbooking');
Route::post('/check/availability', [App\Http\Controllers\ReservationController::class, 'checkavailability'])->name('checkavailability');
Route::post('/reserve', [App\Http\Controllers\ReservationController::class, 'store'])->name('makereservation');
Route::get('/bookings', [App\Http\Controllers\BookingController::class, 'getbookings'])->name('getbookings');

Route::post('/search/room', [App\Http\Controllers\RoomController::class, 'searchroom'])->name('searchroom');

Route::get('/accomodations', [App\Http\Controllers\AccomodationController::class, 'index'])->name('accomodations');
Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services');

Route::resource('rooms', RoomController::class);

// Admin routes
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
Route::get('/show-rooms', [App\Http\Controllers\AdminController::class, 'rooms'])->name('rooms');
Route::get('/search', [App\Http\Controllers\AdminController::class, 'roomsearch'])->name('roomsearch');
Route::get('/reservations', [App\Http\Controllers\AdminController::class, 'reservations'])->name('reservations');
Route::get('/transactions', [App\Http\Controllers\AdminController::class, 'transactions'])->name('transactions');
Route::get('/calendar', [App\Http\Controllers\AdminController::class, 'calendar'])->name('calendar');
