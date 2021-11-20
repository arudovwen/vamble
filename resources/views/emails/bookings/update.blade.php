@component('mail::message')
# Reservation Update

**Dear {{ $name }}**,
Your resrvation  has been updated, please find below your updated booking details,

@component('mail::table')
| Booking no | {{ $booking_no }} |
| :-------------------- |:-------------------- |
| Check In | {{ $check_in }} |
| Check out | {{ $check_out }} |
| Flat type | {{ $flat_type }} |
| Price per night | ₦{{ number_format($price_per_night) }} |
| No of rooms | {{ $no_of_rooms }} |
| No of guests | {{ $no_of_guests }} |
| No of nights | {{ $nights }} |
| Total price | ₦{{ number_format($total_price) }} |
| Payment type | {{ $payment_type }} |
| Payment status | {{ $payment_status }} |
@endcomponent

Thanks, <br>
{{ config('app.name') }} Apartment & Suites
@endcomponent
