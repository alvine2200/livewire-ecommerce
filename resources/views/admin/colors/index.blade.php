@extends('layouts.admin')
@section('content')
    @include('layouts.includes.status')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Colors</h4>
                    <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm float-end text-white">Add
                        Colors</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td>{{ $color->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/' . $color->id . '/edit') }}"
                                            class="btn btn-sm btn-info">Edit</a> |
                                        <a onclick="return confirm('Are you sure you want to delete this Color?')" href="{{ url('admin/colors/' . $color->id . '/delete') }}"
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
    </div>
@endsection
