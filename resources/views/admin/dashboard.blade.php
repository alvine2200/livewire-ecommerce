@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="me-md-3 me-xl-5">
                @if (Session::has('message'))
                    <h2>{{ Session::get('message') }}</h2>
                @endif
                <h2>DashBoard</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
                <hr>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                  <label for="">Total Orders</label>
                  <h1>{{ $totalOrders }}</h1>
                  <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                  <label for="">Today Orders</label>
                  <h1>{{ $todayOrders }}</h1>
                  <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                  <label for="">This Month Orders</label>
                  <h1>{{ $monthOrders }}</h1>
                  <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                  <label for="">This Year Orders</label>
                  <h1>{{ $yearOrders }}</h1>
                  <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                </div>
              </div>

               <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                  <label for="">Total Products</label>
                  <h1>{{ $totalProducts }}</h1>
                  <a href="{{ url('admin/products') }}" class="text-white">View</a>
                </div>
              </div>
               <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                  <label for="">Total Categories</label>
                  <h1>{{ $totalCategories }}</h1>
                  <a href="{{ url('admin/category') }}" class="text-white">View</a>
                </div>
              </div>
               <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                  <label for="">Total Brands</label>
                  <h1>{{ $totalBrands }}</h1>
                  <a href="{{ url('admin/brands') }}" class="text-white">View</a>
                </div>
              </div>
               <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                  <label for="">Total Colors</label>
                  <h1>{{ $totalColors }}</h1>
                  <a href="{{ url('admin/colors') }}" class="text-white">View</a>
                </div>
              </div>

               <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                  <label for="">Total Admin Users</label>
                  <h1>{{ $totalAdmins }}</h1>
                  <a href="{{ url('admin/users') }}" class="text-white">View</a>
                </div>
              </div>

               <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                  <label for="">Total Users</label>
                  <h1>{{ $users }}</h1>
                  <a href="{{ url('admin/users') }}" class="text-white">View</a>
                </div>
              </div>
               <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                  <label for="">Total Users</label>
                  <h1>{{ $totalUsers }}</h1>
                  <a href="{{ url('admin/users') }}" class="text-white">View</a>
                </div>
              </div>
               {{-- <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                  <label for="">This Year Orders</label>
                  <h1>{{ $yearOrders }}</h1>
                  <a href="{{ url('orders') }}" class="text-white">View</a>
                </div>
              </div> --}}


            </div>
        </div>
    </div>
@endsection
