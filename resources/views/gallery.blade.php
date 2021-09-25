@extends('layouts.app')

@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1>Our Gallery</h1>
    </div>
    {{ Breadcrumbs::render('gallery') }}
    <div class="services">
        <div class="content py-5">



            <div class="row mx-auto">
                <div class="col-sm-12 bg-white p-5 ">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio adipisci ea ab excepturi, aspernatur
                        quo porro error unde. Esse eos beatae quae soluta dolores id nemo aliquam atque rem. Explicabo
                        quibusdam asperiores at a velit pariatur esse, dolorum iure unde?</p>

                </div>




            </div>
            <div class=" gal-container row mx-auto">


                <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#one">
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/1.jpg">
                        </a>
                        <div class="modal fade" id="one" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/1.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/2.jpg">
                        </a>
                        <div class="modal fade" id="two" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/2.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/3.jpg">
                        </a>
                        <div class="modal fade" id="three" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/3.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/4.jpg">
                        </a>
                        <div class="modal fade" id="four" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/4.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/5.jpg">
                        </a>
                        <div class="modal fade" id="five" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/5.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/6.jpg">
                        </a>
                        <div class="modal fade" id="six" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/6.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/7.jpg">
                        </a>
                        <div class="modal fade" id="seven" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/7.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/8.jpg">
                        </a>
                        <div class="modal fade" id="eight" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/8.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/9.jpg">
                        </a>
                        <div class="modal fade" id="nine" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/9.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/10.jpg">
                        </a>
                        <div class="modal fade" id="ten" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/10.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/11.jpg">
                        </a>
                        <div class="modal fade" id="eleven" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/11.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/12.jpg">
                        </a>
                        <div class="modal fade" id="twelve" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/12.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/13.jpg">
                        </a>
                        <div class="modal fade" id="thirteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/13.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/14.jpg">
                        </a>
                        <div class="modal fade" id="fourteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/14.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/15.jpg">
                        </a>
                        <div class="modal fade" id="fifteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/15.jpg">
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
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/16.jpg">
                        </a>
                        <div class="modal fade" id="sixteen" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/16.jpg">
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
