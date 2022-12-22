<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSlider;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class HomeSliderController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request)
    {
        $valid = $request->validated();
        $valid['status'] = $request->status == true ? '1' : '0';
        if ($request->image) {
            $img = $request->file('image');
            $name = time() .  $img->getClientOriginalName();
            $img->move('Uploads/Slider', $name);
            $valid['image'] = $name;
        }
        HomeSlider::create($valid);
        return redirect('admin/slider')->with('success', 'New Slider added Successfully');
    }

    public function edit($id)
    {
        $slider = HomeSlider::findOrFail($id);
        return view('admin.slider.edit', ['slider' => $slider]);
    }

    public function update(SliderFormRequest $request, $id)
    {
        $valid = $request->validated();
        $slider = HomeSlider::findOrFail($id);
        if ($request->hasFile('image')) {
            $path = 'Uploads/Slider/' . $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $img = $request->file('image');
            $name = time() .  $img->getClientOriginalName();
            $img->move('Uploads/Slider', $name);
            $slider['image'] = $name;
            $slider['description'] = $valid['description'];
            $slider['title'] = $valid['title'];
            $slider['status'] = $request->status == true ? "1" : "0";
            $slider->update();
            return redirect('admin/slider')->with('success', 'Slider Updated Successfully');
        }

        $slider['description'] = $valid['description'];
        $slider['title'] = $valid['title'];
        $slider['image'] = $slider['image'];
        $slider['status'] = $request->status == true ? "1" : "0";
        $slider->update();
        return redirect('admin/slider')->with('success', 'Slider Updated Successfully');
    }
    public function delete($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $path = 'Uploads/Slider/' . $slider->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $slider->delete();
        return redirect('admin/slider')->with('success', 'Slider Deleted Successfully');
    }
}
