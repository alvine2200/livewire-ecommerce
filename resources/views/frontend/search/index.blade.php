@extends('layouts.app')
@section('title', 'Search Products Page')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 justify-content-center mb-3">
                    <h4 class="text-center fw-bold display-5">Search Results</h4>
                </div>

                @forelse ($search as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($product->quantity > 0)
                                    <label class="stock bg-success"> In Stock</label>
                                @else
                                    <label class="stock bg-danger"> Out Of Stock</label>
                                @endif
                                @if ($product->productImages)
                                    <a href="{{ url('collections/' . $product->categories->slug . '/' . $product->slug) }}">
                                        <img src="{{ asset('Uploads/Products/' . $product->productImages[0]->image) }}"
                                            alt="{{ $product->name }}">
                                    </a>
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
                        <div class="p-2">
                            No Products Available
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="paginate mt-3">
            {{ $search->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection
