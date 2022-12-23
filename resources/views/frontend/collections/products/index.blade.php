@extends('layouts.app')
@section('title', 'Category Products')
@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
                @forelse ($products as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($product->quantity > 0)
                                    <label class="stock bg-success"> In Stock</label>
                                @else
                                    <label class="stock bg-danger"> Out Of Stock</label>
                                @endif
                                @if ($product->productImages)
                                    <img src="{{ asset('Uploads/Products/' . $product->productImages[0]->image) }}"
                                        alt="{{ $product->name }}">
                                @else
                                    <div class="col-md-12 text-center">
                                        No Product Images
                                    </div>
                                @endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brands->name }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('collections/' . $product->categories->slug . '/' . $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">${{ $product->selling_price }}</span>
                                    <span class="original-price">${{ $product->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-md-12 text-center">
                        No Products In this Category
                    </div>
                @endforelse


            </div>
        </div>
    </div>



@endsection
