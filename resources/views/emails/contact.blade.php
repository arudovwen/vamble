@component('mail::message')
    # New message from {{ $name }}

    {{ $body }}


    Customer name: {{ $name }},
    Customer email :  {{ $email }}
@endcomponent
