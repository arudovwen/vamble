@extends('layouts.app')
@section('title','Your Booking History')
@section('description', 'Vamble apartments and suites')
@section('keywords', 'Vamble Apartments,Vamble , Apartments, Hotels, Suites,Bookings, Online
Apartments, Abuja, Abuja-Hotels,FCT-Hotels, Abuja-Apartments,Abuja-Stay,Home,Places,Jahi, Serviced Apartments Abuja')
@section('content')
    @php
    $bookings = session()->get('data');
    @endphp
    <div class="allbookings">
        <div class="container py-5 ">
            {{ Breadcrumbs::render('bookings') }}
            <h3>Manage your Bookings</h3>

            <div class="">
       <div class=" row justify-content-end">
                <div class="col-sm-6">
                    <form action="{{ route('postbookings') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Search booking</label>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" required name="booking" id="booking"
                                    aria-describedby="helpId" placeholder="Search by name or email">
                                <button type="submit" id="button-addon1" class="btn btn-primary">Search</button>

                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        @if ($message = Session::get('info'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ $message }}</strong>
            </div>

        @endif
        <div class="card ">
            <div class="card-body">
                @if (isset($bookings))




                    <div id="accordianId" role="tablist" aria-multiselectable="true" class="mb-5">
                        @foreach ($bookings as $booking)
                            <div class="card">
                                <div class="card-header" role="tab" id="section1HeaderId">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordianId"
                                            href="#booking{{ $booking['id'] }}" aria-expanded="true"
                                            aria-controls="section1ContentId">
                                            <div class="d-flex justify-content-between">
                                                <div class="date">
                                                    {!! date('D, M d Y', strtotime($booking['check_in'])) !!}
                                                </div>
                                                <div class="bookingnumber">#{{ $booking['booking_no'] }}</div>
                                            </div>
                                        </a>
                                    </h5>
                                </div>
                                <div id="booking{{ $booking['id'] }}" class="collapse in" role="tabpanel"
                                    aria-labelledby="section1HeaderId">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h6 class="text-center">Reservation details</h6>
                                            <div>
                                                <table class="table table-bordered table-sm">
                                                    <tr class="mb-1">
                                                        <td class="text-muted">Guest name</td>

                                                        <td class="text-capitalize">{{ $booking['user']->name }}</td>
                                                    </tr>

                                                    <tr class="mb-1">
                                                        <td class="text-muted">Guest email</td>

                                                        <td>{{ $booking['user']->email }}</td>
                                                    </tr>

                                                    <tr class="mb-1">
                                                        <td class="text-muted"> Home type</td>

                                                        <td class="text-capitalize"> {{ $booking['rooms'][0]->room->flat_type }}  {{ $booking['rooms'][0]->room->flat_name }}</td>
                                                    </tr>

                                                    <tr class="mb-1">
                                                        <td class="text-muted">Check-in Date</td>

                                                        <td>{{ $booking['check_in'] }}</td>
                                                    </tr>
                                                    <tr class="mb-1">
                                                        <td class="text-muted">Check-out Date</td>

                                                        <td>{{ $booking['check_out'] }}</td>
                                                    </tr>

                                                    <tr class="pr-3">
                                                        <td class="text-muted">No of guests</td>

                                                        <td>{{ $booking['no_of_guests'] }}</td>
                                                    </tr>

                                                    <tr class="mb-1">
                                                        <td class="text-muted">No of nights</td>

                                                        <td>{{ $booking['duration'] }}</td>
                                                    </tr>
                                                    <tr class="mb-1">
                                                        <td class="text-muted">No of rooms</td>

                                                        <td>{{ $booking['no_of_rooms'] }}</td>
                                                    </tr>

                                                    <tr class="mb-1">
                                                        <td class="text-muted">Price per night</td>

                                                        <td>₦{{ number_format( $booking['rooms'][0]->room->price) }} </td>
                                                    </tr>

                                                    <tr class="mb-1">
                                                        <td class="text-muted">Total price</td>

                                                        <td> ₦{{ number_format($booking['total_price']) }} </td>
                                                    </tr>

                                                    <tr class="mb-1">
                                                        <td class="text-muted">Payment type</td>

                                                        <td class="text-capitalize">{{ $booking['payment_type'] }}</td>
                                                    </tr>

                                                    <tr class="mb-1">
                                                        <td class="text-muted">Payment status</td>

                                                        <td class="text-capitalize">{{ $booking['payment_status'] }}</td>
                                                    </tr>
                                                    <tr class="mb-1">
                                                        <td class="text-muted">Amount paid</td>

                                                        <td>
                                                            ₦
                                                            {{ $booking['payment_status'] == 'pending' ? '0' : $booking['total_price'] }}
                                                        </td>
                                                    </tr>
                                                </table>

                                                <div class="d-flex justify-content-between">

                                                    <div>
                                                        <button type="button" class="btn btn-primary btn-sm">
                                                            Print invoice
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
            </div>




            @endif
        </div>
    </div>
    </div>
    </div>
@endsection
