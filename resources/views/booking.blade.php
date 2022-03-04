@extends('layouts.app')
@section('title',' Booki Your Stay')
@section('description', 'Bookings in Vamble apartments and suites')
@section('keywords', 'Vamble Apartments,Vamble , Apartments, Hotels, Suites,Bookings, Online
Apartments, Abuja, Abuja-Hotels,FCT-Hotels, Abuja-Apartments,Abuja-Stay,Home,Places,Jahi, Serviced Apartments Abuja')
@section('content')
    {{ Breadcrumbs::render('booking') }}
    <div style="min-height: 50vh">
        <booking-page></booking-page>
    </div>


@endsection
