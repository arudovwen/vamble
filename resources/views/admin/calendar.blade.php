@extends('layouts.admin')

@section('content')
    <div class="container-fluid d-flex justify-content-between align-items-center" style="height:100vh">

        <event-calendar :calendar="{{ $events }}"></event-calendar>
    </div>
@endsection
