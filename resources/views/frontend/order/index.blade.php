@extends('layouts.app')
@section('title', 'My Orders Page')
@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Tracking Number</th>
                                        <th>Username</th>
                                        <th>Payment Mode</th>
                                        <th>Ordered Date</th>
                                        <th>Status Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_number }}</td>
                                            <td>{{ $order->fullname }}</td>
                                            <td>{{ $order->payment_mode }}</td>
                                            <td>{{ $order->created_at->format('d-m-y') }}</td>
                                            <td>{{ $order->status_message }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{ url('orders/'.$order->id) }}">View Order</a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center ">
                                            No Orders fetched
                                        </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div class="paginate mt-3 mb-3">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
