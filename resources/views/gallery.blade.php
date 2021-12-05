@extends('layouts.app')
@section('title','Our Gallery')
@section('description', 'Vamble apartments and suites')
@section('keywords', 'Vamble , Apartments, Hotels, Suites,bookings, online , Abuja')
@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1 class="font-weight-bold">Our Gallery</h1>
    </div>
    {{ Breadcrumbs::render('gallery') }}
    <div class="services">
        <div class="content py-5">



            <div class="row mx-auto">
                <div class="col-sm-12 bg-white p-5  ">
                    <p>Here we showcase some  amazing images of our apartments and suites</p>

                </div>




            </div>
            <div class=" gal-container row mx-auto">


                <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#one">
                            <img src="/images/vamb-img/sitting2.jpg">
                        </a>
                        <div class="modal fade" id="one" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/sitting2.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the first one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#two">
                            <img src="/images/vamb-img/sitting.jpg">
                        </a>
                        <div class="modal fade" id="two" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/sitting.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the second one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#three">
                            <img src="/images/vamb-img/bedroom.jpg">
                        </a>
                        <div class="modal fade" id="three" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/bedroom.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the third one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#four">
                            <img src="/images/vamb-img/bedroom1.jpg">
                        </a>
                        <div class="modal fade" id="four" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/bedroom1.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the fourth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#five">
                            <img src="/images/vamb-img/kitchen1.jpg">
                        </a>
                        <div class="modal fade" id="five" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/kitchen1.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the fifth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#six">
                            <img src="/images/vamb-img/kitchen2.jpg">
                        </a>
                        <div class="modal fade" id="six" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/kitchen2.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the sixth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#seven">
                            <img src="/images/vamb-img/kitchen.jpg">
                        </a>
                        <div class="modal fade" id="seven" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/kitchen.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the seventh one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#eight">
                            <img src="/images/vamb-img/banner.jpg">
                        </a>
                        <div class="modal fade" id="eight" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/banner.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the eighth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#nine">
                            <img src="/images/vamb-img/banner1.jpg">
                        </a>
                        <div class="modal fade" id="nine" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/banner1.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the ninth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#ten">
                            <img src="/images/vamb-img/kitchen1.jpg">
                        </a>
                        <div class="modal fade" id="ten" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/kitchen1.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the tenth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#eleven">
                            <img src="/images/vamb-img/sitting2.jpg">
                        </a>
                        <div class="modal fade" id="eleven" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/sitting2.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the leventh one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#twelve">
                            <img src="/images/vamb-img/sitting.jpg">
                        </a>
                        <div class="modal fade" id="twelve" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/sitting.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 12th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#thirteen">
                            <img src="/images/vamb-img/banner1.jpg">
                        </a>
                        <div class="modal fade" id="thirteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/banner1.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 13th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#fourteen">
                            <img src="/images/vamb-img/kitchen.jpg">
                        </a>
                        <div class="modal fade" id="fourteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/kitchen.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 14th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#fifteen">
                            <img src="/images/vamb-img/bedroom.jpg">
                        </a>
                        <div class="modal fade" id="fifteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/bedroom.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 15th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#sixteen">
                            <img src="/images/vamb-img/bedroom1.jpg">
                        </a>
                        <div class="modal fade" id="sixteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/vamb-img/bedroom1.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 16th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
