@extends('layouts.admin')
@section('content')
<base href="/public">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category
                        <a href="{{ url('admin/category/create') }}"
                            class="btn btn-sm btn-primary text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/'.$category->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class=" col-md-6 mb-3">
                                <label for="Name">Name</label>
                                <input type="text" name="name" value="{{ $category->name }}" id="name" class="form-control">
                                @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" value="{{ $category->slug }}" id="slug" class="form-control">
                                 @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" rows="3" id="description" class="form-control">{{ $category->description }}</textarea>
                                @error('description') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img class="img-responsive mt-2" style="width:300px; height:200px;" alt="image" src="/Uploads/Category/{{$category->image}}">
                                 @error('image') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="status">Status</label><br />
                                <input type="checkbox" name="status" id="status">
                                @error('status') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-5 mt-5">
                                <h3>SEO Tags</h3>
                            </div>
                            <div class=" col-md-12 mb-3">
                                <label for="meta_title">Meta_title</label>
                                <input type="text" value="{{ $category->meta_title }}" name="meta_title" id="meta_title" class="form-control">
                                @error('meta_title') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-12 mb-3">
                                <label for="meta_keyword">Meta_Keyword</label>
                                <textarea type="text" name="meta_keyword" id="meta_keyword" rows="3" class="form-control">{{ $category->name }}</textarea>
                                @error('meta_keyword') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-12 mb-3">
                                <label for="meta_description">Meta_description</label>
                                <textarea type="text" name="meta_description" id="meta_description" rows="3" class="form-control">{{ $category->name }}</textarea>
                                @error('meta_description') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary text-white float-end">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
