@extends('layouts.admin')
@section('content')
@include('layouts.includes.status')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products</h4>
                    <a href="{{ url('admin/products') }}" class="btn btn-danger  btn-sm float-end text-white">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/products/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seo-tags-tab" data-bs-toggle="tab" data-bs-target="#seo-tags"
                                    type="button" role="tab" aria-controls="seo-tags" aria-selected="false">SEO
                                    Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                    type="button" role="tab" aria-controls="details"
                                    aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="product_images-tab" data-bs-toggle="tab"
                                    data-bs-target="#product_images" type="button" role="tab"
                                    aria-controls="product_images" aria-selected="false">Product Images</button>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane  active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="mb-3 mt-3">
                                    <label class="mb-2" for="category">Category</label>
                                    <select name="category_id" class="form-control" id="">
                                        @foreach ($categories as $category)
                                            <option class="form-control" value="{{ $category->id }}">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control" id="">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slug">Product Slug</label>
                                    <input type="text" name="slug" class="form-control" id="">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="mb-2" for="brand_id">Select Brand</label>
                                    <select name="brand_id" class="form-control" id="">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="small-description">Small Description (< 500 Words)</label>
                                            <textarea type="text" name="small-description" class="form-control" rows="3"></textarea>
                                            @error('small-description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control" rows="3"></textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="seo-tags" role="tabpanel"
                                aria-labelledby="seo-tags-tab">
                                <div class="mb-3 mt-3">
                                    <label for="meta_title">Meta_title</label>
                                    <input type="text" name="meta_title" class="form-control" id="">
                                    @error('meta_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" class="form-control" rows="3"></textarea>
                                    @error('meta_keyword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea type="text" name="meta_description" class="form-control" rows="3"></textarea>
                                    @error('meta_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="details" role="tabpanel"
                                aria-labelledby="details-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="">Original Price</label><br />
                                            <input type="number" name="original_price" class="form-control">
                                            @error('original_price')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="">Selling Price</label><br />
                                            <input type="number" name="selling_price" class="form-control">
                                            @error('selling_price')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="quantity">Quantity</label><br />
                                            <input type="number" name="quantity" class="form-control">
                                            @error('quantity')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="trending">Trending</label><br />
                                            <input type="checkbox" name="trending">
                                            @error('trending')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="status">Status</label><br />
                                            <input type="checkbox" name="status">
                                            @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="product_images" role="tabpanel"
                                aria-labelledby="product_images-tab">
                                <div class="mb-3 mt-3 col-md-6">
                                    <label for="image">Select Images</label><br />
                                    <input type="file" multiple class="form-control" name="image[]">
                                </div>

                            </div>
                        </div>
                        <div class="add_product mt-3">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
