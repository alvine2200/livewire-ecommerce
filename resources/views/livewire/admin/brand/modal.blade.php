{{-- add modal --}}
<div wire:ignore.self class="modal fade" id="AddBrandModal" tabindex="-1" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name">Brand Name</label>
                        <input type="text" wire:model.defer="name"  class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                     <div class="mb-3">
                        <label for="slug">Brand Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                     <div class="mb-3">
                        <label for="status">Brand Status</label><br/>
                        <input type="checkbox" wire:model.defer="status" >  Checked="Hidden"  Unchecked="Visible"
                         @error('status') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit modal --}}
<div wire:ignore.self class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Update Brand</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name">Brand Name</label>
                        <input type="text" wire:model.defer="name"  class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                     <div class="mb-3">
                        <label for="slug">Brand Slug</label>
                        <input type="text" wire:model.defer="slug"  class="form-control">
                        @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                     <div class="mb-3">
                        <label for="status">Brand Status</label><br/>
                        <input type="checkbox"  wire:model.defer="status" >  Checked="Hidden"  Unchecked="Visible"
                         @error('status') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit modal --}}
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Brand</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="deleteBrand">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this Brand?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes, Delete Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>
