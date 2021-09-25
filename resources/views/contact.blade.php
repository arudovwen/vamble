@extends('layouts.app')

@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1>Contact us today</h1>
    </div>
    {{ Breadcrumbs::render('contact') }}
    <div class="contact text-center">
        <div class="content px-3 px-sm-0">

            <div class="row mx-0">
                <div class="col-md-6  text-left">
                    <h3 class="mb-4">Our Information</h3>
                    <div class="mb-4">
                        <div class="mb-2"> <i class="fa fa-phone-square" aria-hidden="true"></i> Phone :
                            +234-903-504-1234</div>
                        <div class="mb-2"> <i class="fa fa-address-book" aria-hidden="true"></i> Address :
                            <span>10, abuja road,sdjfffjfjjf</span>
                        </div>
                        <div class="mb-3"> <i class="fa fa-envelope" aria-hidden="true"></i> Email :
                            info@vamble.com</div> <br>

                    </div>
                    <div class="d-none d-md-block">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe width="100%" height="400" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=gwarimpa&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                <a href="https://fmovies-online.net"></a><br>

                                <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 px-4 text-left d-flex align-items-center">

                    <form action="" method="post" class="w-100">
                        <legend>Feel free to write to us</legend>

                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                placeholder="Enter your full name">

                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                                placeholder="Enter your email address">

                        </div>
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea class="form-control" name="message" id="message" aria-describedby="helpId"
                                placeholder="Write your message here">
                          </textarea>
                        </div>
                        <button type="button" class="btn btn-primary ">Send message</button>
                    </form>

                </div>
            </div>


            <h2 class="mb-5">Social Connect</h2>

            <div class="text-center">
                <p>Also write us on one of our social handles</p>
                <div class=" py-3 d-flex justify-content-center mb-4">

                    <div class=" mr-4">
                        <i class="fab fa-instagram fa-4x" aria-hidden="true"></i> <br>
                        @vamblelimited
                    </div>
                    <div class=" mr-4">
                        <i class="fab fa-facebook-square fa-4x" aria-hidden="true"></i>
                        <br>
                        @vamblelimited
                    </div>


                    <div>
                        <i class="fab fa-twitter-square fa-4x" aria-hidden="true"></i>
                        <br>
                        @vamblelimited
                    </div>

                </div>
            </div>

            <small class="text-success">Our Agents are always available 24/7 to answer your every enquiry</small>
        </div>
    </div>
@endsection
