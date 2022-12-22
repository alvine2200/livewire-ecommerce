@extends('layouts.admin')
@section('content')
    @include('layouts.includes.status')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Slider</h4>
                    <a href="{{ url('admin/slider/create') }}" class="btn btn-primary btn-sm float-end text-white">Add
                        Slider</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                 <th>image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img src="{{ asset('Uploads/Slider/'.$slider->image) }}" style="width: 100px; height:100px;" alt="sliderimg">
                                        {{-- <img src="Uploads/Slider/.{{ $slider->image }}" style="width: 100px; height:100px;" alt="sliderimg"> --}}
                                    </td>
                                    <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/slider/' . $slider->id . '/edit') }}"
                                            class="btn btn-sm btn-info">Edit</a> |
                                        <a onclick="return confirm('Are you sure you want to delete this slider?')" href="{{ url('admin/slider/' . $slider->id . '/delete') }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"> Not Sliders Available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="pagination mt-3 mb-3">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
