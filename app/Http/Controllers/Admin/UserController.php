<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate('5');
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => 'numeric'
        ]);

        User::create([
            'name' => $valid['name'],
            'email' => $valid['email'],
            'role_id' => $valid['role_id'],
            'password' => Hash::make($valid['password']),
        ]);

        return redirect('admin/users')->with('status', 'New User Added successfully');
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $valid = $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email',],
            'password' => ['string', 'min:8', 'confirmed'],
            'role_id' => 'numeric'
        ]);

        $user->name = $valid['name'];
        $user->email = $valid['email'];
        $user->role_id = $valid['role_id'];
        $user->password = Hash::make($valid['password']);
        $user->update();

        return redirect('admin/users')->with('status', 'User Updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('status', 'User Deleted Successfully');
    }
}
