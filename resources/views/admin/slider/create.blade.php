@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Slider
                        <a href="{{ url('admin/slider') }}"
                            class="btn btn-sm btn-danger text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/slider/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class=" col-md-12 mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                                @error('title') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-12 mb-3">
                                <label for="description"> Description</label>
                                <textarea type="text" name="description" rows="4" id="description" class="form-control"></textarea>
                                 @error('description') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="image">Image</label><br />
                                <input type="file" class="form-control" name="image" id="status" >
                                @error('image') <small class="text-danger">{{ $message }}</small>@enderror
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
