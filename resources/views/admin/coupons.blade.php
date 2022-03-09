@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('coupons') }}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Coupons</h4>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addcoupon"><i
                    class="fa fa-plus" aria-hidden="true"></i> Add
            </button>
        </div>
        <div class="row">

            <div class="col-sm-12">
                @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong> {{ Session::get('success') }}</strong>
                    </div>
                @endif
                @if (Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong> {{ Session::get('error') }}</strong>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        List
                    </div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-between  align-items-center pb-2">

                            <div class=" d-flex align-items-center">

                            </div>

                        </div>
                        <table class="table table-bordered  table-striped bg-white mb-0">
                            <thead>
                                <tr>

                                    <th>Coupon </th>
                                    <th>Discount</th>
                                    <th>No of Users</th>

                                    <th>Status</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td scope="row" class="text-uppercase ">{{ $coupon->coupon }}</td>
                                        <td scope="row" class="text-capitalize">{{ $coupon->discount }}%</td>
                                        <td>{{ $coupon->count }}</td>
                                        <td scope="row" class="text-capitalize">{{ $coupon->status ? 'Active' : 'Inactive' }}
                                        </td>



                                        <td scope="row" class="d-flex ">

                                            <a href="{{ route('editcoupon', ['coupon' => $coupon->id]) }}">
                                                <button type="button" class="btn btn-info btn-sm mr-2"
                                                    style="font-size: .65rem">Edit</button></a>


                                            <form method="post" class="delete_form"
                                                action="{{ route('dropcoupon', $coupon->id) }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="font-size: .65rem">Drop</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-muted ">

                        {!! $coupons->links() !!}
                    </div>

                </div>

            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="addcoupon" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <form method="POST" action="/coupons">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Coupon creation form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">




                                    <div class="">

                                        <div class="form-group">
                                            <label for="discount">Discount(%)</label>
                                            <input type="number" class="form-control" required name="discount"
                                                id="discount" aria-describedby="helpId" placeholder="">

                                        </div>
                                    </div>




                                    <div class="">

                                        <div class="form-group">
                                            <label for="count">Total Number</label>
                                            <input type="number" class="form-control" required name="count" id="count"
                                                aria-describedby="helpId" placeholder="">

                                        </div>
                                    </div>






                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Create coupon</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
