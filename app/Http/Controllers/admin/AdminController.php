<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return  view('admin.home');
    }
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.admin.index', ['admins' => $admins]);
    }

    public function create(){
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|numeric',
                'password' => 'required|min:8|max:255',

            ]
        );

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'role' => 'admin'
            ]
        );

        return redirect()->back()->with('success', 'Account created successfully.');
    }
}
