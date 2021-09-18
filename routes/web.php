<?php

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
Route::get('/accomodations', [App\Http\Controllers\AccomodationController::class, 'index'])->name('accomodations');
Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services');
