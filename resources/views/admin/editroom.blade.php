@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('rooms') }}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Edit Home</h4>

        </div>


        <!--  -->
        <div class=" " id="editroom">
            <div class="">

                <div class="content">
                   <form action="{{ route('updateroom', ['room' => $room->id]) }}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="body">
                            <div class="container p-5">



                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Flat type</label>
                                            <select value="{{ $room->flat_type }}" class="form-control" required name="flat_type" id="flat_type">
                                                <option value="standard">Standard</option>
                                                <option value="executive">Executive</option>
                                                <option value="platinum">Platinum</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="short_name">Type </label>

                                            <select class="form-control"  value="{{ $room->flat_name }}" required name="flat_name" id="flat_name">
                                                <option value="room">Room</option>
                                                <option value="apartment">Apartment</option>

                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="short_name">Home no</label>
                                            <input type="text"  value="{{ $room->room_name }}" class="form-control" required name="room_name"
                                                id="room_name" aria-describedby="helpId" placeholder="">

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="occupancy">Floor</label>
                                            <select class="form-control"  value="{{ $room->floor }}" required name="floor" id="floor">
                                                @for ($num = 1; $num < 100; $num++)

                                                    <option value={{ $num }}>{{ $num }}</option>
                                                @endfor

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="occupancy">Max Occupancy</label>
                                            <select class="form-control"  value="{{ $room->max_occupancy }}" name="max_occupancy" required id="occupancy">
                                                @for ($num = 1; $num < 100; $num++)

                                                    <option value={{ $num }}>{{ $num }}</option>
                                                @endfor

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="price">Room Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">₦</span>
                                                <input type="number" name="price"  value="{{ $room->price }}" required id="price" class="form-control"
                                                    placeholder="Price" aria-label="Price" aria-describedby="price">
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control"  required name="description" id="description"
                                                rows="3"> {{ $room->description }}</textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">

                                    <button type="submit" class="btn btn-primary btn-sm">Update room</button>
                                </div>



                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
