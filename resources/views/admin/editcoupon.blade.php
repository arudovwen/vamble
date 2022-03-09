@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('coupons') }}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Edit Coupon</h4>

        </div>


        <!--  -->
        <div class=" " id="editcoupon">
            <div class="">

                <div class="content">
                    <form action="{{ route('updatecoupon', ['coupon' => $coupon->id]) }}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="body">
                            <div class="container p-5 w-50 mx-auto">




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



                                <div class="mt-5 text-right">

                                    <button type="submit" class="btn btn-primary btn-sm ml-auto">Update coupon</button>
                                </div>



                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
