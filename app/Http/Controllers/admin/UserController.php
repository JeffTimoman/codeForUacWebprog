<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.user.index', ['users' => $users]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($request->id);

        if($user->role == 'admin'){
            return redirect()->back()->with('error', 'Unable to delete admin here.');
        }
        $user->delete();

        return redirect()->back()->with('success', 'User deleted');
    }
}
