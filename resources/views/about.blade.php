@extends('layouts.app')
@section('title', 'About Vamble Apartments & Suites')
@section('description',
    'Vamble Apartment & Suites Limited is a renowned lodging facility built just
    like a home to ensure a wonderful and comfortable experience.',)
@section('keywords',
    'Vamble Apartments,Vamble , Apartments, Hotels, Suites,Bookings, Online
    Apartments, Abuja, Abuja-Hotels,FCT-Hotels, Abuja-Apartments,Abuja-Stay,Home,Places,Jahi, Serviced Apartments Abuja',)

@section('script_java')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://vambleapartments.com/about"
            },
            "headline": "About Vamble Apartments and Suites",
            "image": [
                "https://vambleapartments.com/images/rooms/building5.jpg",
                "https://vambleapartments.com/images/rooms/building2.jpg",
                "https://vambleapartments.com/images/rooms/building.jpg",
            ],
            "datePublished": "2022-01-05T08:00:00+08:00",
            "dateModified": "2022-01-05T09:20:00+08:00",
            "author": {
                "@type": "Person",
                "name": "Success Ahon",
                "url": "https://arudovwen.me"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Vamble Apartments and Suites",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://vambleapartments.com/logo.png"
                }
            }
        }

       
    </script>
@endsection
@section('script_java')
    <script type="application/ld+json">

        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://vambleapartments.com"
            }, {
                "@type": "ListItem",
                "position": 2,
                "name": "About",
                "item": "https://vambleapartments.com/about"
            }]
        }
    </script>
@endsection
@section('content')
    <div class="about_banner_img d-flex flex-column align-items-center justify-content-center align-items-center">
        <h1 class="font-weight-bold ">About Vamble Apartments & Suites</h1>
        <small class="text-white" style="z-index: 2"><i>A home away from home</i></small>
    </div>
    {{ Breadcrumbs::render('about') }}
    <div class="about">
        <div class="content py-0 py-md-5">


            <div class="row">
                <div class="col-sm-6 px-0 about_img d-none d-sm-block">
                    <img src="{{ asset('/images/rooms/building2.jpg') }}" class="w-100 h-100  " style="object-fit: cover"
                        alt="vamble building">
                </div>
                <div class="col-sm-6 bg-white p-5 text-left">
                    <h3 class=" line_half" style="letter-spacing: .3rem">Our Story</h3>
                    <p class="about-text">Vamble Apartment & Suites Limited is a renowned lodging facility built just
                        like a home to ensure a wonderful and comfortable experience.
                        The Standard, Executive and Platinum Apartments are fully furnished with exquisite sitting room,
                        kitchen and
                        bedroom furniture; to ensure you have every homely feel during your stay.

                    </p>
                </div>
                <div class="col-sm-12 bg-white p-5">
                    <p class="about-text">It is situated at <a href="https://goo.gl/maps/AKGfNTN9frUpyWHU8">Plot 790,
                            sector center, Cadastral zone. Jahi. Abuja</a>
                        and it is easily accessible and available to
                        provide a luxurious and comfortable housing for as long as you please, Located in a Serene and
                        Hospitable environment, with

                        24 hours security system,

                        Well equipped and mannered security guards,

                        24 hours power supply as well as

                        uninterrupted internet connection.</p>

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
