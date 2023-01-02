@extends('layouts.admin')
@section('title', 'My Orders Details Page')
@section('content')

    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">
                            <i class="fa fa-shopping-cart"></i> My Order Details
                            <a href="{{ url('admin/orders') }}" class="btn btn-sm btn-danger float-end ">Back</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order ID: {{ $order_view->id }} </h6>
                                <h6>Tracking Number: {{ $order_view->tracking_number }} </h6>
                                <h6>Order Date: {{ $order_view->created_at->format('d-m-y h:i a') }} </h6>
                                <h6>Payment Mode: {{ $order_view->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order Status Message: <span
                                        class="text-uppercase">{{ $order_view->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Fullname: {{ $order_view->fullname }} </h6>
                                <h6>Email: {{ $order_view->email }}</h6>
                                <h6>Phone Number: {{ $order_view->phone_number }}</h6>
                                <h6>Address: {{ $order_view->address }}</h6>
                                <h6>Pin Code: {{ $order_view->pincode }}</h6>
                            </div>
                            <br>
                            <h5>Order Items</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Item Id</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Color</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalCash = 0;
                                    @endphp
                                    @forelse ($order_view->orderItems as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>
                                                <img src="{{ asset('Uploads/Products/' . $order->products->productImages[0]?->image) }}"
                                                    style="width: 50px; height: 50px" alt="{{ $order->products->name }}">

                                                <div class="col-md-2 my-auto">
                                                    <label class="price">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $order->products->name }}
                                            </td>
                                            <td>
                                                {{ $order->productColors?->colors?->name }}
                                            </td>
                                            <td>${{ $order->price }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td class="fw-bold">${{ $order->quantity * $order->price }}</td>
                                            @php
                                                $totalCash += $order->quantity * $order->price;
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center ">
                                                No Orders fetched
                                            </td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td style="font-weight: bold; font-size:16px; !important ;" colspan="6 fw-bold">
                                            Total Price</td>
                                        <td style="font-weight: bold; font-size:16px; !important ;" colspan="1 fw-bold">
                                            ${{ $totalCash }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>                         

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
