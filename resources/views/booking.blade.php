@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('booking') }}
    <div style="min-height: 50vh">
        <booking-page></booking-page>
    </div>
@endsection
