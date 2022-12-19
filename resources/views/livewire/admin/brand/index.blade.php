<div>

    @include('livewire.admin.brand.modal')
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @include('layouts.includes.status')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                    <a class="btn btn-sm btn-primary text-white float-end" data-bs-toggle="modal"
                        data-bs-target="#AddBrandModal" href="#">Add Brand</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status === "1" ? "Hidden":"Visible" }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">Edit</a>|
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('close-modal', event => {
            $('#AddBrandModal').modal('hide');
        })
    </script>

</div>
