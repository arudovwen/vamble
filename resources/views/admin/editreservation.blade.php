@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('editreservations') }}

        <div class="container pb-5">
            <div class="row">
                <div class="col-sm-3">
                    <h5> Modify reservation detail</h5>
                </div>

                <div class="col-sm-9 bg-white rounded p-4">


                    <form action="{{ route('updatereservation', ['reservation' => $reservation->id]) }}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <input type="text" value="{{ $reservation->id }}" name="id" hidden>
                        <div class="row mb-3">
                            <div class="col-sm-12 mb-1">
                                <strong><span class="">Booking # :</span>
                                    {{ $reservation->booking_no }}</strong>
                            </div>

                            <div class="col-sm-12 ">
                                <p class="mb-1"><span class="">Price per night :</span>
                                    &#8358;{{ number_format($reservation->price_per_night) }}</p>
                            </div>
                            <div class="col-sm-12 ">
                                <p class="mb-1">Nights x {{ $reservation->duration }}</p>
                            </div>

                            <div class="col-sm-12 ">
                                <p class="mb-1 text-capitalize">Booked room : {{$reservation->roomcalendar[0]->room->flat_type }} {{$reservation->roomcalendar[0]->room->flat_name }}</p>
                            </div>
                            <div class="col-sm-12 mb-1">
                                <strong><span class="text-muted">Total Price :</span>
                                    &#8358;{{ number_format($reservation->total_price) }}</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Guest name</label>
                                    <input type="text" readonly class="form-control"
                                        value="{{ $reservation->user->name }}" name="name" id="name"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" readonly class="form-control"
                                        value="{{ $reservation->user->email }}" name="email" id="email"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Check In</label>
                                    <input type="date" required class="form-control" value="{{ date('Y-m-d', strtotime($reservation->check_in)) }}"
                                        name="checkin" id="checkin" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Check Out</label>
                                    <input type="date" required class="form-control" value="{{ date('Y-m-d', strtotime($reservation->check_out)) }}"
                                        name="checkout" id="checkout" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <select required class="form-control text-capitalize" value="{{ $reservation->roomcalendar[0]->room->flat_type }}" name="flat_type">
                                    <option disabled value="">Apartment type</option>
                                    <option value="standard room">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><span>Standard</span> room</span>
                                            -
                                            <span>₦{{ number_format(30000) }} <small>/ night</small></span>
                                        </div>
                                    </option>
                                     <option value="executive room">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><span>Executive</span> room</span>
                                            -
                                            <span>₦{{ number_format(45000) }} <small>/ night</small></span>
                                        </div>
                                    </option>
                                     <option value="standard apartment">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><span>Standard</span> apartment</span>
                                            -
                                            <span>₦{{ number_format(100000) }} <small>/ night</small></span>
                                        </div>
                                    </option>
                                     <option value="executive apartment">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><span>Executive</span> apartment</span>
                                            -
                                            <span>₦{{ number_format(120000) }} <small>/ night</small></span>
                                        </div>
                                    </option>

                                    <option value="platinum apartment">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><span>Platinum</span> apartment</span>
                                            -
                                            <span>₦{{ number_format(150000) }} <small>/ night</small></span>
                                        </div>
                                    </option>
                                </select>
                            </div>
                            <div class=" col-md-3  d-flex align-items-center">
                                <select required class="form-control" name="guests">
                                    <option disabled value="">No of guests</option>
                                    @for ($i = 1; $i <=6; $i++)
                                        <option {{ $reservation->no_of_guests == $i ? 'selected' : '' }}
                                            value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class=" col-md-3 ">
                                <select required class="form-control" name="rooms">
                                    <option disabled value="">No of rooms</option>
                                    @for ($i = 1; $i <= 6; $i++)
                                        <option {{ $reservation->no_of_rooms == $i ? 'selected' : '' }}
                                            value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                        </div>

                        <div class="form-group my-4 text-center">
                            <a href="{{ route('reservations') }}"> <button type="button" class="btn btn-light btn-sm mr-3">Cancel</button></a>
                            <button type="submit" class="btn btn-info btn-sm">Check & update</button>
                        </div>
                    </form>

                    <hr>
                    @if (Session::get('data'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong> {{ Session::get('data')['message'] }}</strong>
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


                    @if (Session::get('data') && Session::get('data')['status'] === 'available')
                        <form action="" method="post">
                            <button type="button" class="btn btn-primary btn-lg"> Update reservation</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>

    @endsection
