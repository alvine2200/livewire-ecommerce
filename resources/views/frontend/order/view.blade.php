@extends('layouts.app')
@section('title', 'My Orders Details Page')
@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">
                            <i class="fa fa-shopping-cart"></i> My Order Detail</h4>
                            <a href="{{ url('') }}" class="btn btn-sm btn-danger float-end p-2">Back</a>
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
