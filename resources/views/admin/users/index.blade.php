@extends('layouts.admin')
@section('title','Users Page')
@section('content')
    @include('layouts.includes.status')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users</h4>
                    <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm float-end text-white">Add
                        Users</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->role_id == '1' ? 'Admin' : 'User' }}</td>
                                        <td>
                                            <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                                class="btn btn-sm btn-info">Edit</a> |
                                            <a onclick="return confirm('Are you sure you want to delete this user?')"
                                                href="{{ url('admin/users/' . $user->id . '/delete') }}"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7"> Not Users Available</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
