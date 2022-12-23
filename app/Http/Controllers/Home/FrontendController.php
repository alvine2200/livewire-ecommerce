<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }
}
