@component('mail::message')
# You have a new reservation order

**Reservation Details** <br>
Guest name : {{ ucfirst($name) }} <br>
Guest email : {{ $email }}  <br>
Guest phone : {{ $phone }}

@component('mail::table')
|Booking no | {{ $booking_no }} |
| :-------------------- |:-------------------- |
| Check In | {{ $check_in }} |
| Check out | {{ $check_out }} |
| Flat type | {{ $flat_type }} |
| Room name| {{ $flat_name }} |
| Price per night | ₦{{ number_format($price_per_night) }} |
| No of rooms | {{ $no_of_rooms }} |
| No of guests | {{ $no_of_guests }} |
| No of nights | {{ $nights }} |
| Total price | ₦{{ number_format($total_price) }} |
| Payment type | {{ $payment_type }} |
| Payment status | {{ $payment_status }} |
@endcomponent


@endcomponent
