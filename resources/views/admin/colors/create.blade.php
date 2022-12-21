@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Colors
                        <a href="{{ url('admin/colors') }}"
                            class="btn btn-sm btn-danger text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class=" col-md-12 mb-3">
                                <label for="Name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-12 mb-3">
                                <label for="code"> Color Code</label>
                                <input type="text" name="code" id="code" class="form-control">
                                 @error('code') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="status">Status</label><br />
                                <input type="checkbox" name="status" id="status" style=" height:40px; width:20px;">  Checked="Hidden",  Unchecked="Visible"
                                @error('status') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary text-white float-end">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
