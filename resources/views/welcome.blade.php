@extends('layouts.app')
@section('title', '')
@section('description', 'Vamble apartments and suites')
@section('keywords', 'Vamble , Apartments, Hotels, Suites,bookings, online , Abuja')
@section('content')
    <div class="firstContent">


        <div class="banner-text text-center">
            <banner-text></banner-text>
            <div class="mt-4">
                <button type="button" class="btn  btn-light bg-transparent btn-lg border text-light mr-3" data-toggle="modal"
                    data-target="#videosId">Watch video</button>
                <a href="/accomodations"><button type="button"
                        class="btn btn-light bg-transparent btn-lg border text-light  ">See apartments</button></a>
            </div>
        </div>


        <!--video Modal -->

        <div class="modal fade" id="videosId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog  modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <video controls id="mainvideo">
                            <source src="{{ asset('/images/rooms/mainvid.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="booking">
            <booking-mini></booking-mini>
            <div class="text-center  text-muted know_more">

                <span class="text-white" data-toggle="tooltip" data-placement="top" title="Scroll down">
                    <span class="cursor-pointer">KNOW MORE </span> <br>
                    <i class="cursor-pointer fa fa-chevron-down animate__animated animate__heartBeat animate__slower animate__infinite	infinite"
                        aria-hidden="true"></i>

                </span>
            </div>
        </div>

        <video autoplay muted id="mybannervidVideo">
            <source src="{{ asset('/images/rooms/vidtrim.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="secondContent">
        <div class="content animate__animated animate__fadeOut animate__slow ">
            <h2 class="mb-3">What We Are </h2>
            <p class="mb-sm-5">Vamble Apartments and Suites Limited is a collection of the finest independent luxury
                homes in Abuja, Nigeria. Our luxury suites are both impressive and flexible. Plush interior design, and so
                much more. Located in a Serene and Hospitable environment, with

                24 hours security system,

                Well equipped and mannered security guards,

                24 hours power supply as well as

                uninterrupted internet connection. </p>

            <div class="row m-0 hotel d-none d-sm-flex">
                <div class="col-sm-4 hotel-img p-0">
                    <img src="{{ asset('/images/rooms/sitting13.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>World Class Sitting Room</strong> <br>

                    </div>
                </div>
                <div class="col-sm-4 hotel-img p-0">
                    <img src="{{ asset('/images/rooms/bed5.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Executive Bedrooms</strong> <br>

                    </div>
                </div>
                <div class="col-sm-4 hotel-img p-0">
                    <img src="{{ asset('/images/rooms/kitchen.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Fully Equipped Kitchen</strong> <br>

                    </div>
                </div>

            </div>
        </div>

        <x-mini></x-mini>
    </div>
    <div class="thirdContent">
        <div class="content">
            <h2 class="mb-5">Apartments & Suites</h2>

            <div class="observer_1 mb-5 pb-5">
                <div class="row mb-5  fade_text animate__animated animate__fadeOut animate__slow">
                    <div class="col-xs-12 col-sm-6  text-left  mb-4 mb-sm-0">
                        <h3 class="line_half" style="letter-spacing: .4rem">Standard Apartment</h3>
                        <p>Our Standard Apartments are modern and stylish, equipped with a fully furnished
                            kitchen,air-conditioned rooms , 75inch flat-screen television, a magnificent sitting room and so
                            many other amenities that will make your stay very pleasura...<a class="btn  btn-link px-0 py-0"
                                href="/accomodations" role="button">read more </a>
                        </p>

                        <div class="price mb-2"> &#8358;30,000 <sub>per night</sub></div>
                        <div class="flex flex-wrap">
                            <span class="amenities mb-1 mr-2"><i class="fa fa-bed" aria-hidden="true"></i> 1 double
                                bed</span>
                            <span class="amenities mb-1 mr-2"> <i class="fas fa-wind    "></i> Air conditioning</span>
                            <span class="amenities "><i class="fas fa-faucet    "></i> Kitchen</span>
                        </div>

                        <div class="mb-4">
                            <span class="badge badge-dark"> Free toiletries</span>
                            <span class="badge badge-dark"> Bath & shower </span>
                            <span class="badge badge-dark"> Desk Seating Area</span>
                            <span class="badge badge-dark">TV</span>

                            <span class="badge badge-dark"> Refrigerator </span>
                            <span class="badge badge-dark"> Satellite channels </span>
                            <span class="badge badge-dark"> Wireless Internet </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/booking"> <button type="button" class="btn btn-outline-dark btn-sm"> Reserve
                                    room</button></a>
                            <span> <span class="badge  badge-success">9.2</span> <span>Superb</span></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6  ">
                        <div id="roomId1" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#roomId1" data-slide-to="0" class="active"></li>
                                <li data-target="#roomId1" data-slide-to="1"></li>
                                <li data-target="#roomId1" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item room-item active bg-light" data-bs-interval="5000">
                                    <img src="{{ asset('/images/rooms/sitting1.jpg') }}" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item bg-light" data-bs-interval="3700">
                                    <img src="{{ asset('/images/rooms/bed4.jpg') }}" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                    <img src="{{ asset('/images/rooms/kitchen2.jpg') }}" alt="Third slide">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="observer_2 mb-5 pb-5">
                <div
                    class="row mb-5   fade_text animate__animated animate__fadeOut animate__slow  flex-column-reverse flex-sm-row">
                    <div class="col-xs-12 col-sm-6  ">
                        <div id="roomId2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#roomId2" data-slide-to="0" class="active"></li>
                                <li data-target="#roomId2" data-slide-to="1"></li>
                                <li data-target="#roomId2" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item room-item active bg-light" data-bs-interval="4600">
                                    <img src="{{ asset('/images/rooms/sitting9.jpg') }}" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item bg-light" data-bs-interval="3800">
                                    <img src="{{ asset('/images/rooms/bed2.jpg') }}" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                    <img src="{{ asset('/images/rooms/kitchen.jpg') }}" alt="Third slide">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6  text-left mb-4 mb-sm-0">
                        <h3 class="line_half" style="letter-spacing: .4rem">Executive Apartment</h3>
                        <p>
                            Our Executive Apartment welcomes you with a gorgeously-appointed classical interior, separate
                            bedroom and living room, extra-spacious bathroom and a balcony overlooking the fancy estate.
                            With a classy debonaire appear... <a class="btn  btn-link px-0 py-0" href="/accomodations"
                                role="button">read more </a>
                        </p>

                        <div class="price mb-2"> &#8358;110,000 <sub>per night</sub></div>
                        <div class="flex flex-wrap">
                            <span class="amenities mb-1 mr-2"><i class="fa fa-bed" aria-hidden="true"></i> 1 double
                                bed</span>
                            <span class="amenities mb-1 mr-2"> <i class="fas fa-wind    "></i> Air conditioning</span>
                            <span class="amenities "><i class="fas fa-faucet    "></i> Kitchen</span>
                        </div>
                        <div class="mb-4">
                            <span class="badge badge-dark"> Free toiletries</span>
                            <span class="badge badge-dark"> Bath & shower </span>
                            <span class="badge badge-dark"> Desk Seating Area</span>
                            <span class="badge badge-dark">TV</span>

                            <span class="badge badge-dark"> Refrigerator </span>
                            <span class="badge badge-dark"> Satellite channels </span>
                            <span class="badge badge-dark"> Wireless Internet </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/booking"> <button type="button" class="btn btn-outline-dark btn-sm"> Reserve
                                    room</button></a>
                            <span> <span class="badge  badge-success">9.6</span> <span>Superb</span></span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="observer_3">
                <div class="row mb-5  fade_text animate__animated animate__fadeOut animate__slow">
                    <div class="col-xs-12 col-sm-6  text-left  mb-4 mb-sm-0">
                        <h3 class="line_half" style="letter-spacing: .4rem">Platinum Apartment</h3>
                        <p>Our Platinum Apartments are modern and stylish, equipped with a fully furnished
                            kitchen,air-conditioned rooms , 75inch flat-screen television, a magnificent sitting room and so
                            many other amenities that will make your stay very pleasura...<a class="btn  btn-link px-0 py-0"
                                href="/accomodations" role="button">read more </a>
                        </p>

                        <div class="price mb-2"> &#8358;30,000 <sub>per night</sub></div>
                        <div class="flex flex-wrap">
                            <span class="amenities mb-1 mr-2"><i class="fa fa-bed" aria-hidden="true"></i> 1 double
                                bed</span>
                            <span class="amenities mb-1 mr-2"> <i class="fas fa-wind    "></i> Air conditioning</span>
                            <span class="amenities "><i class="fas fa-faucet    "></i> Kitchen</span>
                        </div>
                        <div class="mb-4">
                            <span class="badge badge-dark"> Free toiletries</span>
                            <span class="badge badge-dark"> Bath & shower </span>
                            <span class="badge badge-dark"> Desk Seating Area</span>
                            <span class="badge badge-dark">TV</span>

                            <span class="badge badge-dark"> Refrigerator </span>
                            <span class="badge badge-dark"> Satellite channels </span>
                            <span class="badge badge-dark"> Wireless Internet </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/booking"> <button type="button" class="btn btn-outline-dark btn-sm"> Reserve
                                    room</button></a>
                            <span> <span class="badge  badge-success">9.2</span> <span>Superb</span></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6  ">
                        <div id="roomId1" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#roomId1" data-slide-to="0" class="active"></li>
                                <li data-target="#roomId1" data-slide-to="1"></li>
                                <li data-target="#roomId1" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item room-item active bg-light" data-bs-interval="5300">
                                    <img src="{{ asset('/images/rooms/broom.jpg') }}" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item bg-light" data-bs-interval="3700">
                                    <img src="{{ asset('/images/rooms/sitting13.jpg') }}" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                    <img src="{{ asset('/images/rooms/kitchen2.jpg') }}" alt="Third slide">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="fourthContent">
        <div class="content ">
            <div class="row mb-5  ">
                <div class="col-xs-12 col-sm-4  text-center">
                    <div class="rounded-circle  about_image">
                        <img src="{{ asset('/images/rooms/building2.jpg') }}" class="w-100 h-100 rounded-circle"
                            style="object-fit: cover" alt="Third slide">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8  text-center ">
                    <h3 class="line_full">What we are about</h3>
                    <p>We at Vamble Apartments & Suites are dedicated to making your every stay a wonderful experience. We
                        offer state of the art facilities, world class interiors, comfortable and well furnished rooms. Our
                        aim is to provide a home away from home, located in serene and secured environment.
                    </p>
                    <a href="/about"> <button type="button" class="btn btn-outline-dark btn-sm"> Know more <i
                                class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
                </div>
            </div>
        </div>
    </div>

    <x-testimonials></x-testimonials>
    <div class="fifthContent">
        <div class="content container-fluid">
            <h2 class="mb-5">GALLERY</h2>
            <div class="observer_4">
                <div class="row  fade_text animate__animated animate__fadeOut animate__slow ">
                    <div class="col-2   px-0 l_gallery_image">
                        <img src="{{ asset('/images/rooms/sitting7.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2  px-0 l_gallery_image">
                        <img src="{{ asset('/images/rooms/sittingceiling.jpg') }}" class="w-100 h-100"
                            alt="Third slide">
                    </div>
                    <div class="col-2    px-0 l_gallery_image">
                        <img src="{{ asset('/images/rooms/living.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2   px-0 l_gallery_image">
                        <img src="{{ asset('/images/rooms/bed5.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2   px-0 l_gallery_image">
                        <img src="{{ asset('/images/rooms/sittingceiling1.jpg') }}" class="w-100 h-100"
                            alt="Third slide">
                    </div>
                    <div class="col-2   px-0 l_gallery_image">
                        <img src="{{ asset('/images/rooms/sitting.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>

                </div>
            </div>
            {{-- <div class="text-center">
                <a href="/gallery" class="btn btn-default btn-sm"> <span class="mr-1">See more</span> <i
                        class="fa fa-chevron-right " style="font-size: 11px" aria-hidden="true"></i></a>
            </div> --}}


        </div>
    </div>


@endsection
@section('javascript')
    <script>
        var navigation = document.getElementById("nav");
        navigation.classList.remove("default_navigation");
        navigation.classList.add("initial_navigation");
        //Know more scroll
        var knowmore = document.querySelector(".know_more");
        knowmore.addEventListener("click", () => {
            var currentHeight = window.innerHeight;
            window.scrollTo(0, currentHeight * 0.7);
        });
    </script>

@endsection
