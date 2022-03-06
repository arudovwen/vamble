<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/enquire', [App\Http\Controllers\ContactController::class, 'sendmessage'])->name('sendmessage');

// Views
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('/faqs', [App\Http\Controllers\FaqController::class, 'index'])->name('faqs');
Route::get('/privacy', [App\Http\Controllers\PrivacyController::class, 'index'])->name('privacy');
Route::get('/terms', [App\Http\Controllers\PrivacyController::class, 'terms'])->name('terms');
Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');
Route::post('/check/booking', [App\Http\Controllers\BookingController::class, 'checkbooking'])->name('checkbooking');
Route::get('/find/booking/{booking}', [App\Http\Controllers\ReservationController::class, 'findbooking'])->name('findbooking');
Route::post('/find/bookings', [App\Http\Controllers\ReservationController::class, 'findbookings'])->name('findbookings');
Route::post('/post/bookings', [App\Http\Controllers\ReservationController::class, 'postbookings'])->name('postbookings');
Route::get('/transaction/order/{id}', [App\Http\Controllers\TransactionController::class, 'transaction'])->name('transaction');

// Reservations
Route::post('/check/availability', [App\Http\Controllers\ReservationController::class, 'checkavailability'])->name('checkavailability');
Route::post('/reserve', [App\Http\Controllers\ReservationController::class, 'store'])->name('makereservation');
Route::post('/admin/reserve', [App\Http\Controllers\ReservationController::class, 'storeByAdmin'])->name('adminmakereservation');

Route::put('/reservations/{reservation}', [App\Http\Controllers\ReservationController::class, 'update'])->name('updatereservation');
Route::get('/reservations/edit/{reservation}', [App\Http\Controllers\ReservationController::class, 'edit'])->name('editreservation');
Route::delete('/reserve/{reservation}', [App\Http\Controllers\ReservationController::class, 'destroy'])->name('dropreservation');
Route::delete('admin/reserve/{reservation}', [App\Http\Controllers\ReservationController::class, 'admindestroy'])->name('admindropreservation');

Route::put('/reservations/{reservation}', [App\Http\Controllers\ReservationController::class, 'update'])->name('updatereservation');
Route::get('/bookings', [App\Http\Controllers\BookingController::class, 'getbookings'])->name('getbookings');



Route::get('/accomodations', [App\Http\Controllers\AccomodationController::class, 'index'])->name('accomodations');
Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services');


Route::post('/search/room', [App\Http\Controllers\RoomController::class, 'searchroom'])->name('searchroom');
Route::delete('/room/{room}', [App\Http\Controllers\RoomController::class, 'destroy'])->name('droproom');
Route::get('/room/types', [App\Http\Controllers\RoomController::class, 'roomtypes'])->name('roomtypes');
Route::get('/rooms/edit/{room}', [App\Http\Controllers\RoomController::class, 'edit'])->name('editroom');
Route::put('/rooms/{room}', [App\Http\Controllers\RoomController::class, 'update'])->name('updateroom');
Route::resource('rooms', RoomController::class);




// Admin routes
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
Route::post('/users', [App\Http\Controllers\UserController::class, 'searchusers'])->name('usersearch');
Route::get('/show-rooms', [App\Http\Controllers\AdminController::class, 'rooms'])->name('rooms');
Route::get('/search', [App\Http\Controllers\AdminController::class, 'roomsearch'])->name('roomsearch');
Route::get('/reservations', [App\Http\Controllers\AdminController::class, 'reservations'])->name('reservations');
Route::get('/transactions', [App\Http\Controllers\AdminController::class, 'transactions'])->name('transactions');
Route::post('/transactions', [App\Http\Controllers\TransactionController::class, 'searchtransactions'])->name('searchtransactions');
Route::get('/calendar', [App\Http\Controllers\AdminController::class, 'calendar'])->name('calendar');

Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('userdelete');

Route::post('/reservations', [App\Http\Controllers\ReservationController::class, 'searchreservation'])->name('searchreservation');
Route::get('/customer/checkin/{reservation}', [App\Http\Controllers\ReservationController::class, 'customercheckin'])->name('customercheckin');
Route::get('/customer/checkout/{reservation}', [App\Http\Controllers\ReservationController::class, 'customercheckout'])->name('customercheckout');



// Payment routes
Route::post('transactions/add', [TransactionController::class, 'store']);
Route::post('transaction/initiate', [TransactionController::class, 'makepayment']);
Route::get('transaction/verify/{reference}', [TransactionController::class, 'verifytransaction']);
Route::post('transaction/verify', [TransactionController::class, 'transactionevent']);


Route::get('/file-import', [App\Http\Controllers\UserController::class, 'importView'])->name('import-view');
Route::post('/import', [App\Http\Controllers\UserController::class, 'import'])->name('import');
Route::get('/export-users', [App\Http\Controllers\UserController::class, 'exportUsers'])->name('export-users');
Route::get('/export-reservations', [App\Http\Controllers\ReservationController::class, 'exportReservations'])->name('export-reservations');


Route::get('/notifications', [App\Http\Controllers\UserController::class, 'getnotification'])->name('get-notification');
Route::get('/marknotification/{id}', [App\Http\Controllers\UserController::class, 'marknotification'])->name('mark-notification');


//reviews

Route::resource('reviews', App\Http\Controllers\ReviewController::class);

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::resource('google-calendar', App\Http\Controllers\CalendarController::class);