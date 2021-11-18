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
                        <div class="d-flex justify-content-between  align-items-center pb-2">

                            <div class=" d-flex align-items-center">

                            </div>
                            <div class="form-group m-0">

                                <input type="seacrh" class="form-control form-control-sm" name="" id=""
                                    aria-describedby="helpId" placeholder="Search payment">

                            </div>
                        </div>
                        <table class="table table-bordered bg-white mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Payment #</th>

                                    <th>Payment type</th>
                                    <th>Amount Paid</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td scope="row" class="text-capitalize">

                                            {{ $transaction->created_at }}</td>
                                        <td scope="row" class="text-capitalize">{{ $transaction->id }}</td>


                                        <td class="text-capitalize">
                                            {{ $transaction->reservation->payment_type }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $transaction->reservation->total_price }}
                                        </td>
                                        <td scope="row">
                                            <button type="button" class="btn btn-primary btn-sm mr-2"
                                                style="font-size: .65rem">View</button>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        <div>
                            Showing 1 to 5 of {{ count($transactions) }} entries
                        </div>
                        <div>

                            <nav aria-label="Page navigation">
                                <ul class="pagination  pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
