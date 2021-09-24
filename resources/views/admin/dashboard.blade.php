@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <div class="row mb-5">

            <div class="col-sm-3  text-center ">
                <div class="w-100 h-100 py-3 text-center bg-white rounded  shadow-sm border-left border-success">
                    <strong>Total Customers</strong> <br>
                    <br>
                    <div class="d-flex justify-content-around align-items-center">
                        <span class="fa-2x ">8</span>
                        <i class="fas fa-users  fa-2x text-success"></i>
                    </div>

                </div>
            </div>
            <div class="col-sm-3  text-center ">
                <div class="w-100 h-100 py-3 text-center bg-white rounded  shadow-sm border-left border-info">
                    <strong>Available Rooms</strong> <br>
                    <br>
                    <div class="d-flex justify-content-around align-items-center">
                        <span class="fa-2x">8</span>
                        <i class="fa fa-bed fa-2x  text-info" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-3  text-center">
                <div class="w-100 h-100 py-3 text-center bg-white rounded  shadow-sm border-left border-danger">
                    <strong>Today Reservations</strong>
                    <br> <br>
                    <div class="d-flex justify-content-around align-items-center">
                        <span class="fa-2x ">8</span>
                        <i class="fas fa-calendar-plus fa-2x text-danger" aria-hidden="true"></i>
                    </div>
                </div>

            </div>
            <div class="col-sm-3  text-center">
                <div class="w-100 h-100 py-3 text-center bg-white rounded shadow-sm border-left border-warning ">
                    <strong>Today
                        Check-In</strong>
                    <br><br>
                    <div class="d-flex justify-content-around align-items-center">
                        <span class="fa-2x ">8</span>
                        <i class="fas fa-user-check   fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div id="charter" style="height: 300px;"></div>
            </div>
        </div>
    </div>

@endsection
