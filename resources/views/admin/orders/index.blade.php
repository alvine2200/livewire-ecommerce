@extends('layouts.admin')
@section('title', 'My Orders Page')
@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders</h4>
                        <hr>
                        <form action="" method="GET">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="date">Filter by Date</label>
                                    <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="status">Filter by Status</label>
                                    <select name="status" class="form-control">
                                        <option  class="form-control"  value="">SelectAll Status</option>
                                        <option class="form-control" {{ Request::get('status') == "in progress" ? :'' }} value="in progress">In Progress</option>
                                        <option class="form-control" {{ Request::get('status') == "completed" ? : '' }} value="completed">Completed</option>
                                        <option class="form-control" {{ Request::get('status') == "pending" ? : '' }} value="pending">Pending</option>
                                        <option class="form-control" {{ Request::get('status') == "cancelled" ? :'' }} value="cancelled">Cancelled</option>
                                        <option class="form-control" {{ Request::get('status') == "outfordelivery" ? :'' }} value="outfordelivery">Out For Delivery</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <br/>
                                    <button type="submit" class="btn btn-primary"> Filter</button>
                                </div>
                            </div>
                            <hr>

                        </form>
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
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ url('admin/orders/' . $order->id) }}">View Order</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Orders Found</td>
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
