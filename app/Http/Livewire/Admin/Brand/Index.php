<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status, $brand_id;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
        ];
    }

    public function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->brand_id = null;
    }

    public function storeBrand()
    {
        $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('success', 'Brand added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

    public function updateBrand()
    {
        $this->validate();
        Brand::find($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('success', 'Brand updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function destroyBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function deleteBrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('success', 'Brand deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }





    public function render()
    {
        $brands = Brand::paginate(8);
        return view('livewire.admin.brand.index', ['brands' => $brands])
            ->extends('layouts.admin')
            ->section('content');
    }
}
