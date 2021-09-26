@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('reservations') }}

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5> Modify reservation detail</h5>
                </div>

                <div class="col-sm-9 bg-white rounded p-4">
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
                    @if (Session::get('info'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong> {{ Session::get('info') }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('updatereservation', ['reservation' => $reservation->id]) }}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <div class="col-sm-12 mb-1">
                                <strong><span class="text-muted">Booking # :</span>
                                    {{ $reservation->booking_no }}</strong>
                            </div>

                            <div class="col-sm-12 ">
                                <p class="mb-1"><span class="text-muted">Price per night :</span>
                                    &#8358;{{ number_format($reservation->room->price) }}</p>
                            </div>
                            <div class="col-sm-12 ">
                                <p class="mb-1">Nights x : {{ $reservation->duration }}</p>
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
                                    <label for="">Check Out</label>
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
                                    <input type="date" class="form-control" value="{{ $reservation->check_in }}"
                                        name="checkin" id="checkin" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Check Out</label>
                                    <input type="date" class="form-control" value="{{ $reservation->check_out }}"
                                        name="checkout" id="checkout" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3  d-flex align-items-center">
                                <select required class="form-control" name="guests">
                                    <option disabled value="">No of guests</option>
                                    @for ($i = 0; $i < 100; $i++)
                                        <option {{ $reservation->no_of_guests == $i ? 'selected' : '' }}
                                            value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class=" col-md-3 ">
                                <select required class="form-control" name="rooms">
                                    <option disabled value="">No of rooms</option>
                                    @for ($i = 0; $i < 100; $i++)
                                        <option {{ $reservation->no_of_rooms == $i ? 'selected' : '' }}
                                            value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select required class="form-control text-capitalize" name="room_id">
                                    <option disabled value="">Apartment type</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}"
                                            {{ $reservation->room_id == $room->id ? 'selected' : '' }}>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span><span class="text-capitalize">{{ $room->name }}</span>
                                                    apartment</span>
                                                -
                                                <span>&#8358;{{ number_format($room->price) }} <small>/
                                                        night</small></span>
                                            </div>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group my-4 text-center">
                            <button type="submit" class="btn btn-primary">Check & update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
