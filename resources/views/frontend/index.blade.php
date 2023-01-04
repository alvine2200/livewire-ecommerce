@extends('layouts.app')

@section('title', 'Ecommerce Homepage')

@section('content')
    {{-- home slider --}}
    <section class="home" id="home">
        <div class=" swiper mySwipper home-slider ">
            <div class="swiper-wrapper wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide slide">
                        <div class="content">
                            <span>Alvine Online Shop</span>
                            <h3 class="mt-3">{{ $slider->title }}</h3>
                            <p> {{ $slider->description }}
                            <p>
                                <a href="{{ url('collections') }}" style="font-size: 18px;"
                                    class="btn btn-primary text-white-200 text-bold p-2">
                                    Get Started</a>
                        </div>
                        <div class="image">
                            <img src="{{ asset('Uploads/Slider/' . $slider->image) }}" alt="image">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </section>
    {{-- trending products --}}
    <section>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 justify-content-center mb-3">
                        <h4 class="text-center fw-bold display-5">Trending Products</h4>
                    </div>
                    <div class="col-md-12">
                        @if ($trendings)
                            <div class="owl-carousel owl-theme trendingProducts">
                                @foreach ($trendings as $product)
                                    <div class="item product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger"> New </label>
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
                                @endforeach
                            </div>
                        @else
                            <div class="col-md-12">
                                <div class="p-2">
                                    No Products Available
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- featured Products --}}
    <section>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 justify-content-center mb-3">
                        <h4 class="text-center fw-bold display-5">Featured Products</h4>
                    </div>
                    <div class="col-md-12">
                        @if ($featuredProducts)
                            <div class="owl-carousel owl-theme trendingProducts">
                                @foreach ($featuredProducts as $product)
                                    <div class="item product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger"> New </label>
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
                                @endforeach
                            </div>
                        @else
                            <div class="col-md-12">
                                <div class="p-2">
                                    No Featured Products Available
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- new arrivals --}}
    <section>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 justify-content-center mb-3">
                        <h4 class="text-center fw-bold display-5">New Arrivals</h4>
                    </div>
                    <div class="col-md-12">
                        @if ($arrivals)
                            <div class="owl-carousel owl-theme trendingProducts">
                                @foreach ($arrivals as $product)
                                    <div class="item product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger"> New </label>
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
                                @endforeach
                            </div>
                        @else
                            <div class="col-md-12">
                                <div class="p-2">
                                    No Products Available
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".trendingProducts").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })
        });
    </script>
    
@endsection
