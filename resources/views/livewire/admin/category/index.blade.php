 <div>
     <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
         aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <form wire:submit.prevent="destroyCategory">
                     <div class="modal-body">
                         <h6>Are You sure you want to delete this data?</h6>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Yes, Delete</button>
                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>

 <div class="row">
     <div class="col-md-12">
         @include('layouts.includes.status')
         <div class="card">
             <div class="card-header">
                 <h4>Category
                     <a href="{{ url('admin/category/create') }}" class="btn btn-sm btn-primary float-end">Add
                         Category</a>
                 </h4>
             </div>
             <div class="card-body">
                <div class="table-responsive">
                                     <table class="table table-bordered table-striped">
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Status</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>

                         @foreach ($categories as $category)
                             <tr>
                                 <td>{{ $category->id }}</td>
                                 <td>{{ $category->name }}</td>
                                 <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                 <td>
                                     <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                         class="btn btn-success btn-sm">Edit</a> |
                                     <a href="{{ url('admin/category/'.$category->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this Category?')" class="btn btn-danger btn-sm">Delete</a>
                                     {{-- wire:click="deleteCategory({{ $category->id }})"  data-bs-toggle="modal" data-bs-target="#deleteModal" --}}
                                 </td>
                             </tr>
                         @endforeach

                     </tbody>
                 </table>
                </div>

                 <div class="page mt-3">
                     {{ $categories->links() }}
                 </div>
             </div>
         </div>
     </div>
 </div>
