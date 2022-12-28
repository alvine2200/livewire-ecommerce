<div row>
    <div class="row mt-5 m-5">
        <div class="col-md-12">
            <div class="shopping-cart">

                <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Products</h4>
                        </div>
                        <div class="col-md-2">
                            <h4>Price</h4>
                        </div>
                        {{-- <div class="col-md-2">
                            <h4>Quantity</h4>
                        </div> --}}
                        <div class="col-md-4">
                            <h4>Remove</h4>
                        </div>
                    </div>
                </div>

                @forelse ($wishlist as $wishlistItem)
                    @if ($wishlistItem->products)
                        <div class="cart-item shadow">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a
                                        href="{{ url('collections/' . $wishlistItem->products->categories->slug . '/' . $wishlistItem->products->slug) }}">
                                        <label class="product-name">
                                            <img src="{{ asset('Uploads/Products/' . $wishlistItem->products->productImages[0]->image) }}"
                                                style="width: 50px; height: 50px"
                                                alt="{{ $wishlistItem->products->name }}">
                                            {{ $wishlistItem->products->name }}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">${{ $wishlistItem->products->selling_price }} </label>
                                </div>
                                {{-- <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                            <input type="text" value="1" class="input-quantity" />
                                            <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeWishList({{ $wishlistItem->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h4>
                            No Product Image
                        </h4>
                    @endif
                @empty
                    <h4 class="text-center">
                        No Item Added
                    </h4>
                @endforelse


            </div>
        </div>
    </div>

</div>
</div>

</div>
