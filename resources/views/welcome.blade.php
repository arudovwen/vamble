@extends('layouts.app')
@section('title', 'Welcome to Vamble Apartments and Suites')
@section('description',
    "Vamble Apartments and Suites is a sweet spot to relax and enjoy the splendor and exquisite
    feeling of a home away from home. It's perculiarity is second to none.",)
@section('keywords',
    'Vamble Apartments,Vamble , Apartments, Hotels, Suites,Bookings, Online
    Apartments, Abuja, Abuja-Hotels,FCT-Hotels, Abuja-Apartments,Abuja-Stay,Home,Places,Jahi, Serviced Apartments Abuja',)
@section('content')
    <section class="firstContent">


        <div class="banner-text text-center">
            <div id="banner_text">
                <h1 class="vamble banner_fancy">
                    Vamble
                </h1>
                <h2 class="sub_banner_text banner_fancy">


                    Apartments & Suites
                </h2>
                <p class="text-white banner_fancy" style="z-index: 2">
                    A home away from home
                </p>
            </div>
            <div class="mt-4 d-none d-md-block">
                <button type="button" class="btn  btn-light bg-transparent   text-light mr-3" style="border:2px solid white"
                    data-toggle="modal" data-target="#videosId"><i class="fa fa-play-circle mr-1" aria-hidden="true"></i>
                    Take a tour</button>
                <a href="/accomodations"><button type="button" class="btn btn-light bg-transparent   text-light  "
                        style="border:2px solid white">See apartments</button></a>
            </div>
        </div>


        <!--video Modal -->

        
        <div class="modal fade " id="videosId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog  modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">
                        <video controls preload="none" id="mainvideo" poster="{{ asset('/images/rooms/sitting13.jpg') }}">
                            <source src="https://res.cloudinary.com/arudovwen-me/video/upload/v1647156419/vamble_g8m0z2.mp4" type="video/mp4">
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

        </div>

        <video autoplay muted id="mybannervidVideo" class="d-none d-md-block" loop poster="{{ asset('/images/rooms/building2.jpg') }}">
            <source src="https://res.cloudinary.com/arudovwen-me/video/upload/v1647156412/vidtrim_xqxrby.mp4" type="video/mp4">
        </video>
    </section>

    <section class="secondContent">
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
                    <img loading="lazy" src="{{ asset('/images/rooms/sitting13.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>World Class Sitting Room</strong> <br>

                    </div>
                </div>
                <div class="col-sm-4 hotel-img p-0">
                    <img loading="lazy" src="{{ asset('/images/rooms/bed5.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Executive Bedrooms</strong> <br>

                    </div>
                </div>
                <div class="col-sm-4 hotel-img p-0">
                    <img loading="lazy" src="{{ asset('/images/rooms/kitchen.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Fully Equipped Kitchen</strong> <br>

                    </div>
                </div>

            </div>
        </div>

        <x-mini></x-mini>
    </section>
    <section class="thirdContent">
        <div class="content">
            <h2 class="mb-5">Rooms & Apartments</h2>
            <div class="observer_a mb-5 pb-5">
                <div class="row mb-5  fade_text animate__animated animate__fadeOut animate__slow">
                    <div class="col-xs-12 col-sm-6  text-left  mb-4 mb-sm-0">
                        <h3 class="line_half" style="letter-spacing: .4rem">Standard Room</h3>
                        <p>Get comfy in our fully air-conditioned rooms, setup to give you the perfect feel of a standard
                            bedroom. Spacious and cozy with your own TV,free wifi, re..<a class="btn  btn-link px-0 py-0"
                                href="/accomodations" role="button">read more </a>
                        </p>

                        <div class="r">
                            <div class="price mb-2"> &#8358;30,000 <sub>per night</sub></div>
                        </div>

                        <div class="flex flex-wrap">
                            <span class="amenities mb-1 mr-2"><i class="fa fa-bed" aria-hidden="true"></i> Family size
                                beds</span>
                            <span class="amenities mb-1 mr-2"> <i class="fas fa-wind    "></i> Air conditioning</span>

                            <span class="amenities "><i class="fas fa-utensil-spoon    "></i> Complementary
                                breakfast</span>

                        </div>

                        <div class="mb-4">
                            <span class="badge badge-dark"> Free toiletries</span>
                            <span class="badge badge-dark">Temperature sensored showers </span>
                            <span class="badge badge-dark"> Desk Seating Area</span>
                            <span class="badge badge-dark">Smart TV</span>
                            <span class="badge badge-dark"> 24 hours Laundry service</span>
                            <span class="badge badge-dark"> 24 hours bar service</span>
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

                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item room-item active bg-light" data-bs-interval="0">
                                    <img loading="lazy" sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                /images/rooms/bed11_umlnzb_c_scale,w_200.jpg 200w,
                /images/rooms/bed11_umlnzb_c_scale,w_546.jpg 546w,
                /images/rooms/bed11_umlnzb_c_scale,w_791.jpg 791w,
                /images/rooms/bed11_umlnzb_c_scale,w_1014.jpg 1014w,
                /images/rooms/bed11_umlnzb_c_scale,w_1043.jpg 1043w,
                /images/rooms/bed11_umlnzb_c_scale,w_1207.jpg 1207w,
                /images/rooms/bed11_umlnzb_c_scale,w_1322.jpg 1322w,
                /images/rooms/bed11_umlnzb_c_scale,w_1400.jpg 1400w" src="/images/rooms/bed11_umlnzb_c_scale,w_1400.jpg"
                                        alt="Third slide">
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="observer_b mb-5 pb-5">
                <div
                    class="row mb-5  fade_text animate__animated animate__fadeOut animate__slow flex-column-reverse flex-sm-row">
                    <div class="col-xs-12 col-sm-6  ">
                        <div id="roomId1" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item room-item active bg-light" data-bs-interval="0">
                                    <img loading="lazy" sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                /images/rooms/bed5_q82awp_c_scale,w_200.jpg 200w,
                /images/rooms/bed5_q82awp_c_scale,w_530.jpg 530w,
                /images/rooms/bed5_q82awp_c_scale,w_777.jpg 777w,
                /images/rooms/bed5_q82awp_c_scale,w_959.jpg 959w,
                /images/rooms/bed5_q82awp_c_scale,w_1078.jpg 1078w,
                /images/rooms/bed5_q82awp_c_scale,w_1254.jpg 1254w,
                /images/rooms/bed5_q82awp_c_scale,w_1274.jpg 1274w,
                /images/rooms/bed5_q82awp_c_scale,w_1386.jpg 1386w,
                /images/rooms/bed5_q82awp_c_scale,w_1400.jpg 1400w" src="/images/rooms/bed5_q82awp_c_scale,w_1400.jpg"
                                        alt="Third slide">
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6  text-left  mb-4 mb-sm-0">
                        <h3 class="line_half" style="letter-spacing: .4rem">Executive Room</h3>
                        <p>We strive to provide a hospitable surrounding with our executive masters bedroom.
                            You get free wifi, TV, a refrigerator, massive bedroom space, a share...<a
                                class="btn  btn-link px-0 py-0" href="/accomodations" role="button">read more </a>
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price mb-2"> &#8358;45,000<sub>per night</sub></div>
                        </div>

                        <div class="flex flex-wrap">
                            <span class="amenities mb-1 mr-2"><i class="fa fa-bed" aria-hidden="true"></i> Family size
                                beds</span>
                            <span class="amenities mb-1 mr-2"> <i class="fas fa-wind    "></i> Air conditioning</span>

                            <span class="amenities "><i class="fas fa-utensil-spoon    "></i> Complementary
                                breakfast</span>

                        </div>

                        <div class="mb-4">
                            <span class="badge badge-dark"> Free toiletries</span>
                            <span class="badge badge-dark">Temperature sensored showers </span>
                            <span class="badge badge-dark"> Desk Seating Area</span>
                            <span class="badge badge-dark">Smart TV</span>
                            <span class="badge badge-dark"> 24 hours Laundry service</span>
                            <span class="badge badge-dark"> 24 hours bar service</span>
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


                </div>
            </div>

            <div class="observer_1 mb-5 pb-5">
                <div class="row mb-5  fade_text animate__animated animate__fadeOut animate__slow">
                    <div class="col-xs-12 col-sm-6  text-left  mb-4 mb-sm-0">
                        <h3 class="line_half" style="letter-spacing: .4rem">Standard Apartment</h3>
                        <p>Our Standard Apartments are modern and stylish, equipped with a 75inch flat-screen television, a
                            magnificent sitting room and so
                            many other amenities that will make your stay very pleasura...<a class="btn  btn-link px-0 py-0"
                                href="/accomodations" role="button">read more </a>
                        </p>

                        <div class="">
                            <div class="price mb-2"> &#8358;110,000 <sub>per night</sub></div>

                        </div>

                        <div class="flex flex-wrap">
                            <span class="amenities mb-1 mr-2"><i class="fa fa-bed" aria-hidden="true"></i> Family
                                size beds</span>
                            <span class="amenities mb-1 mr-2"> <i class="fas fa-wind    "></i> Air conditioning</span>
                            <span class="amenities mb-1 mr-2"><i class="fas fa-times text-danger"></i> No kitchen</span>
                            <span class="amenities "><i class="fas fa-utensil-spoon    "></i> Complementary
                                breakfast</span>

                        </div>

                        <div class="mb-4">
                            <span class="badge badge-dark"> Free toiletries</span>
                            <span class="badge badge-dark">Temperature sensored showers </span>
                            <span class="badge badge-dark"> Desk Seating Area</span>
                            <span class="badge badge-dark">Smart TV</span>
                            <span class="badge badge-dark"> 24 hours Laundry service</span>
                            <span class="badge badge-dark"> 24 hours bar service</span>
                            <span class="badge badge-dark"> Refrigerator </span>
                            <span class="badge badge-dark"> Satellite channels </span>
                            <span class="badge badge-dark"> Wireless Internet </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/booking"> <button type="button" class="btn btn-outline-dark btn-sm"> Reserve
                                    room</button></a>
                            <span> <span class="badge  badge-success">9.7</span> <span>Superb</span></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6  ">
                        <div id="stand1" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#stand1" data-slide-to="0" class="active"></li>
                                <li data-target="#stand1" data-slide-to="1"></li>
                                <li data-target="#stand1" data-slide-to="2"></li>

                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item room-item active bg-light" data-bs-interval="5000">
                                    <img loading="lazy" sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                                                /images/rooms/sitting16_jzdcdo_c_scale,w_200.jpg 200w,
                                                /images/rooms//images/rooms/sitting16_jzdcdo_c_scale,w_491.jpg 491w,
                                                /images/rooms/sitting16_jzdcdo_c_scale,w_944.jpg 944w,
                                                /images/rooms/sitting16_jzdcdo_c_scale,w_980.jpg 980w,
                                                /images/rooms/sitting16_jzdcdo_c_scale,w_1272.jpg 1272w,
                                                /images/rooms/sitting16_jzdcdo_c_scale,w_1293.jpg 1293w,
                                                /images/rooms/sitting16_jzdcdo_c_scale,w_1329.jpg 1329w,
                                                /images/rooms/sitting16_jzdcdo_c_scale,w_1400.jpg 1400w"
                                        src="/images/rooms/sitting16_jzdcdo_c_scale,w_1400.jpg" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item bg-light" data-bs-interval="3700">
                                    <img loading="lazy" src="{{ asset('/images/rooms/bed9.jpg') }}" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item bg-light" data-bs-interval="4700">
                                    <img loading="lazy" src="{{ asset('/images/rooms/broom.jpg') }}" alt="Third slide">
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
                                    <img loading="lazy" sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                                /images/rooms/living3_oqrktt_c_scale,w_200.jpg 200w,
                                /images/rooms/living3_oqrktt_c_scale,w_566.jpg 566w,
                                /images/rooms/living3_oqrktt_c_scale,w_823.jpg 823w,
                                /images/rooms/living3_oqrktt_c_scale,w_1040.jpg 1040w,
                                /images/rooms/living3_oqrktt_c_scale,w_1235.jpg 1235w,
                                /images/rooms/living3_oqrktt_c_scale,w_1338.jpg 1338w,
                                /images/rooms/living3_oqrktt_c_scale,w_1400.jpg 1400w"
                                        src="/images/rooms/living3_oqrktt_c_scale,w_1400.jpg" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item bg-light" data-bs-interval="3800">
                                    <img loading="lazy" src="{{ asset('/images/rooms/bed2.jpg') }}" alt="Third slide">
                                </div>
                                <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                    <img loading="lazy" src="{{ asset('/images/rooms/kitchen.jpg') }}" alt="Third slide">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6  text-left mb-4 mb-sm-0">
                        <h3 class="line_half" style="letter-spacing: .4rem">Executive Apartment</h3>
                        <p>
                            Our Executive Apartment welcomes you with a gorgeously-appointed classical interior, separate
                            bedroom and living room, extra-spacious bathroom and a balcony overlooking the fancy estate.
                            With a classy debonair appear... <a class="btn  btn-link px-0 py-0" href="/accomodations"
                                role="button">read more </a>
                        </p>

                        <div class="">
                            <div class="price mb-2"> &#8358;120,000 <sub>per night</sub></div>

                        </div>

                        <div class="flex flex-wrap">
                            <span class="amenities mb-1 mr-2"><i class="fa fa-bed" aria-hidden="true"></i> Family
                                size beds</span>
                            <span class="amenities mb-1 mr-2"> <i class="fas fa-wind    "></i> Air conditioning</span>
                            <span class="amenities mb-1 mr-2"><i class="fas fa-faucet    "></i> Inbuilt kitchen</span>
                            <span class="amenities "><i class="fas fa-utensil-spoon    "></i> Complementary
                                breakfast</span>

                        </div>
                        <div class="mb-4">
                            <span class="badge badge-dark"> Free toiletries</span>
                            <span class="badge badge-dark">Temperature sensored showers </span>
                            <span class="badge badge-dark"> Desk Seating Area</span>
                            <span class="badge badge-dark">Smart TV</span>
                            <span class="badge badge-dark">Smart TV</span>
                            <span class="badge badge-dark"> 24 hours Laundry service</span>
                            <span class="badge badge-dark"> 24 hours bar service</span>
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
                        <p>Our Platinum Apartments will leave you enthralled in its grandeur and luxury. Its interior is
                            classy and fully equipped from the grand sitting room to the magnificent bedrooms and
                            standardized kitchen, accompanied by cable tv an...<a class="btn  btn-link px-0 py-0"
                                href="/accomodations" role="button">read more </a>
                        </p>

                        <div class="price mb-2"> &#8358;150,000 <sub>per night</sub></div>
                        <div class="flex flex-wrap">
                            <span class="amenities mb-1 mr-2"><i class="fa fa-bed" aria-hidden="true"></i> Family
                                size beds</span>
                            <span class="amenities mb-1 mr-2"> <i class="fas fa-wind    "></i> Air conditioning</span>
                            <span class="amenities  mb-1 mr-2"><i class="fas fa-faucet    "></i> Inbuilt kitchen</span>
                            <span class="amenities "><i class="fas fa-utensil-spoon    "></i> Complementary
                                breakfast</span>



                        </div>
                        <div class="mb-4">
                            <span class="badge badge-dark"> Free toiletries</span>
                            <span class="badge badge-dark">Temperature sensored showers </span>
                            <span class="badge badge-dark"> Desk Seating Area</span>
                            <span class="badge badge-dark">Smart TV</span>
                            <span class="badge badge-dark"> 24 hours Laundry service</span>
                            <span class="badge badge-dark"> 24 hours bar service</span>

                            <span class="badge badge-dark"> Refrigerator </span>
                            <span class="badge badge-dark"> Satellite channels </span>
                            <span class="badge badge-dark"> Wireless Internet </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/booking"> <button type="button" class="btn btn-outline-dark btn-sm"> Reserve
                                    room</button></a>
                            <span> <span class="badge  badge-success">9.8</span> <span>Superb</span></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6  ">
                        <div id="plat" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#plat" data-slide-to="0" class="active"></li>
                                <li data-target="#plat" data-slide-to="1"></li>
                                <li data-target="#plat" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item room-item active bg-light" data-bs-interval="5300">
                                    <img loading="lazy" src="{{ asset('/images/rooms/sitting11.jpg') }}"
                                        alt="Third slide">
                                </div>
                                <div class="carousel-item room-item bg-light" data-bs-interval="3700">
                                    <img loading="lazy" src="{{ asset('/images/rooms/sitting13.jpg') }}"
                                        alt="Third slide">
                                </div>
                                <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                    <img loading="lazy" src="{{ asset('/images/rooms/kitchen2.jpg') }}"
                                        alt="Third slide">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="fourthContent">
        <div class="content ">
            <div class="row mb-5  ">
                <div class="col-xs-12 col-sm-4  text-center">
                    <div class="rounded-circle  about_image">
                        <img loading="lazy" src="{{ asset('/images/rooms/building2.jpg') }}"
                            class="w-100 h-100 rounded-circle" style="object-fit: cover" alt="Third slide">
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
    </section>

    <x-testimonials></x-testimonials>
    <section class="fifthContent d-none d-md-block">
        <div class="content container-fluid">
            <h2 class="mb-5">GALLERY</h2>
            <div class="observer_4">
                <div class="row  fade_text animate__animated animate__fadeOut animate__slow ">
                    <div class="col-2   px-0 l_gallery_image">
                        <img loading="lazy" sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                                    /images/rooms/sitting7_qsrvly_c_scale,w_200.jpg 200w,
                                    /images/rooms/sitting7_qsrvly_c_scale,w_477.jpg 477w,
                                    /images/rooms/sitting7_qsrvly_c_scale,w_900.jpg 900w,
                                    /images/rooms/sitting7_qsrvly_c_scale,w_882.jpg 882w,
                                    /images/rooms/sitting7_qsrvly_c_scale,w_1036.jpg 1036w,
                                    /images/rooms/sitting7_qsrvly_c_scale,w_1162.jpg 1162w,
                                    /images/rooms/sitting7_qsrvly_c_scale,w_1302.jpg 1302w,
                                    /images/rooms/sitting7_qsrvly_c_scale,w_1400.jpg 1400w"
                            src="/images/rooms/sitting7_qsrvly_c_scale,w_1400.jpg" class="w-100 h-100"
                            alt="Third slide">
                    </div>
                    <div class="col-2  px-0 l_gallery_image">
                        <img loading="lazy" sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                        /images/rooms/sittingceiling_zlw1e9_c_scale,w_200.jpg 200w,
                        /images/rooms/sittingceiling_zlw1e9_c_scale,w_593.jpg 593w,
                        /images/rooms/sittingceiling_zlw1e9_c_scale,w_865.jpg 865w,
                        /images/rooms/sittingceiling_zlw1e9_c_scale,w_1084.jpg 1084w,
                        /images/rooms/sittingceiling_zlw1e9_c_scale,w_1337.jpg 1337w,
                        /images/rooms/sittingceiling_zlw1e9_c_scale,w_1360.jpg 1360w,
                        /images/rooms/sittingceiling_zlw1e9_c_scale,w_1400.jpg 1400w"
                            src="/images/rooms/sittingceiling_zlw1e9_c_scale,w_1400.jpg" class="w-100 h-100"
                            alt="Third slide">
                    </div>
                    <div class="col-2    px-0 l_gallery_image">
                        <img loading="lazy" sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                                    /images/rooms/living_cjnrze_c_scale,w_200.jpg 200w,
                                    /images/rooms/living_cjnrze_c_scale,w_606.jpg 606w,
                                    /images/rooms/living_cjnrze_c_scale,w_844.jpg 844w,
                                    /images/rooms/living_cjnrze_c_scale,w_1057.jpg 1057w,
                                    /images/rooms/living_cjnrze_c_scale,w_1282.jpg 1282w,
                                    /images/rooms/living_cjnrze_c_scale,w_1332.jpg 1332w,
                                    /images/rooms/living_cjnrze_c_scale,w_1400.jpg 1400w"
                            src="/images/rooms/living_cjnrze_c_scale,w_1400.jpg" class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2   px-0 l_gallery_image">
                        <img loading="lazy" sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                /images/rooms/bed5_q82awp_c_scale,w_200.jpg 200w,
                /images/rooms/bed5_q82awp_c_scale,w_530.jpg 530w,
                /images/rooms/bed5_q82awp_c_scale,w_777.jpg 777w,
                /images/rooms/bed5_q82awp_c_scale,w_959.jpg 959w,
                /images/rooms/bed5_q82awp_c_scale,w_1078.jpg 1078w,
                /images/rooms/bed5_q82awp_c_scale,w_1254.jpg 1254w,
                /images/rooms/bed5_q82awp_c_scale,w_1274.jpg 1274w,
                /images/rooms/bed5_q82awp_c_scale,w_1386.jpg 1386w,
                /images/rooms/bed5_q82awp_c_scale,w_1400.jpg 1400w" src="/images/rooms/bed5_q82awp_c_scale,w_1400.jpg"
                            class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2   px-0 l_gallery_image">
                        <img loading="lazy" src="{{ asset('/images/rooms/sittingceiling1.jpg') }}"
                            class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2   px-0 l_gallery_image">
                        <img loading="lazy" sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                /images/rooms/sitting_suyw55_c_scale,w_200.jpg 200w,
                /images/rooms/sitting_suyw55_c_scale,w_542.jpg 542w,
                /images/rooms/sitting_suyw55_c_scale,w_906.jpg 906w,
                /images/rooms/sitting_suyw55_c_scale,w_997.jpg 997w,
                /images/rooms/sitting_suyw55_c_scale,w_1132.jpg 1132w,
                /images/rooms/sitting_suyw55_c_scale,w_1211.jpg 1211w,
                /images/rooms/sitting_suyw55_c_scale,w_1324.jpg 1324w,
                /images/rooms/sitting_suyw55_c_scale,w_1400.jpg 1400w"
                            src="/images/rooms/sitting_suyw55_c_scale,w_1400.jpg" class="w-100 h-100" alt="Third slide">
                    </div>

                </div>
            </div>
            {{-- <div class="text-center">
                <a href="/gallery" class="btn btn-default btn-sm"> <span class="mr-1">See more</span> <i
                        class="fa fa-chevron-right " style="font-size: 11px" aria-hidden="true"></i></a>
            </div> --}}


        </div>
    </section>


@endsection
@section('javascript')
    <script>
        var navigation = document.getElementById("nav");
        navigation.classList.remove("default_navigation");
        navigation.classList.add("initial_navigation");
    </script>

@endsection
