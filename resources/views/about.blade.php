@extends('layouts.app')

@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1 class="font-weight-bold">About Vamble Apartments & Suites</h1>
    </div>
    {{ Breadcrumbs::render('about') }}
    <div class="about">
        <div class="content py-5">


            <div class="row">
                <div class="col-sm-6 px-0 about_img d-none d-sm-block">
                    <img src="{{ asset('/images/vamb-img/banner1.jpg') }}" class="w-100 h-100  " style="object-fit: cover"
                        alt="vamble building">
                </div>
                <div class="col-sm-6 bg-white p-5 text-left">
                    <h3 class=" line_half" style="letter-spacing: .3rem">Our Story</h3>
                    <p class="about-text">Vamble Apartment & Suites Limited is a renowned lodging facility built just like home to ensure a wonderful and comfortable experience.
                        The Standard and Luxury Apartments are fully furnished with exquisite sitting room, kitchen and bedroom furniture; to ensure you have every homely feel during your stay.

</p>
                </div>
                <div class="col-sm-12 bg-white p-5">
                    <p class="about-text">It is situated at …. Abuja and it is easily accessible and available to provide a luxurious and comfortable housing for as long as you please.</p>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        console.log('working now')
    </script>

@endsection
