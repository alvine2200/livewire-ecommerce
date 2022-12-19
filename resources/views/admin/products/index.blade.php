@extends('layouts.admin')
@section('content')
@include('layouts.includes.status')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Products</h4>
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end text-white" >Add Products</a>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>

</div>
    
@endsection