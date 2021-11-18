@extends('layouts.app')

@section('content')
    <div class="container transaction p-5">
        <div class="card" style="min-width: 400px">

            <div class="card-body">
                <h4 class="card-title">Reservation information</h4>
                <table class="table table-bordered table-striped">
                    <tr class="mb-1">
                        <td class="text-muted">Booking #</td>

                        <td>#{{ $data->booking_no }}</td>
                    </tr>
                    <tr class="mb-1">
                        <td class="text-muted"> Date</td>

                        <td>{{ $data->created_at }}</td>
                    </tr>

                    <tr class="mb-1">
                        <td class="text-muted">Guest name</td>

                        <td class="text-capitalize">{{ $data->user->name }}</td>
                    </tr>

                    <tr class="mb-1">
                        <td class="text-muted">Guest email</td>

                        <td>{{ $data->user->email }}</td>
                    </tr>

                    <tr class="mb-1">
                        <td class="text-muted">Apartment type</td>

                        <td class="text-capitalize">{{ $data->room->name }}</td>
                    </tr>

                    <tr class="mb-1">
                        <td class="text-muted">Check-in Date</td>

                        <td>{{ $data->check_in }}</td>
                    </tr>
                    <tr class="mb-1">
                        <td class="text-muted">Check-out Date</td>

                        <td>{{ $data->check_out }}</td>
                    </tr>

                    <tr class="pr-3">
                        <td class="text-muted">No of guests</td>

                        <td>{{ $data->no_of_guests }}</td>
                    </tr>

                    <tr class="mb-1">
                        <td class="text-muted">No of nights</td>

                        <td>{{ $data->duration }}</td>
                    </tr>
                    <tr class="mb-1">
                        <td class="text-muted">No of rooms</td>

                        <td>{{ $data->no_of_rooms }}</td>
                    </tr>

                    <tr class="mb-1">
                        <td class="text-muted">Price per night</td>

                        <td>{{ $data->room->price }}</td>
                    </tr>

                    <tr class="mb-1">
                        <td class="text-muted">Total price</td>

                        <td>₦{{ number_format($data->total_price) }}</td>
                    </tr>

                </table>


                <form action="/transaction/initiate" method="POST">
                    @csrf

                    <input type="email" class="form-control" value="{{ $data->user->email }}" hidden name="email"
                        id="email">
                    <input type="number" class="form-control" value="{{ $data->total_price }}" hidden name="amount"
                        id="amount">
                    <input type="text" class="form-control" value="{{ $data->id }}" hidden name="reservation_id"
                        id="reservation_id">

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mx-auto">Proceed to payment</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @if (session()->has('url'))
        @section('javascript')
            <script>
                window.open('{{ session()->get('url') }}');
            </script>
        @endsection
    @endif
@endsection
