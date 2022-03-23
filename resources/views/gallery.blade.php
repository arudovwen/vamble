@extends('layouts.app')
@section('title','Vamble Apartments Gallery')
@section('description', 'Our Gallery at Vamble apartments and suites')
@section('keywords', 'Vamble Apartments,Vamble , Apartments, Hotels, Suites,Bookings, Online
Apartments, Abuja, Abuja-Hotels,FCT-Hotels, Abuja-Apartments,Abuja-Stay,Home,Places,Jahi, Serviced Apartments Abuja')
@section('script_head')

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
                "name": "Gallery",
                "item": "https://vambleapartments.com/gallery"
            }]
        }
    </script>
@endsection
@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1 class="font-weight-bold">Our Gallery</h1>
    </div>
    {{ Breadcrumbs::render('gallery') }}
    <div class="services">
        <div class="content py-5">



            <div class="row mx-auto">
                <div class="col-sm-12 bg-white p-5  ">
                    <h2 >Here we showcase some  amazing images of our apartments and suites</h2>

                </div>




            </div>
            <div class=" gal-container row mx-auto">


                <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#one">
                            <img src="/images/rooms/living.jpg">
                        </a>
                        <div class="modal fade" id="one" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/living.jpg">
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#two">
                            <img src="/images/rooms/sitting.jpg">
                        </a>
                        <div class="modal fade" id="two" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/sitting.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#three">
                            <img src="/images/rooms/bed2.jpg">
                        </a>
                        <div class="modal fade" id="three" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/bed2.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#four">
                            <img src="/images/rooms/bed5.jpg">
                        </a>
                        <div class="modal fade" id="four" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/bed5.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#five">
                            <img src="/images/rooms/living1.jpg">
                        </a>
                        <div class="modal fade" id="five" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/living1.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#six">
                            <img src="/images/rooms/kitchen2.jpg">
                        </a>
                        <div class="modal fade" id="six" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/kitchen2.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#seven">
                            <img src="/images/rooms/sitting9.jpg">
                        </a>
                        <div class="modal fade" id="seven" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/sitting9.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#eight">
                            <img src="/images/rooms/sitting13.jpg">
                        </a>
                        <div class="modal fade" id="eight" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/sitting13.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#nine">
                            <img src="/images/rooms/sitting14.jpg">
                        </a>
                        <div class="modal fade" id="nine" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/sitting14.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#ten">
                            <img src="/images/rooms/sittingceiling.jpg">
                        </a>
                        <div class="modal fade" id="ten" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/sittingceiling.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#eleven">
                            <img src="/images/rooms/building6.jpg">
                        </a>
                        <div class="modal fade" id="eleven" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/building6.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#twelve">
                            <img src="/images/rooms/building8.jpg">
                        </a>
                        <div class="modal fade" id="twelve" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/building8.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#thirteen">
                            <img src="/images/rooms/sitting6.jpg">
                        </a>
                        <div class="modal fade" id="thirteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/sitting6.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#fourteen">
                            <img src="/images/rooms/sitting12.jpg">
                        </a>
                        <div class="modal fade" id="fourteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/sitting12.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#fifteen">
                            <img src="/images/rooms/bed6.jpg">
                        </a>
                        <div class="modal fade" id="fifteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/bed6.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#sixteen">
                            <img src="/images/rooms/broom.jpg">
                        </a>
                        <div class="modal fade" id="sixteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/images/rooms/broom.jpg">
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
