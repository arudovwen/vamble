@extends('layouts.app')

@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1 class="font-weight-bold">Apartments & Suites</h1>
    </div>
    {{ Breadcrumbs::render('accomodations') }}
    <div class="apartments">
        <div class="content py-5">


            <div class="row">
                <div class="col-sm-12 bg-white p-5 mb-5">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio adipisci ea ab excepturi, aspernatur
                        quo porro error unde. Esse eos beatae quae soluta dolores id nemo aliquam atque rem. Explicabo
                        quibusdam asperiores at a velit pariatur esse, dolorum iure unde?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio adipisci ea ab excepturi, aspernatur
                        quo porro error unde. Esse eos beatae quae soluta dolores id nemo aliquam atque rem. Explicabo
                        quibusdam asperiores at a velit pariatur esse, dolorum iure unde?</p>

                </div>
            </div>
            <div class="row mb-5">
                <div class="col-sm-6 bg-white p-5 text-left">
                    <h3 class="mb-4">Standard Apartment</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit molestias laboriosam asperiores qui
                        animi numquam. Numquam exercitationem vitae maiores perferendis natus dolorem beatae est! Cumque
                        expedita sint corrupti nihil at obcaecati nulla delectus reprehenderit commodi! Omnis eaque non
                        culpa voluptatum molestiae enim commodi molestias, quaerat neque nihil voluptate sapiente ipsam,
                        veniam in ea quasi rem nostrum unde atque voluptates porro? Accusantium quae quis dolorem aperiam
                        veritatis ipsam deserunt! Ducimus, quo?</p>
                </div>
                <div class="col-sm-6">
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

                <div class="col-sm-6 bg-white p-5 text-left">
                    <h3 class="mb-4">Luxury Apartment</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit molestias laboriosam asperiores qui
                        animi numquam. Numquam exercitationem vitae maiores perferendis natus dolorem beatae est! Cumque
                        expedita sint corrupti nihil at obcaecati nulla delectus reprehenderit commodi! Omnis eaque non
                        culpa voluptatum molestiae enim commodi molestias, quaerat neque nihil voluptate sapiente ipsam,
                        veniam in ea quasi rem nostrum unde atque voluptates porro? Accusantium quae quis dolorem aperiam
                        veritatis ipsam deserunt! Ducimus, quo?</p>
                </div>
                <div class="col-sm-6">
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
