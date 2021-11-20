@extends('layouts.admin')

@section('content')
    <div class="container-fluid pb-5">
        {{ Breadcrumbs::render('customers') }}
        <h4 class="mb-4">Customers</h4>
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>List</span>



                            <a class="btn btn-success btn-sm" href="{{ route('export-users') }}">Export Users</a>

                    </div>
                    <div class="card-body ">
                        <div class="d-flex justify-content-between  align-items-center pb-2">

                            <div class=" d-flex align-items-center">
                                <div class="form-group d-flex align-items-center m-0">

                                </div>
                            </div>
                            <div class="form-group m-0">

                                <form action="{{ route('usersearch') }}" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <span class="input-group-btn ">
                                            <button class="btn btn-primary btn-sm" type="submit" title="Search projects">
                                                <span class="fas fa-search"></span>
                                            </button>
                                        </span>
                                        <input type="search" required class="form-control form-control-sm" name="query"
                                            id="name" aria-describedby="helpId" placeholder="Search name ">
                                        <span class="input-group-btn ml-3">
                                            <a href="{{ route('users') }}">
                                                <button class="btn btn-info btn-sm" type="button">

                                                    Reset <i class="fa fa-recycle" aria-hidden="true"></i>


                                                </button></a>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                        <table class="table table-bordered table-striped bg-white mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Nationality</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td scope="row" class="text-capitalize">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td class="" style=" width:160px">
                                            <div style=" width:160px" class="d-block text-truncate">{{ $user->address }}
                                            </div>
                                        </td>
                                        <td class="text-capitalize">{{ $user->gender }}</td>
                                        <td class="text-capitalize">{{ $user->nationality ? $user->nationality : '-' }}
                                        </td>
                                        <td scope="row">
                                            <form method="post" class="delete_form"
                                                action="{{ route('userdelete', $user->id) }}">
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
                    <div class="card-footer text-muted">
                        {!! $users->links() !!}

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
