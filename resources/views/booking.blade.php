@extends('layouts.app')
@section('title',' Booking Your Stay')
@section('description', 'Bookings in Vamble apartments and suites')
@section('keywords', 'Vamble , Apartments, Hotels, Suites,bookings, online , Abuja')
@section('content')
    {{ Breadcrumbs::render('booking') }}
    <div style="min-height: 50vh">
        <booking-page></booking-page>
    </div>


@endsection
