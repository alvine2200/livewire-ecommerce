@extends('layouts.app')
@section('title', 'All Categories')
@section('content')

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>
                @forelse($categories as $key => $category)
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            <a href="{{ url('collections/'.$category->slug) }}">
                                <div class="category-card-img">
                                    <img src="{{ asset('Uploads/Category/'.$category->image) }}" class="w-100" alt="Image">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{ $category->name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        No Category Found
                    </div>
                @endforelse

            </div>
        </div>
    </div>

@endsection
