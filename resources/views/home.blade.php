@extends('layouts.app')
@section('keywords', 'Vamble Apartments,Vamble , Apartments, Hotels, Suites,Bookings, Online
Apartments, Abuja, Abuja-Hotels,FCT-Hotels, Abuja-Apartments,Abuja-Stay,Home,Places,Jahi, Serviced Apartments Abuja')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
