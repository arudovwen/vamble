@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <h2 class="mb-4">Customers</h2>
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        List
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between  align-items-center p-2">

                            <div class=" d-flex align-items-center">
                                <div class="form-group d-flex align-items-center m-0">

                                </div>
                            </div>
                            <div class="form-group m-0">

                                <input type="seacrh" class="form-control form-control-sm" aria-describedby="helpId"
                                    placeholder="Search name">

                            </div>
                        </div>
                        <table class="table table-bordered bg-white mb-0">
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
                                        <td>{{ $user->address }}</td>
                                        <td class="text-capitalize">{{ $user->gender }}</td>
                                        <td class="text-capitalize">{{ $user->nationality ? $user->nationality : '-' }}
                                        </td>
                                        <td scope="row"> <button type="button" class="btn btn-info btn-sm mr-2"
                                                style="font-size: .65rem">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                style="font-size: .65rem">Drop</button>
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
