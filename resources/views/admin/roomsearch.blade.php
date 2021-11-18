@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('searchroom') }}

        <div class="mb-4 ">
            <search-room> </search-room>
        </div>


        <div class="pb-5">
            <room-result></room-result>

        </div>


    </div>

@endsection
