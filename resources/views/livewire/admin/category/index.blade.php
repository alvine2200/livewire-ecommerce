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
                                     <a href="#" class="btn btn-success btn-sm">Edit</a> |
                                     <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                 </td>
                             </tr>
                         @endforeach

                     </tbody>
                 </table>
                 <div class="page mt-3">
                     {{ $categories->links() }}
                 </div>
                
             </div>
         </div>
     </div>
 </div>
