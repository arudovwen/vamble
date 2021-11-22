@extends('layouts.app')

@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1 class="font-weight-bold">Apartments & Suites</h1>
    </div>
    {{ Breadcrumbs::render('accomodations') }}
    <div class="apartments">
        <div class="content py-5">



            <div class="row mb-5">
                <div class="col-sm-6 bg-white p-3 p-md-5 text-left d-flex flex-column justify-content-center r">
                    <h3 class="mb-4" style="letter-spacing: .4rem">Standard Apartment</h3>
                    <p>Our Standard Apartments are modern and stylish, equipped with a fully furnished kitchen,air-conditioned rooms , 75inch flat-screen television, a magnificent sitting room and so many other amenities that will make your stay very pleasurable.  Fully equipped with state of the art furnitures, a grand sitting room, cable tv, and free wifi.</p>
                </div>
                <div class="col-sm-6 px-0">
                    <div id="appId1" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item room-item active bg-light" data-bs-interval="4600">
                                <img src="{{ asset('/images/vamb-img/sitting.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item bg-light" data-bs-interval="3800">
                                <img src="{{ asset('/images/vamb-img/bedroom.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                <img src="{{ asset('/images/vamb-img/kitchen.jpg') }}" alt="Third slide">
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

                <div class="col-sm-6 bg-white p-3 p-md-5 text-left d-flex flex-column justify-content-center">
                    <h3 class="mb-4" style="letter-spacing: .4rem">Luxury Apartment</h3>
                    <p>Our Luxury Apartment welcomes you with a gorgeously-appointed classical interior, separate bedroom and living room, extra-spacious bathroom and a balcony overlooking the fancy estate. With a classy debonaire appearance to make your stay memorable. Fully equipped with state of the art furnitures, a grand sitting room, cable tv, and free wifi. Feel at home in this spacious  suite.</p>
                </div>
                <div class="col-sm-6 px-md-0">
                    <div id="appId3" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item room-item active bg-light" data-bs-interval="5000">
                                <img src="{{ asset('/images/vamb-img/bedroom1.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item bg-light" data-bs-interval="3700">
                                <img src="{{ asset('/images/vamb-img/sitting1.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                <img src="{{ asset('/images/vamb-img/kitchen1.jpg') }}" alt="Third slide">
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
