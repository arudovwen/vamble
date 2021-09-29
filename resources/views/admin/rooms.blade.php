@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('rooms') }}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Rooms</h4>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addroom"><i
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
                            <div class="form-group m-0 ">

                                <input type="seacrh" class="form-control form-control-sm" name="" id=""
                                    aria-describedby="helpId" placeholder="Search name">

                            </div>
                        </div>
                        <table class="table table-bordered  table-striped bg-white mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 110px">Short Name</th>
                                    <th style="width: 40px">Name</th>
                                    <th>Description</th>
                                    <th style="width: 40px">Floor</th>
                                    <th style="width: 110px">Max Guests</th>
                                    <th style="width: 75px">Price</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td scope="row" class="text-capitalize">{{ $room->short_name }}</td>
                                        <td scope="row" class="text-capitalize">{{ $room->name }}</td>
                                        <td>{{ $room->description }}</td>
                                        <td>{{ $room->floor }}</td>
                                        <td>{{ $room->max_occupancy }}</td>
                                        <td> ₦{{ number_format($room->price) }}</td>

                                        <td scope="row" class="d-flex ">

                                            <button type="button" class="btn btn-info btn-sm mr-2"
                                                style="font-size: .65rem">Edit</button>
                                            <form method="post" class="delete_form"
                                                action="{{ route('droproom', $room->id) }}">
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

                        {!! $rooms->links() !!}
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="addroom" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <form method="POST" action="/rooms">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Room creation form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">



                                <div class="form-group">
                                    <label for="">Room type</label>
                                    <select class="form-control" name="name" id="name">
                                        <option value="standard">Standard</option>
                                        <option value="executive">Executive</option>
                                        <option value="luxury">Luxury</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="short_name">Short Name</label>
                                    <input type="text" class="form-control" name="short_name" id="short_name"
                                        aria-describedby="helpId" placeholder="">

                                </div>
                                <div class="form-group">
                                    <label for="occupancy">Floor</label>
                                    <select class="form-control" name="floor" id="floor">
                                        @for ($num = 1; $num < 100; $num++)

                                            <option value={{ $num }}>{{ $num }}</option>
                                        @endfor

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                        rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="occupancy">Max Occupancy</label>
                                    <select class="form-control" name="max_occupancy" id="occupancy">
                                        @for ($num = 1; $num < 100; $num++)

                                            <option value={{ $num }}>{{ $num }}</option>
                                        @endfor

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Room Price</label>
                                    <div class="input-group ">
                                        <span class="input-group-text">₦</span>
                                        <input type="number" name="price" id="price" class="form-control"
                                            placeholder="Price" aria-label="Price" aria-describedby="price">
                                    </div>

                                </div>



                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Create room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
