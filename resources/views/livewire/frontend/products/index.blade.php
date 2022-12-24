<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @if ($category->brands)
                        @forelse ($category->brands as $brandItem)
                            <label class="d-block p-2" for="brands">
                                <input wire:model="brandsInput" value="{{ $brandItem->id }}" type="checkbox"> {{ $brandItem->name }}
                            </label>
                        @empty
                            <h6>No Brands just Yet</h6>
                        @endforelse
                    @else
                        <label class="d-block" for="">
                            <input type="checkbox"> No Brand List
                        </label>
                    @endif


                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($product->quantity > 0)
                                    <label class="stock bg-success"> In Stock</label>
                                @else
                                    <label class="stock bg-danger"> Out Of Stock</label>
                                @endif
                                @if ($product->productImages)
                                    <a
                                        href="{{ url('collections/' . $product->categories->slug . '/' . $product->slug) }}">
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
                                    <a
                                        href="{{ url('collections/' . $product->categories->slug . '/' . $product->slug) }}">
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

</div>
