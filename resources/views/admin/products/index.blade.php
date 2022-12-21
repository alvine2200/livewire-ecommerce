@extends('layouts.admin')
@section('content')
    @include('layouts.includes.status')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Products</h4>
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end text-white">Add
                        Products</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Origial Price</th>
                                <th>Selling Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        @if ($product->categories)
                                            {{ $product->categories->name }}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->brands)
                                            {{ $product->brands->name }}
                                        @else
                                            No Brand
                                        @endif
                                    </td>

                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->original_price }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/products/' . $product->id . '/edit') }}"
                                            class="btn btn-sm btn-info">Edit</a> |
                                        <a onclick="return confirm('Are you sure you want to delete this Product?')" href="{{ url('admin/products/' . $product->id . '/delete') }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"> Not Product Available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
