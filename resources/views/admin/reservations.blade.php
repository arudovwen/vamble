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
                                <form action="{{ route('searchreservation') }}" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <span class="input-group-btn ">
                                            <button class="btn btn-primary btn-sm" type="submit" title="Search projects">
                                                <span class="fas fa-search"></span>
                                            </button>
                                        </span>
                                        <input type="search" required class="form-control form-control-sm" name="query"
                                            id="name" aria-describedby="helpId" placeholder="Search name or booking number">
                                        <span class="input-group-btn ml-3">
                                            <a href="{{ route('reservations') }}">
                                                <button class="btn btn-info btn-sm" type="button">

                                                    Reset <i class="fa fa-recycle" aria-hidden="true"></i>


                                                </button></a>
                                        </span>
                                    </div>
                                </form>



                            </div>
                        </div>

                        <table class="table table-bordered table-striped bg-white mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Guest Name</th>
                                    <th>Flat type</th>
                                    <th>Flat/Room</th>


                                    <th> Rooms</th>
                                    <th> Nights</th>
                                    <th>Amount </th>
                                    <th> Status</th>

                                    <th>Check in/out</th>


                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td class="text-capitalize">{{ $reservation->booking_no }}</td>
                                        <td scope="row" class="text-capitalize">{{ $reservation->user->name }}</td>
                                        <td scope="row" class="text-capitalize">
                                            {{ $reservation->roomcalendar[0]->room->flat_type }}
                                        </td>


                                        <td class="text-capitalize">
                                            @foreach ($reservation->roomcalendar as $calendar)
                                                <span>{{ $calendar->room->flat_name }} -
                                                    {{ $calendar->room->room_name }}</span>
                                                @if (!$loop->last)
                                                    <span>,</span>
                                                @endif
                                            @endforeach

                                        </td>

                                        <td>{{ $reservation->no_of_rooms }}</td>
                                        <td>{{ $reservation->duration }}</td>
                                        <td class="text-capitalize">
                                            ₦{{ number_format($reservation->total_price) }}
                                        </td>

                                        <td class="text-capitalize"> {{ $reservation->payment_status }} </td>


                                        <td>
                                            @if ($reservation->status == 'reserved')
                                                <form action="/customer/checkin/{{ $reservation->id }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary mr-2"
                                                        style="font-size: .65rem">Check-in</button>
                                                </form>

                                            @elseif ($reservation->status == 'checked in')
                                                <form action="/customer/checkout/{{ $reservation->id }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary mr-2"
                                                        style="font-size: .65rem">Check-out</button>
                                                </form>
                                            @else
                                                Checked out
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-around ">


                                            <button type="button" class="btn btn-success btn-sm mr-2" data-toggle="modal"
                                                data-username="{{ $reservation->user->name }}"
                                                data-email="{{ $reservation->user->email }}"
                                                data-checkin="{{ $reservation->check_in }}"
                                                data-checkout="{{ $reservation->check_out }}"
                                                data-checkintime="{{ $reservation->check_in_time }}"
                                                data-checkouttime="{{ $reservation->check_out_time }}"
                                                data-roomname="{{ $reservation->roomcalendar }}"
                                                data-pricepernight="{{ $reservation->price_per_night }}"
                                                data-guests="{{ $reservation->no_of_guests }}"
                                                data-nights="{{ $reservation->duration }}"
                                                data-rooms="{{ $reservation->no_of_rooms }}"
                                                data-payment_type="{{ $reservation->payment_type }}"
                                                data-totalprice="{{ $reservation->total_price }}"
                                                data-payment_status="{{ $reservation->payment_status }}"
                                                data-amountpaid="{{ $reservation->total_price }}"
                                                data-bookedrooms="{{ $reservation->roomcalendar }}"
                                                data-target="#viewdetail" style="font-size: .65rem">View</button>
                                            @if ($reservation->status == 'reserved')
                                                <a
                                                    href="{{ route('editreservation', ['reservation' => $reservation->id]) }}">
                                                    <button type="button" class="btn btn-info btn-sm mr-2"
                                                        style="font-size: .65rem">Edit</button></a>
                                                <form method="post" class="delete_form"
                                                    action="{{ route('admindropreservation', $reservation->id) }}">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        style="font-size: .65rem">Drop</button>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer  ">
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
                            <td class="">Guest name</td>

                            <td class="text-capitalize" id="username"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="">Guest email</td>

                            <td id="email"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="">Apartment type</td>

                            <td class="text-capitalize" id="roomname"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="">Check-in </td>

                            <td id="checkin"></td>
                        </tr>
                        <tr class="mb-1">
                            <td class="">Check-out </td>

                            <td id="checkout"></td>
                        </tr>
                        <tr class="mb-1">
                            <td class="">Check-in time</td>

                            <td id="checkintime">Not available</td>
                        </tr>
                        <tr class="mb-1">
                            <td class="">Check-out time</td>

                            <td id="checkouttime">Not available</td>
                        </tr>

                        <tr class="pr-3">
                            <td class="">No of guests</td>

                            <td id="guests"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="">No of nights</td>

                            <td id="nights"></td>
                        </tr>
                        <tr class="mb-1">
                            <td class="">No of rooms</td>

                            <td id="rooms"></td>
                        </tr>
                        <tr class="mb-1">
                            <td class="">Booked rooms</td>

                            <td id="bookedrooms" class="text-capitalize"></td>
                        </tr>


                        <tr class="mb-1">
                            <td class="">Price per night</td>

                            <td id="pricepernight"> </td>
                        </tr>

                        <tr class="mb-1">
                            <td class="">Total price</td>

                            <td id="totalprice"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="">Payment type</td>

                            <td class="text-capitalize" id="payment_type"></td>
                        </tr>

                        <tr class="mb-1">
                            <td class="">Payment status</td>

                            <td class="text-capitalize" id="payment_status"></td>
                        </tr>
                        <tr class="mb-1">
                            <td class="">Amount paid</td>

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
            var checkintime = info.data("checkintime");
            var checkouttime = info.data("checkouttime");
            var roomname = info.data("roomname").slice(0, 1).map(item => {
                return `${item.room.flat_type} apartment`
            }).toString();
            var rooms = info.data("rooms");
            var pricepernight = info.data("pricepernight");
            var guests = info.data("guests");
            var nights = info.data("nights");
            var payment_type = info.data("payment_type");
            var totalprice = info.data("totalprice");
            var payment_status = info.data("payment_status");
            var amountpaid = info.data("amountpaid");
            var bookedrooms = info.data("bookedrooms").map(item => {
                return `${item.room.flat_name} / ${item.room.room_name}`
            }).toString();


            var modal = $(this);

            modal.find(".modal-title").text("Reservation detail");
            modal.find(".modal-body #username").text(username);
            modal.find(".modal-body #email").text(email);
            modal.find(".modal-body #rooms").text(rooms);
            modal.find(".modal-body #checkin").text(moment(checkin).format("ll"));
            modal.find(".modal-body #checkout").text(moment(checkout).format("ll"));
            if (checkintime) {
                modal.find(".modal-body #checkintime").text(moment(checkintime).format("ll , hh:mm A"));
            }
            if (checkouttime) {
                modal.find(".modal-body #checkouttime").text(moment(checkouttime).format("ll , hh:mm A"));
            }

            modal.find(".modal-body #roomname").text(roomname);
            modal.find(".modal-body #pricepernight").text(currency(pricepernight));
            modal.find(".modal-body #guests").text(guests);
            modal.find(".modal-body #nights").text(nights);
            modal.find(".modal-body #payment_type").text(payment_type);
            modal.find(".modal-body #totalprice").text(currency(totalprice));
            modal.find(".modal-body #payment_status").text(payment_status);
            modal.find(".modal-body #amountpaid").text(currency(amountpaid));
            modal.find(".modal-body #bookedrooms").text(bookedrooms);
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
