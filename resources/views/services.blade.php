@extends('layouts.app')
@section('title','Services')
@section('description', 'Vamble apartments and suites')
@section('keywords', 'Vamble , Apartments, Hotels, Suites,bookings, online , Abuja')
@section('content')
    <div class="services ">
        <div class="about_banner_img d-flex justify-content-center align-items-center">
            <h1 class="font-weight-bold">Services We Offer</h1>
        </div>
        {{ Breadcrumbs::render('services') }}
        <div class="content pt-0 py-sm-5">


            <div class="row m-0 mb-sm-5">
                <div class="col-sm-12 bg-white py-5 px-3 px-sm-5 ">
                    <p class="about-text">From our luxury well equipped suites to our well furnished kitchen and safe environment, here is a list of services we offer that will make your stay at Vamble Appartment & Suites a wonderful one.</p>


                </div>
            </div>
            <div class="row m-0 mb-sm-5">
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h4 class="mb-4 font-weight-bold" style="letter-spacing: .3rem">Excellent & Secure Environment</h4>
                    <p class="about-text">Vamble Apartment & Suites Limited is situated at a safe and secure environment. The area is friendly and serene with the appropriate aura that gives you the feel of a safe haven. There are CCTV cameras installed to watch the environment with constant Security to guide and ensure safety. At Vamble Apartment & Suites your safety is priority.</p>
                </div>
                <div class="col-sm-6 px-0 service_img">
                    <img src="{{ asset('/images/rooms/building8.jpg') }}" class="w-100 h-100 " alt="vamble building">
                </div>
            </div>


            <div class="row m-0 mb-sm-5 flex-column-reverse flex-sm-row">
                <div class="col-sm-6 px-0 service_img">
                    <img src="{{ asset('/images/rooms/living.jpg') }}" class="w-100 h-100 " alt="vamble building">
                </div>
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h4 class="mb-4 font-weight-bold" style="letter-spacing: .3rem"> Furnished Apartments</h4>
                    <p class="about-text">Our Luxury and Standard Apartments are thoroughly decorated with top notch furniture needed for day to day living. Every furniture was put in place with your comfort in mind; they are beautiful and of good quality to give you that homely ambience.</p>
                </div>
            </div>
            <div class="row  m-0 mb-sm-5">
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h4 class="mb-4 font-weight-bold" style="letter-spacing: .3rem">Grande Bedrooms</h4>
                    <p class="about-text">Adorned with standard king sized beds, spacious wardrobes and other bedroom furniture, our decor is built for your comfort. When you need stylish bedrooms, think Vamble Apartments & Suites Limited.</p>
                </div>
                <div class="col-sm-6 px-0 service_img">
                    <img src="{{ asset('/images/rooms/bed5.jpg') }}" class="w-100 h-100 " alt="vamble building">
                </div>
            </div>

            <div class="row m-0 mb-sm-5 flex-column-reverse flex-sm-row">
                <div class="col-sm-6 px-0 service_img">
                    <img src="{{ asset('/images/rooms/kitchen.jpg') }}" class="w-100 h-100 " alt="vamble building">
                </div>
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h4 class="mb-4 font-weight-bold" style="letter-spacing: .3rem">Fully Equipped Kitchen</h4>
                    <p class="about-text">Every utensil needed to prepare a delicious meal is readily available. Fully furnished with cabinets and drawers that contain the necessary kitchen wares; we have put in place a kitchen any woman will adore.</p>
                </div>
            </div>



        </div>
    </div>
@endsection
