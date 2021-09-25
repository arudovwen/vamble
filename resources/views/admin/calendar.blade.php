@extends('layouts.admin')

@section('content')
    <div class="container-fluid" style="height:90vh">
        {{ Breadcrumbs::render('calendar') }}

        <div class="row">
            <div class="col-12">
                <event-calendar :calendar="{{ $events }}"></event-calendar>
            </div>
        </div>
    </div>
@endsection
