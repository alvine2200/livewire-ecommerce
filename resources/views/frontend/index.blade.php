@extends('layouts.app')

@section('title', 'Ecommerce Homepage')

@section('content')
    <section class="home" id="home">
        <div class=" swiper mySwipper home-slider ">
            <div class="swiper-wrapper wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide slide">
                        <div class="content">
                            <span>Welcome To The Best Ecommerce in the city</span>
                            <h3>{{ $slider->title }}</h3>
                            <p> {{ $slider->description }} <p>
                                <a href="#" style="font-size: 18px;" class="btn btn-primary text-white-200 text-bold p-2"> 
                                    Get Started</a>
                        </div>
                        <div class="image">
                            <img src="{{ asset('Uploads/Slider/'.$slider->image) }}" alt="image">
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

@endsection
