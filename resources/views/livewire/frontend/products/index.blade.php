<div>
    <div class="row">
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
                        No Products In this Category
                    </div>
                @endforelse
    </div>
</div>
