@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('booking') }}
    <booking-page></booking-page>
@endsection
