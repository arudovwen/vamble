@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('reservations') }}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Reservations</h4>
            <a href="{{ route('roomsearch') }}"> <button type="button" class="btn btn-success btn-sm"> <i
                        class="fa fa-plus" aria-hidden="true"></i> New</button></a>
        </div>
        <div class="mb-2">
            <span><span class="text-primary">Active</span> <span class="mx-2">|</span> Previous</span>
        </div>

        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        List
                    </div>
                    <div class="card-body ">
                        @if (Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong> {{ Session::get('success') }}</strong>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between  align-items-center pb-2">

                            <div class=" d-flex align-items-center">

                            </div>
                            <div class="form-group m-0">

                                <input type="seacrh" class="form-control form-control-sm" name="" id=""
                                    aria-describedby="helpId" placeholder="Search name">

                            </div>
                        </div>
                        <table class="table table-bordered bg-white mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Room</th>
                                    <th> Guests</th>
                                    <th> Rooms</th>
                                    <th> Nights</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Amount Paid</th>


                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td scope="row" class="text-capitalize">{{ $reservation->user->name }}</td>
                                        <td class="text-capitalize">{{ $reservation->room->name }}</td>
                                        <td>{{ $reservation->no_of_guests }}</td>
                                        <td>{{ $reservation->no_of_rooms }}</td>
                                        <td>{{ $reservation->duration }}</td>
                                        <td> {{ date('j \\ F Y', strtotime($reservation->check_in)) }}</td>
                                        <td class="text-capitalize">
                                            {{ date('j \\ F Y', strtotime($reservation->check_out)) }}
                                        </td>
                                        <td class="text-capitalize">
                                            ₦{{ number_format($reservation->total_price) }}
                                        </td>
                                        <td class="d-flex ">
                                            <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                                data-username="{{ $reservation->user->name }}"
                                                data-email="{{ $reservation->user->email }}"
                                                data-checkin="{{ $reservation->check_in }}"
                                                data-checkout="{{ $reservation->check_out }}"
                                                data-roomname="{{ $reservation->room->name }}"
                                                data-pricepernight="{{ $reservation->room->price }}"
                                                data-guests="{{ $reservation->no_of_guests }}"
                                                data-nights="{{ $reservation->duration }}"
                                                data-rooms="{{ $reservation->no_of_rooms }}"
                                                data-payment_type="{{ $reservation->payment_type }}"
                                                data-totalprice="{{ $reservation->total_price }}"
                                                data-payment_status="{{ $reservation->payment_status }}"
                                                data-amountpaid="{{ $reservation->payment_status }}"
                                                data-target="#viewdetail" style="font-size: .65rem">View</button>
                                            <a
                                                href="{{ route('editreservation', ['reservation' => $reservation->id]) }}">
                                                <button type="button" class="btn btn-info btn-sm mr-2"
                                                    style="font-size: .65rem">Edit</button></a>
                                            <form method="post" class="delete_form"
                                                action="{{ route('dropreservation', $reservation->id) }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="font-size: .65rem">Drop</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-muted ">
                        {!! $reservations->links() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="viewdetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rervation details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-sm">
                        <tr class="mb-1">
                            <td class="text-muted">Guest name</td>

                            <td class="text-capitalize" id="username"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="text-muted">Guest email</td>

                            <td id="email"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="text-muted">Apartment type</td>

                            <td class="text-capitalize" id="roomname"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="text-muted">Check-in Date</td>

                            <td id="checkin"></td>
                        </tr>
                        <tr class="mb-1">
                            <td class="text-muted">Check-out Date</td>

                            <td id="checkout"></td>
                        </tr>

                        <tr class="pr-3">
                            <td class="text-muted">No of guests</td>

                            <td id="guests"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="text-muted">No of nights</td>

                            <td id="nights"></td>
                        </tr>
                        <tr class="mb-1">
                            <td class="text-muted">No of rooms</td>

                            <td id="rooms"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="text-muted">Price per night</td>

                            <td id="pricepernight"> </td>
                        </tr>

                        <tr class="mb-1">
                            <td class="text-muted">Total price</td>

                            <td id="totalprice"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="text-muted">Payment type</td>

                            <td class="text-capitalize" id="payment_type"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="text-muted">Payment status</td>

                            <td class="text-capitalize" id="payment_status"></td>
                        </tr>
                        <tr class="mb-1">
                            <td class="text-muted">Amount paid</td>

                            <td id="amountpaid">

                            </td>
                        </tr>
                    </table>


                </div>

            </div>
        </div>
    </div>


@endsection

@section('javascript')
    <script defer type="text/javascript">
        $("#viewdetail").on("show.bs.modal", function(event) {
            var info = $(event.relatedTarget);
            var username = info.data("username");
            var email = info.data("email");
            var checkin = info.data("checkin");
            var checkout = info.data("checkout");
            var roomname = info.data("roomname") + " Apartment";
            var rooms = info.data("rooms");
            var pricepernight = info.data("pricepernight");
            var guests = info.data("guests");
            var nights = info.data("nights");
            var payment_type = info.data("payment_type");
            var totalprice = info.data("totalprice");
            var payment_status = info.data("payment_status");
            var amountpaid = info.data("amountpaid");

            var modal = $(this);

            modal.find(".modal-title").text("Reservation detail");
            modal.find(".modal-body #username").text(username);
            modal.find(".modal-body #email").text(email);
            modal.find(".modal-body #rooms").text(rooms);
            modal.find(".modal-body #checkin").text(moment(checkin).format("ll"));
            modal.find(".modal-body #checkout").text(moment(checkout).format("ll"));
            modal.find(".modal-body #roomname").text(roomname);
            modal.find(".modal-body #pricepernight").text(currency(pricepernight));
            modal.find(".modal-body #guests").text(guests);
            modal.find(".modal-body #nights").text(nights);
            modal.find(".modal-body #payment_type").text(payment_type);
            modal.find(".modal-body #totalprice").text(currency(totalprice));
            modal.find(".modal-body #payment_status").text(payment_status);
            modal.find(".modal-body #amountpaid").text(currency(amountpaid));
        });

        function currency(numb) {
            var num = Number(numb);
            if (num) {
                return "₦ " + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
            } else {
                return "₦ 0.00";
            }
        }
    </script>
@endsection
