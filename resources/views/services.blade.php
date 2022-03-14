@extends('layouts.app')
@section('title', 'Vamble Apartments Services')
@section('description', 'Services at Vamble apartments and suites')
@section('keywords',
    'Vamble Apartments,Vamble , Apartments, Hotels, Suites,Bookings, Online
    Apartments, Abuja, Abuja-Hotels,FCT-Hotels, Abuja-Apartments,Abuja-Stay,Home,Places,Jahi, Serviced Apartments Abuja',)

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
                "name": "Services",
                "item": "https://vambleapartments.com/services"
            }]
        }
    </script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://vambleapartments.com/services"
            },
            "headline": "Services Vamble Apartments and Suites",
            "image": [
                "https://vambleapartments.com/images/rooms/living2.jpg",
                "https://vambleapartments.com/images/rooms/bed1.jpg",
                "https://vambleapartments.com/images/rooms/sitting13.jpg",
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
@section('content')
    <div class="services ">
        <div class="about_banner_img d-flex justify-content-center align-items-center">
            <h1 class="font-weight-bold">Services We Offer</h1>
        </div>
        {{ Breadcrumbs::render('services') }}
        <div class="content py-0 py-sm-5">


            <div class="row m-0 mb-sm-5">
                <div class="col-sm-12 bg-white py-5 px-3 px-sm-5 ">
                    <p class="about-text">From our platinum well equipped suites to our well furnished kitchen and safe
                        environment, here is a list of services we offer that will make your stay at Vamble Appartment &
                        Suites a wonderful one.</p>


                </div>
            </div>
            <div class="row m-0 mb-sm-5">
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h4 class="mb-4 font-weight-bold" style="letter-spacing: .3rem">Excellent & Secure Environment</h4>
                    <p class="about-text">Vamble Apartment & Suites Limited is situated at a safe and secure
                        environment. The area is friendly and serene with the appropriate aura that gives you the feel of a
                        safe haven. There are CCTV cameras installed to watch the environment with constant Security to
                        guide and ensure safety. At Vamble Apartment & Suites your safety is priority.</p>
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
                    <p class="about-text">Our Luxury and Standard Apartments are thoroughly decorated with top notch
                        furniture needed for day to day living. Every furniture was put in place with your comfort in mind;
                        they are beautiful and of good quality to give you that homely ambience.</p>
                </div>
            </div>
            <div class="row  m-0 mb-sm-5">
                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <h4 class="mb-4 font-weight-bold" style="letter-spacing: .3rem">Grande Bedrooms</h4>
                    <p class="about-text">Adorned with standard king sized beds, spacious wardrobes and other bedroom
                        furniture, our decor is built for your comfort. When you need stylish bedrooms, think Vamble
                        Apartments & Suites Limited.</p>
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
                    <p class="about-text">Every utensil needed to prepare a delicious meal is readily available. Fully
                        furnished with cabinets and drawers that contain the necessary kitchen wares; we have put in place a
                        kitchen any woman will adore.</p>
                </div>
            </div>
            <div class="row m-0 mb-sm-5 ">

                <div class="col-sm-6 bg-white py-5 px-3 px-sm-5 text-left">
                    <ul style="list-style-type: disc">
                        <li>Serene and Hospitable environment
                        <li> 24 hours security system
                        <li> 24 hours power supply
                        <li> Uninterrupted internet connection
                        <li> 24 hours Laundry service

                        <li>24 hours kitchen and bar services
                    </ul>
                </div>
            </div>



        </div>
    </div>
@endsection
