<div>
    <div class="row">
        {{-- @include('layouts.includes.status') --}}
        <div class="py-3 py-md-5 bg-light product_card">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mt-3">
                        <div class="bg-white border" wire:ignore>
                            @if ($products->productImages)
                                {{-- <img src="{{ asset('Uploads/Products/' . $products->productImages[0]->image) }}"
                                    class="w-100" alt="Img"> --}}
                                <div class="exzoom" id="exzoom">
                                    <div class="exzoom_img_box">
                                        <ul class='exzoom_img_ul'>
                                            @foreach ($products->productImages as $proImage)
                                                <li><img src="{{ asset('Uploads/Products/' . $proImage->image) }}" />
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="exzoom_nav"></div>
                                    <p class="exzoom_btn">
                                        <a href="javascript:void(0);" class="exzoom_prev_btn">
                                        </a>
                                        <a href="javascript:void(0);" class="exzoom_next_btn"> </a>
                                    </p>
                                </div>
                            @else
                                No Images, Upload
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7 mt-3">
                        <div class="product-view">
                            <h4 class="product-name">
                                {{ $products->name }}

                            </h4>
                            <hr>
                            <p class="product-path">
                                Home / {{ $category->name }} / {{ $products->name }}
                            </p>
                            <div>
                                <span class="selling-price">${{ $products->selling_price }}</span>
                                <span class="original-price">${{ $products->original_price }}</span>
                            </div>
                            <div>
                                @if ($products->productColors->count() > 0)
                                    @if ($products->productColors)
                                        @foreach ($products->productColors as $prodColor)
                                            {{-- <input type="radio" name="colorSelection" value="{{ $prodColor->id }}">
                                            {{ $prodColor->colors->name }} --}}
                                            <label class="colorSelected text-white p-2 m-3" for="colorselected"
                                                style="background-color:{{ $prodColor->colors->code }}"
                                                wire:click="handleColorSelected({{ $prodColor->id }})">{{ $prodColor->colors->name }}
                                            </label>
                                        @endforeach
                                    @endif
                                    <div>
                                        @if ($this->productQuantity == '0')
                                            <label class="stock py-1 mt-2 btn-sm text-white bg-danger"> Out Of
                                                Stock</label>
                                        @elseif($this->productQuantity > 0)
                                            <label class="stock py-1 mt-2 btn-sm text-white bg-success"> In
                                                Stock</label>
                                        @endif
                                    </div>
                                @else
                                    <div>
                                        <label class="label-stock mt-2">
                                            @if ($products->quantity >= 1)
                                                <label class="stock bg-success"> In Stock</label>
                                            @else
                                                <label class="stock bg-danger"> Out Of Stock</label>
                                            @endif
                                        </label>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-2">
                                <div class="input-group">
                                    <span class="btn btn1" wire:click="decreementQuantity"><i
                                            class="fa fa-minus"></i></span>
                                    <input type="text" value="{{ $this->QuantityCount }}" wire:model="QuantityCount"
                                        class="input-quantity" />
                                    <span class="btn btn1" wire:click="increementQuantity"><i
                                            class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button wire:click="AddToCart({{ $products->id }})" class="btn btn1"> <i
                                        class="fa fa-shopping-cart"></i> Add To Cart</button>
                                <button type="button" wire:click="addToWishList({{ $products->id }})"
                                    class="btn btn1">
                                    <span wire:loading.remove wire:target="addToWishList">
                                        <i class="fa fa-heart"></i> Add To Wishlist
                                    </span>
                                    <span wire:loading wire:target="addToWishList">Adding to wishlist ...
                                    </span>
                                </button>
                            </div>
                            <div class="mt-3">
                                <h5 class="mb-0"> Small Description</h5>
                                <p>
                                    {{ $products['small-description'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4>Description</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ $products->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@push('scripts')
    <script>
        $(function() {
            $("#exzoom").exzoom({
                "navWidth": 40,
                "navHeight": 40,
                "navItemNum": 5,
                "navItemMargin": 4,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000
            });
        });
    </script>
@endpush
