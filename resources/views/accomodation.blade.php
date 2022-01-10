@extends('layouts.app')
@section('title','Apartments & Suites')
@section('description', 'Vamble apartments and suites')
@section('keywords', 'Vamble , Apartments, Hotels, Suites,bookings, online , Abuja')
@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1 class="font-weight-bold">Apartments & Suites</h1>
    </div>
    {{ Breadcrumbs::render('accomodations') }}
    <div class="apartments">
        <div class="container content py-0 py-md-5">



            <div class="row mb-5">
                <div class="col-sm-6 bg-white px-4 p-3 p-md-5 text-left d-flex flex-column justify-content-center">
                    <h3 class="mb-4" style="letter-spacing: .4rem">Standard Apartment</h3>
                    <p>Our Standard Apartments are modern and stylish, equipped with a fully furnished kitchen,air-conditioned rooms , 75inch flat-screen television, a magnificent sitting room and so many other amenities that will make your stay very pleasurable.  Fully equipped with state of the art furnitures, a grand sitting room, cable tv, and free wifi.</p>
                </div>
                <div class="col-sm-6 px-3 px-md-0">
                    <div id="appId1" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item room-item active bg-light" data-bs-interval="4680">
                                <img src="{{ asset('/images/rooms/sitting.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item bg-light" data-bs-interval="3900">
                                <img src="{{ asset('/images/rooms/bed.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item  bg-light" data-bs-interval="6000">
                                <img src="{{ asset('/images/rooms/kitchen.jpg') }}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#appId1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#appId1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="row mb-5">

                <div class="col-sm-6 bg-white px-4 p-3 p-md-5 text-left d-flex flex-column justify-content-center">
                    <h3 class="mb-4" style="letter-spacing: .4rem">Executive Apartment</h3>
                    <p>Our executive Apartment welcomes you with a gorgeously-appointed classical interior, separate bedroom and living room, extra-spacious bathroom and a balcony overlooking the fancy estate. With a classy debonair appearance to make your stay memorable. Fully equipped with state of the art furnitures, a grand sitting room, cable tv, and free wifi. Feel at home in this spacious  suite.</p>
                </div>
                <div class="col-sm-6 px-md-0">
                    <div id="appId3" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item room-item active bg-light" data-bs-interval="5000">
                                <img src="{{ asset('/images/rooms/bed5.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item bg-light" data-bs-interval="3700">
                                <img src="{{ asset('/images/rooms/living.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                <img src="{{ asset('/images/rooms/kitchen2.jpg') }}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#appId3" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#appId3" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

             <div class="row mb-5">

                <div class="col-sm-6 bg-white px-4 p-3 p-md-5 text-left d-flex flex-column justify-content-center">
                    <h3 class="mb-4" style="letter-spacing: .4rem">Platinum Apartment</h3>
                    <p>Our Platinum Apartments will leave you enthralled in its grandeur and luxury. Its interior is classy and fully equipped from the grand sitting room to the magnificent bedrooms and standardized kitchen, accompanied by cable tv and free WiFi. Your stay at Vamble Apartments and Suites is nothing short of royal.</p>
                </div>
                <div class="col-sm-6 px-md-0">
                    <div id="appId3" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item room-item active bg-light" data-bs-interval="5600">
                                <img src="{{ asset('/images/rooms/bed5.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item bg-light" data-bs-interval="3900">
                                <img src="{{ asset('/images/rooms/sitting9.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item  bg-light" data-bs-interval="4300">
                                <img src="{{ asset('/images/rooms/kitchen2.jpg') }}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#appId3" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#appId3" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
