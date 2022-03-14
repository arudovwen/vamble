@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('transactions') }}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Transactions</h4>

        </div>
        <div class="mb-2">
            <span><span class="text-primary">Today</span> <span class="mx-2">|</span> Previous</span>
        </div>

        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        List
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between  align-items-center p-3">

                            <div class=" d-flex align-items-center">

                            </div>
                            <div class="form-group m-0">
                                <form action="{{ route('searchtransactions') }}" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <span class="input-group-btn ">
                                            <button class="btn btn-primary btn-sm" type="submit" title="Search projects">
                                                <span class="fas fa-search"></span>
                                            </button>
                                        </span>
                                        <input type="search" required class="form-control form-control-sm" name="query"
                                            id="name" aria-describedby="helpId" placeholder="Search transaction">
                                        <span class="input-group-btn ml-3">
                                            <a href="{{ route('transactions') }}">
                                                <button class="btn btn-info btn-sm" type="button">

                                                    Reset <i class="fa fa-recycle" aria-hidden="true"></i>


                                                </button></a>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                       <div class="table-responsize-md mt-3">

                           @if ($transactions->count())
                            <table class="table table-bordered bg-white mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transation #</th>

                                    <th> Type</th>
                                    <th>Amount Paid</th>
                                    <th>Booking #</th>
                                     <th>Customer name</th>
                                       <th>Customer email</th>


                                </tr>
                            </thead>
                                <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td scope="row" class="text-capitalize">

                                            {{ $transaction->created_at }}</td>
                                        <td scope="row" class="text-capitalize">{{ $transaction->reference }}</td>


                                        <td class="text-capitalize">
                                            {{ $transaction->reservation->payment_type }}
                                        </td>
                                        <td class="text-capitalize">
                                             ₦{{ number_format($transaction->reservation->total_price ) }}

                                        </td>
                                        <td class="text-capitalize">
                                            {{ $transaction->reservation->booking_no }}
                                        </td>
                                         <td class="text-capitalize">
                                            {{ $transaction->user->name }}
                                        </td>
                                         <td class="">
                                            {{ $transaction->user->email }}
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                             </table>
                           @else
                         <div class="p-2">
                              <div class="alert alert-info" role="alert">
                             <i class="fa fa-info-circle mr-1" aria-hidden="true"></i> <strong>No Transaction available</strong>
                          </div>
                         </div>

                           @endif

                       </div>
                    </div>


                     <div class="card-footer text-muted ">

                        {!! $transactions->links() !!}
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
