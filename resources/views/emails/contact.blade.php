@component('mail::message')
    # New message from {{ $name }}

    {{ $body }}


    From name: {{ $name }},
    From email : <a href="mailto:{{ $email }}"> {{ $email }}</a>
@endcomponent
