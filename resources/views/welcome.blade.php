@extends('layouts.app')

@section('content')
    <div class="firstContent">
        <div id="bannerId" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#bannerId" data-slide-to="0" class="active"></li>
                <li data-target="#bannerId" data-slide-to="1"></li>
                <li data-target="#bannerId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item landing-item active ">
                    <img src="{{ asset('/images/v1.jpg') }}" class="" alt=" First slide">
                </div>
                <div class="carousel-item  landing-item ">
                    <img src="{{ asset('/images/v2.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item  landing-item ">
                    <img src="{{ asset('/images/v3.jpg') }}" alt="Third slide">

                </div>
            </div>
            <a class="carousel-control-prev" href="#bannerId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#bannerId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
        <div class="banner-text">
            <banner-text></banner-text>
        </div>

        <div class="booking">
            <booking-mini></booking-mini>
            <div class="text-center pt-5 text-muted know_more">

                <span class="text-white" data-toggle="tooltip" data-placement="top" title="Scroll down">
                    <span class="cursor-pointer">KNOW MORE ABOUT US</span> <br>
                    <i class="cursor-pointer fa fa-chevron-down animate__animated animate__heartBeat animate__slower animate__infinite	infinite"
                        aria-hidden="true"></i>

                </span>
            </div>
        </div>
    </div>

    <div class="secondContent">
        <div class="content animate__animated animate__fadeOut animate__slow ">
            <h2 class="mb-3">The Hotel </h2>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid illum quaerat, quam
                sapiente fugit expedita
                maiores sed deserunt dolorem dicta perspiciatis pariatur odio magni et, saepe eius cum amet quis reiciendis
                ut, officia a! Distinctio molestias nisi repellat necessitatibus libero.</p>

            <div class="row m-0 hotel d-none d-sm-flex">
                <div class="col-sm-4 hotel-img p-0">
                    <img src="{{ asset('/images/v2.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Hotels</strong> <br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, ratione!</span>
                    </div>
                </div>
                <div class="col-sm-4 hotel-img p-0">
                    <img src="{{ asset('/images/v2.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Rooms</strong> <br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, ratione!</span>
                    </div>
                </div>
                <div class="col-sm-4 hotel-img p-0">
                    <img src="{{ asset('/images/v2.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Suites</strong> <br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, ratione!</span>
                    </div>
                </div>
                <div class="col-sm-4 hotel-img p-0">
                    <img src="{{ asset('/images/v2.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Spa area</strong> <br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, ratione!</span>
                    </div>
                </div>
                <div class="col-sm-4 hotel-img p-0">
                    <img src="{{ asset('/images/v2.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Gym</strong> <br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, ratione!</span>
                    </div>
                </div>
                <div class="col-sm-4 hotel-img p-0">
                    <img src="{{ asset('/images/v2.jpg') }}" alt="vamble">
                    <div class="hotel_text">
                        <strong>Swimming pool </strong> <br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, ratione!</span>
                    </div>
                </div>
            </div>
        </div>

        <x-mini></x-mini>
    </div>
    <div class="thirdContent">
        <div class="content">
            <h2 class="mb-5">ROOMS</h2>
            <div class="row mb-5 observer_1 flex-column-reverse flex-sm-row">
                <div class="col-xs-12 col-sm-6  ">
                    <div id="roomId" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#roomId" data-slide-to="0" class="active"></li>
                            <li data-target="#roomId" data-slide-to="1"></li>
                            <li data-target="#roomId" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item room-item active bg-light" data-bs-interval="4500">
                                <img src="{{ asset('/images/v2.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item bg-light" data-bs-interval="3800">
                                <img src="{{ asset('/images/v1.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                <img src="{{ asset('/images/v4.jpg') }}" alt="Third slide">
                            </div>
                        </div>

                    </div>
                </div>
                <div
                    class="col-xs-12 col-sm-6  text-left fade_text animate__animated animate__fadeOut animate__slow  mb-4 mb-sm-0">
                    <h3 class="line_half">Standard Apartment</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, hic? Commodi, nulla. Hic voluptas
                        illo quisquam praesentium vero fugit cumque eveniet similique quasi, cupiditate odio distinctio
                        neque natus fugiat, veniam mollitia recusandae porro. Sequi, quod accusamus numquam hic dicta culpa!
                    </p>

                    <div class="price mb-2"> &#8358;150,000 <sub>per night</sub></div>
                    <div class="amenities mb-1"><i class="fa fa-bed" aria-hidden="true"></i> 1 double bed</div>
                    <div class="amenities mb-1"> <i class="fas fa-wind    "></i> Air conditioning</div>
                    <div class="amenities "><i class="fas fa-faucet    "></i> Kitchen</div>

                    <div class="mb-4">
                        <span class="badge badge-primary"> Free toiletries</span>
                        <span class="badge badge-primary"> Bath or shower </span>
                        <span class="badge badge-primary"> Desk Seating Area</span>
                        <span class="badge badge-primary">TV</span>

                        <span class="badge badge-primary"> Refrigerator </span>
                        <span class="badge badge-primary"> Satellite channels </span>
                        <span class="badge badge-primary"> Wireless Internet </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/booking"> <button type="button" class="btn btn-outline-dark btn-sm"> Book
                                room</button></a>
                        <span> <span class="badge  badge-primary">9.2</span> <span>Superb</span></span>
                    </div>
                </div>
            </div>

            <div class="row mb-5 observer_2">
                <div
                    class="col-xs-12 col-sm-6  text-left fade_text animate__animated animate__fadeOut animate__slow mb-4 mb-sm-0">
                    <h3 class="line_half">Executive Apartment</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, hic? Commodi, nulla. Hic voluptas
                        illo quisquam praesentium vero fugit cumque eveniet similique quasi, cupiditate odio distinctio
                        neque natus fugiat, veniam mollitia recusandae porro. Sequi, quod accusamus numquam hic dicta culpa!
                    </p>

                    <div class="price mb-2"> &#8358;150,000 <sub>per night</sub></div>
                    <div class="amenities mb-1"><i class="fa fa-bed" aria-hidden="true"></i> 1 double bed</div>
                    <div class="amenities mb-1"> <i class="fas fa-wind    "></i> Air conditioning</div>
                    <div class="amenities "><i class="fas fa-faucet    "></i> Kitchen</div>

                    <div class="mb-4">
                        <span class="badge badge-primary"> Free toiletries</span>
                        <span class="badge badge-primary"> Bath or shower </span>
                        <span class="badge badge-primary"> Desk Seating Area</span>
                        <span class="badge badge-primary">TV</span>

                        <span class="badge badge-primary"> Refrigerator </span>
                        <span class="badge badge-primary"> Satellite channels </span>
                        <span class="badge badge-primary"> Wireless Internet </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/booking"> <button type="button" class="btn btn-outline-dark btn-sm"> Book
                                room</button></a>
                        <span> <span class="badge  badge-primary">9.2</span> <span>Superb</span></span>
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
                                <img src="{{ asset('/images/v2.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item bg-light" data-bs-interval="3700">
                                <img src="{{ asset('/images/v1.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                <img src="{{ asset('/images/v4.jpg') }}" alt="Third slide">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row mb-5 observer_3  flex-column-reverse flex-sm-row">
                <div class="col-xs-12 col-sm-6  ">
                    <div id="roomId2" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#roomId2" data-slide-to="0" class="active"></li>
                            <li data-target="#roomId2" data-slide-to="1"></li>
                            <li data-target="#roomId2" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item room-item active bg-light" data-bs-interval="4600">
                                <img src="{{ asset('/images/v2.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item bg-light" data-bs-interval="3800">
                                <img src="{{ asset('/images/v1.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item room-item  bg-light" data-bs-interval="4000">
                                <img src="{{ asset('/images/v4.jpg') }}" alt="Third slide">
                            </div>
                        </div>

                    </div>
                </div>
                <div
                    class="col-xs-12 col-sm-6  text-left fade_text animate__animated animate__fadeOut animate__slow mb-4 mb-sm-0">
                    <h3 class="line_half">Luxury Apartment</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, hic? Commodi, nulla. Hic voluptas
                        illo quisquam praesentium vero fugit cumque eveniet similique quasi, cupiditate odio distinctio
                        neque natus fugiat, veniam mollitia recusandae porro. Sequi, quod accusamus numquam hic dicta culpa!
                    </p>

                    <div class="price mb-2"> &#8358;150,000 <sub>per night</sub></div>
                    <div class="amenities mb-1"><i class="fa fa-bed" aria-hidden="true"></i> 1 double bed</div>
                    <div class="amenities mb-1"> <i class="fas fa-wind    "></i> Air conditioning</div>
                    <div class="amenities "><i class="fas fa-faucet    "></i> Kitchen</div>

                    <div class="mb-4">
                        <span class="badge badge-primary"> Free toiletries</span>
                        <span class="badge badge-primary"> Bath or shower </span>
                        <span class="badge badge-primary"> Desk Seating Area</span>
                        <span class="badge badge-primary">TV</span>

                        <span class="badge badge-primary"> Refrigerator </span>
                        <span class="badge badge-primary"> Satellite channels </span>
                        <span class="badge badge-primary"> Wireless Internet </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/booking"> <button type="button" class="btn btn-outline-dark btn-sm"> Book
                                room</button></a>
                        <span> <span class="badge  badge-primary">9.2</span> <span>Superb</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fourthContent">
        <div class="content">
            <div class="row mb-5 observer_4">
                <div class="col-xs-12 col-sm-4  text-center">
                    <div class="rounded-circle  about_image">
                        <img src="{{ asset('/images/v4.jpg') }}" class="w-100 h-100 rounded-circle"
                            style="object-fit: cover" alt="Third slide">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8  text-center fade_text animate__animated animate__fadeOut animate__slow ">
                    <h3 class="line_full">What we are about</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, hic? Commodi, nulla. Hic voluptas
                        illo quisquam praesentium vero fugit cumque eveniet similique quasi, cupiditate odio distinctio
                        neque natus fugiat, veniam mollitia recusandae porro. Sequi, quod accusamus numquam hic dicta culpa!
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
            <div>
                <div class="row mb-5">
                    <div class="col-2   px-0 l_gallery_image">
                        <img src="{{ asset('/images/v1.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2  px-0 l_gallery_image">
                        <img src="{{ asset('/images/v2.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2    px-0 l_gallery_image">
                        <img src="{{ asset('/images/v3.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2   px-0 l_gallery_image">
                        <img src="{{ asset('/images/v4.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2   px-0 l_gallery_image">
                        <img src="{{ asset('/images/v5.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>
                    <div class="col-2   px-0 l_gallery_image">
                        <img src="{{ asset('/images/v1.jpg') }}" class="w-100 h-100" alt="Third slide">
                    </div>

                </div>
            </div>
            <div class="text-center">
                <a href="/gallery" class="btn btn-default btn-sm"> <span class="mr-2">See more</span> <i
                        class="fa fa-chevron-right " style="font-size: 14px" aria-hidden="true"></i></a>
            </div>


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
