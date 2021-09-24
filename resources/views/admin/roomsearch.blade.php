@extends('layouts.admin')
@php
$nums = 100;
@endphp

@section('content')
    <div class="container-fluid py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Available Rooms</h2>


        </div>
        <div class="mb-5">
            <search-room> </search-room>
        </div>


        <div>
            <room-result></room-result>

        </div>


    </div>

@endsection
