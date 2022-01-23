@extends('layouts.app')
@section('title', 'Contact us')
@section('description', 'Contact Vamble apartments and suites')
@section('keywords', 'Vamble , Apartments, Hotels, Suites,bookings, online , Abuja')
@section('content')
    <div class="about_banner_img d-flex justify-content-center align-items-center">
        <h1 class="font-weight-bold">Contact us today</h1>
    </div>
    {{ Breadcrumbs::render('contact') }}
    <div class="contact text-center">
        <div class="content px-3 px-sm-0">

            <div class="row mx-0">
                <div class="col-md-6  text-left">
                    <h3 class="mb-4">Our Information</h3>
                    <div class="mb-4">
                        <div class="mb-2"> <i class="fa fa-phone-square" aria-hidden="true"></i> Phone :
                            +2349064645461</div>
                        <div class="mb-2"> <i class="fa fa-address-book" aria-hidden="true"></i> Address :
                            <span><a href="https://goo.gl/maps/AKGfNTN9frUpyWHU8">Plot 790, sector center, Cadastral zone.
                                    Jahi. Abuja</a></span>
                        </div>
                        <div class="mb-3"> <i class="fa fa-envelope" aria-hidden="true"></i> Email :
                            info@vambleapartments.com</div> <br>

                    </div>
                    <div class="d-none d-md-block">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=Vamble%20Apartments%20Jahi,%20Abuja&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                    href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/">divi
                                    discount</a><br>
                              <a href="https://www.embedgooglemap.net"></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 px-4 text-left d-flex align-items-center">
                    <div class="bg-white w-100 p-3 p-md-5 rounded">
                        @if (Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong> {{ Session::get('success') }}</strong>
                            </div>
                        @endif
                        @if (Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong> {{ Session::get('error') }}</strong>
                            </div>
                        @endif
                        <form action="{{ route('sendmessage') }}" method="post" class="w-100">
                            @csrf
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
                                <textarea class="form-control" name="body" id="body" aria-describedby="helpId"
                                    placeholder="Write your message here">
                                                                      </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary ">Send message</button>
                        </form>
                    </div>

                </div>
            </div>


            <h2 class="mb-4">Social Connect</h2>

            <div class="text-center">
                <p>Also write us on one of our social handles</p>
                <div class=" p-3 d-flex justify-content-center ">

                    <div class=" mr-3">
                        <i class="fab fa-instagram fa-3x" aria-hidden="true"></i> <br>
                        <small> <a href="http://instagram.com/vambleapartments">@vambleapartments</a></small>
                    </div>
                    <div class=" mr-3">
                        <i class="fab fa-whatsapp fa-3x" aria-hidden="true"></i>
                        <br>
                        <small><a href="http://wa.me/2349064645461">+2349064645461</a> </small>
                    </div>


                    <div>
                        <i class="fab fa-twitter fa-3x" aria-hidden="true"></i>
                        <br>
                        <small> <a href="http://twitter.com/vambleapartments">@vambleapartments</a></small>
                    </div>

                </div>
            </div>

            <small class="text-success">Our Agents are always available 24/7 to answer your every enquiry</small>
        </div>
    </div>
@endsection
