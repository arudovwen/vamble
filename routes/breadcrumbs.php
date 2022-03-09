<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
  $trail->push('Dashboard', route('dashboard'));
});

// Home
Breadcrumbs::for('welcome', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
});

// Home >
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('About', route('about'));
});

// Home >
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('Contact', route('contact'));
});

// faqs >
Breadcrumbs::for('faqs', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('Faqs', route('faqs'));
});

// Privacy >
Breadcrumbs::for('privacy', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('Privacy', route('privacy'));
});

// Privacy >
Breadcrumbs::for('terms', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('Terms and conditions', route('terms'));
});

// Gallery >
Breadcrumbs::for('gallery', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('Gallery', route('gallery'));
});
// Home >
Breadcrumbs::for('services', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('Services', route('services'));
});

Breadcrumbs::for('accomodations', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('Apartments & Suites', route('accomodations'));
});

Breadcrumbs::for('booking', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('Booking', route('booking'));
});

Breadcrumbs::for('bookings', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('home'));
  $trail->push('Booking', route('booking'));
  $trail->push('Your Bookings', route('getbookings'));
});






// Dashboard > Blog
Breadcrumbs::for('reservations', function (BreadcrumbTrail $trail) {
  $trail->parent('dashboard');
  $trail->push('Reservations', route('reservations'));
});
Breadcrumbs::for('editreservations', function (BreadcrumbTrail $trail) {
  $trail->parent('dashboard');
  $trail->push('Reservations', route('reservations'));
  $trail->push('Edit Reservation', route('reservations'));


});
Breadcrumbs::for('rooms', function (BreadcrumbTrail $trail) {
  $trail->parent('dashboard');
  $trail->push('Rooms', route('rooms'));
});
Breadcrumbs::for('searchroom', function (BreadcrumbTrail $trail) {
  $trail->parent('dashboard');
  $trail->push('Search room', route('roomsearch'));
});
Breadcrumbs::for('transactions', function (BreadcrumbTrail $trail) {
  $trail->parent('dashboard');
  $trail->push('Transactions', route('transactions'));
});

Breadcrumbs::for('coupons', function (BreadcrumbTrail $trail) {
  $trail->parent('dashboard');
  $trail->push('Coupons', route('coupons'));
});
Breadcrumbs::for('customers', function (BreadcrumbTrail $trail) {
  $trail->parent('dashboard');
  $trail->push('Customers', route('users'));
});

Breadcrumbs::for('calendar', function (BreadcrumbTrail $trail) {
  $trail->parent('dashboard');
  $trail->push('Calendar', route('calendar'));
});


// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//   $trail->parent('blog');
//   $trail->push($category->title, route('category', $category));
// });
