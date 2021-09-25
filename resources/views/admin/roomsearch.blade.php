@extends('layouts.admin')
@php
$nums = 100;
@endphp

@section('content')
    <div class="container-fluid pb-5">
         {{ Breadcrumbs::render('searchroom') }}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Available Rooms</h4>


        </div>
        <div class="mb-5">
            <search-room> </search-room>
        </div>


        <div>
            <room-result></room-result>

        </div>


    </div>

@endsection
