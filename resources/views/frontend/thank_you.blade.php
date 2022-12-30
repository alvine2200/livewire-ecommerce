@extends('layouts.app')
@section('title','Thank You Page')
@section('content')

    <div style="margin-top: 5rem;" class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Alvine Ecommerce</h2>
                    <h4>Thank You for Shopping With Us.
                    </h4>
                    <a class="btn btn-info" href="{{ url('collections') }}">Shop Again</a>
                </div>
            </div>
        </div>
    </div>
    
@endsection