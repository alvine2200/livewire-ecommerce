<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index()
    {
        $colors = Color::paginate(10);
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorRequest $request)
    {
        $valid = $request->validated();
        $valid['status'] = $request->status == true ? "1" : "0";
        Color::create($valid);

        return redirect('admin/colors')->with('success', 'New Color Added Successfully');
    }

    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.colors.edit', ['color' => $color]);
    }

    public function update(ColorRequest $request, $id)
    {
        $valid = $request->validated();
        $valid['status'] = $request->status == true ? "1" : "0";
        Color::findOrFail($id)->update($valid);

        return redirect('admin/colors')->with('success', 'Color Updated Successfully');
    }

    public function delete($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect('admin/colors')->with('success', 'Color Deleted Successfully');
    }
}
