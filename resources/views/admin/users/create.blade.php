@extends('layouts.admin')
@section('content')
    @include('layouts.includes.status')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add User
                        <a href="{{ url('admin/users') }}"
                            class="btn btn-sm btn-danger text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/users/store') }}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class=" col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email"> Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                                 @error('email') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>                           
                            <div class=" col-md-6 mb-3">
                                <label for="status">Role</label><br />
                                <select name="role_id" class="form-select">
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                                @error('role_id') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                             <div class=" col-md-6 mb-3">
                                <label for="password"> Password</label>
                                <input type="text" name="password" id="password" class="form-control">
                                 @error('password') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                             <div class=" col-md-6 mb-3">
                                <label for="password_confirmation"> Password Confirmation</label>
                                <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                                 @error('password_confirmation') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary text-white float-end">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
