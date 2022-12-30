<div>
    <div class="container">
        <div  class="row mt-3 mb-3">
            <div class="card">
                <div style="margin-bottom: 5rem; !important;" class="card-body">
                    <h2 class="mt-3 mb-3">My Cart</h2>
                    <hr>
                    <div class="row mt-5 m-5">
                        <div class="col-md-12">
                            <div class="shopping-cart">

                                <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>Products</h4>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Color/No Color</h4>
                                        </div>
                                        <div class="col-md-1">
                                            <h4>Price</h4>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Quantity</h4>
                                        </div>
                                        <div class="col-md-1">
                                            <h4>Total</h4>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Remove</h4>
                                        </div>
                                    </div>
                                </div>

                                @forelse ($cartlist as $cartlistItem)
                                    @if ($cartlistItem->products)
                                        <div class="cart-item shadow">
                                            <div class="row">
                                                <div class="col-md-4 my-auto">
                                                    <a
                                                        href="{{ url('collections/' . $cartlistItem->products->categories?->slug . '/' . $cartlistItem->products->slug) }}">
                                                        <label class="product-name">
                                                            <img src="{{ asset('Uploads/Products/' . $cartlistItem->products->productImages[0]?->image) }}"
                                                                style="width: 50px; height: 50px"
                                                                alt="{{ $cartlistItem->products->name }}">
                                                            {{ $cartlistItem->products->name }}
                                                        </label>
                                                    </a>
                                                </div>
                                                <div class="col-md-2 my-auto">
                                                    <label class="price">{{ $cartlistItem->productColors?->colors?->name }}
                                                    </label>
                                                </div>
                                                <div class="col-md-1 my-auto">
                                                    <label class="price">${{ $cartlistItem->products?->selling_price }}
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-7 my-auto">
                                                    <div class="quantity">
                                                        <div class="input-group">
                                                            <button type="button" wire:loading.atr="disabled" wire:click="IncreementQuantity({{ $cartlistItem->id }})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                                            <input type="text" value="{{ $cartlistItem->quantity }}" class="input-quantity" />
                                                            <button type="button" wire:loading.atr="disabled" wire:click="DecreementQuantity({{ $cartlistItem->id }})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 my-auto">
                                                    <label class="price">${{ $cartlistItem->products?->selling_price * $cartlistItem->quantity  }}
                                                    </label>
                                                    @php
                                                        $totalPrice += $cartlistItem->products?->selling_price * $cartlistItem->quantity;
                                                    @endphp
                                                </div>
                                                <div class="col-md-2 col-5 my-auto">
                                                    <div class="remove">
                                                        <button type="button"
                                                            wire:click="removeCartList({{ $cartlistItem->id }})"
                                                            class="btn btn-danger">
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
                                        No Item Added to cart
                                    </h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mt-3 mb-3">
                            <h4 class="float-end">
                                Get the best deals, Shop with us 
                                <a class="btn btn-primary font-bold p-2"  href="{{ url('collections') }}">Shop Now</a>
                            </h4>
                        </div>
                        <div class="col-md-3 mt-3 mb-3">
                            <div class="shadow-sm bg-white">
                                <h4 class="font-bold display-5"> Total:
                                    <span class="float-end">
                                        $ {{ $totalPrice }}
                                    </span>
                                </h4>
                                <hr>
                                <h4 class="font-bold">
                                    <a style="font-size: 20px;!important;" class="btn btn-warning w-100 p-2" href="{{ url('checkout') }}">Checkout</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
