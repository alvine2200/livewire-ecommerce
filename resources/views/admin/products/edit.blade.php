@extends('layouts.admin')
@section('content')
    @include('layouts.includes.status')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Products</h4>
                    <a href="{{ url('admin/products') }}" class="btn btn-danger  btn-sm float-end text-white">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/products/' . $product->id . '/update') }}" method="POST"
                        enctype="multipart/form-data">
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
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="product_colors-tab" data-bs-toggle="tab"
                                    data-bs-target="#product_colors" type="button" role="tab"
                                    aria-controls="product_colors" aria-selected="false">Product Color</button>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane  active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="mb-3 mt-3">
                                    <label class="mb-2" for="category">Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $product->category_id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                            {{-- <option value="{{ $product->categories->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option> --}}
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name">Product Name</label>
                                    <input type="text" value="{{ $product->name }}" name="name" class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slug">Product Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control"
                                        id="">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="mb-2" for="brand_id">Select Brand</label>
                                    <select name="brand_id" class="form-control" id="">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="small-description">Small Description (< 500 Words)</label>
                                            <textarea type="text" name="small-description" class="form-control" rows="3">{{ $small_description }}</textarea>
                                            @error('small-description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="seo-tags" role="tabpanel"
                                aria-labelledby="seo-tags-tab">
                                <div class="mb-3 mt-3">
                                    <label for="meta_title">Meta_title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ $product->meta_title }}" id="">
                                    @error('meta_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" class="form-control" rows="3">{{ $product->meta_keyword }}</textarea>
                                    @error('meta_keyword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea type="text" name="meta_description" class="form-control" rows="3">{{ $product->meta_description }}</textarea>
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
                                            <input type="number" name="original_price"
                                                value="{{ $product->original_price }}" class="form-control">
                                            @error('original_price')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="">Selling Price</label><br />
                                            <input type="number" name="selling_price"
                                                value="{{ $product->selling_price }}" class="form-control">
                                            @error('selling_price')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="quantity">Quantity</label><br />
                                            <input type="number" name="quantity" value="{{ $product->quantity }}"
                                                class="form-control">
                                            @error('quantity')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="trending">Trending</label><br />
                                            <input type="checkbox" name="trending"
                                                {{ $product->trending == '1' ? 'checked':'' }}>
                                            @error('trending')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="featured">Featured</label><br />
                                            <input type="checkbox" name="featured"
                                                {{ $product->featured == '1' ? 'checked' : '' }}>
                                            @error('featured')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3 mb-3">
                                            <label for="status">Status</label><br />
                                            <input type="checkbox" name="status"
                                                value="{{ $product->status == ' 1' ? 'checked' : '' }}">
                                            @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="product_images" role="tabpanel"
                                aria-labelledby="product_images-tab">
                                <div class="mb-3 mt-3 ">
                                    <label for="image">Select Images</label><br />
                                    <input type="file" multiple name="image[]" class="form-control">
                                    @if ($relation = $product->productImages)
                                        <div class="mt-3 row mb-3">
                                            @foreach ($relation as $img)
                                                <div class="col-md-2 text-center d-grid align-items-center">
                                                    <img style="width:150px; height:80px; padding:3px;" alt="image"
                                                        src="{{ asset('Uploads/Products/' . "$img->image") }}">
                                                    <a class="btn btn-sm btn-danger mt-2 text-white"
                                                        onclick="return confirm('Are You sure you want to remove this Image?')"
                                                        href="{{ url('admin/products/' . $img->id . '/remove_image') }}">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h4>No Images Found</h4>
                                    @endif

                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="product_colors" role="tabpanel"
                                aria-labelledby="product_colors-tab">
                                <div class="mb-3 mt-3 col-md-12">
                                    <label for="colors">Select Product Colors</label><br />
                                    <div class="row">
                                        @forelse ($colors as $color)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color: <input class="mb-3" type="checkbox"
                                                        name="colors[{{ $color->id }}]"
                                                        value="{{ $color->id }}">{{ $color->name }}<br />
                                                    Quantity: <input type="number"
                                                        name="colorquantity[{{ $color->id }}]"
                                                        style="width: 70px; border:1px solid grey;">
                                                </div>
                                            </div>
                                        @empty
                                            <div>
                                                No Color Found
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($product->productColors as $prodColor)
                                                <tr class="product_color_tr">
                                                    <td>
                                                        @if ($prodColor->colors)
                                                            {{ $prodColor->colors->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3">
                                                            <input
                                                                class="form-control form-control-sm ProductColorQuantity"
                                                                value="{{ $prodColor->quantity }}" style="width: 150px"
                                                                type="text">
                                                            <button type="button" value="{{ $prodColor->id }}"
                                                                class="updateProductColorBtn btn btn-sm btn-primary text-white">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $prodColor->id }}"
                                                            class="deleteProductColorBtn btn btn-sm btn-danger text-white">Delete</button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No table data</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="add_product mt-3">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.updateProductColorBtn', function() {
                var prod_color_id = $(this).val();
                var product_id = "{{ $product->id }}";
                var prod_qty = $(this).closest('.product_color_tr').find('.ProductColorQuantity').val();
                // alert(prod_qty);

                if (prod_qty <= 0) {
                    alert('Quantity is required')
                    return false;
                }
                var data = {
                    'product_id': product_id,
                    'prod_color_id': prod_color_id,
                    'prod_qty': prod_qty,
                };

                // console.log(data);
                $.ajax({
                    type: 'POST',
                    url: '/admin/product_color/' + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message)
                    }
                });
            }); 
            $(document).on('click', '.deleteProductColorBtn', function() {
                var prod_color_id = $(this).val(); 
                var thisClick=$(this);

                // thisClick.closest('.product_color_tr').remove();
                // alert('Row removed');
                
                $.ajax({
                    type: 'GET',
                    url: '/admin/product_color/' + prod_color_id+'/delete',
                    success: function(response) {
                        thisClick.closest('.product_color_tr').remove();
                        alert(response.message);
                    }
                });
                
            });         
        });

    </script>
@endsection
