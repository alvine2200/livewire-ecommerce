<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();
        $totalColors = Color::count();
        $users = User::count();
        $totalUsers = User::where('role_id', '0')->count();
        $totalAdmins = User::where('role_id', '1')->count();
        $totalOrders = Order::count();
        $todayOrders = Order::whereDay('created_at', today())->count();
        $monthOrders = Order::whereMonth('created_at', Carbon::now()->format('m'))->count();
        $yearOrders = Order::whereYear('created_at', Carbon::now()->format('Y'))->count();
        return view('admin.dashboard', compact('totalProducts', 'users', 'totalCategories', 'totalBrands', 'totalUsers', 'totalAdmins', 'totalOrders', 'todayOrders', 'monthOrders', 'totalColors', 'yearOrders'));
    }



    public function logout(Request $request)
    {
        $user = Auth::user();
        Auth::logout($user);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }
}
