@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-sm-5">
        {{ Breadcrumbs::render('dashboard') }}
        <div class="row mb-5">

            <div class="col-sm-3  text-center mb-4">
                <div  class="w-100 h-100 py-3 text-center bg-white rounded  shadow-sm border-left border-success">
                    <strong>Total Customers</strong> <br>
                    <br>
                    <div class="d-flex justify-content-around align-items-center">
                        <span class="fa-2x ">{{ $customers }}</span>
                        <i class="fas fa-users  fa-2x text-success"></i>
                    </div>

                </div>
            </div>
            <div class="col-sm-3  text-center mb-4">
                <div class="w-100 h-100 py-3 text-center bg-white rounded  shadow-sm border-left border-info">
                    <strong>Available Rooms</strong> <br>
                    <br>
                    <div class="d-flex justify-content-around align-items-center">
                        <span class="fa-2x">{{ $rooms }}</span>
                        <i class="fa fa-bed fa-2x  text-info" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-3  text-center mb-4">
                <div class="w-100 h-100 py-3 text-center bg-white rounded  shadow-sm border-left border-danger">
                    <strong>Today Reservations</strong>
                    <br> <small>This week</small> <br>
                    <div class="d-flex justify-content-around align-items-center">
                        <span class="fa-2x ">{{ $data->count() }}</span>
                        <i class="fas fa-calendar-plus fa-2x text-danger" aria-hidden="true"></i>
                    </div>
                </div>

            </div>
            <div class="col-sm-3  text-center mb-4">
                <div class="w-100 h-100 py-3 text-center bg-white rounded shadow-sm border-left border-warning ">
                    <strong>Today's
                        Check-In</strong>
                    <br><br>
                    <div class="d-flex justify-content-around align-items-center">
                        <span class="fa-2x ">{{ $checkin->count() }}</span>
                        <i class="fas fa-user-check   fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm-8 text-center ">

                <customers-chart :customers="{{ $data }}"></customers-chart>

            </div>

            <div class="col-sm-3 p-3 rounded shadow-sm p-sm-4 offset-sm-1 bg-white">
                <h6 class="font-weight-bold mb-4 d-flex justify-content-between align-items-center"><span>Quick
                        Actions</span> </h6>

                <div>
                    <a href="{{ route('rooms') }}" class="text-decoration-none"> <button type="button"
                            class="btn btn-dark btn-lg btn-block mb-4 font-size-15  d-flex justify-content-between align-items-center"><span>Add
                                Room</span> <i class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
                    <a href="{{ route('reservations') }}" class="text-decoration-none"> <button type="button"
                            class="btn btn-dark btn-lg btn-block mb-4 font-size-15  d-flex justify-content-between align-items-center">{{ __('Make Reservation') }}
                            <i class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
                    <button type="button"
                        class="btn btn-dark btn-lg btn-block mb-4 font-size-15  d-flex justify-content-between align-items-center"
                        data-toggle="modal" data-target="#checkId">Search booking# <i class="fa fa-arrow-right"
                            aria-hidden="true"></i>
                    </button>
                    <button type="button"
                        class="btn btn-dark btn-lg btn-block mb-4 font-size-15  d-flex justify-content-between align-items-center"
                        data-toggle="modal" data-target="#namesearch"> Name/Email search
                        <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
                    <a href="{{ route('transactions') }}" class="text-decoration-none"> <button type="button"
                            class="btn btn-dark btn-lg btn-block font-size-15  d-flex justify-content-between align-items-center">View
                            Transactions <i class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="checkId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">Search booking</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <search-booking></search-booking>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="namesearch" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">Search name or email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <search-name></search-name>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
