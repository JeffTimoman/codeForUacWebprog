<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|numeric',
            ]
        );

        $check = User::where('email', $request->email)->where('id', '!=', auth()->id())->first();
        if ($check) {
            return redirect()->back()->with('error', 'Email already exists');
        }

        $user = auth()->user();
        $user->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]
        );

        return redirect()->route('user.profile')->with('success', 'Profile updated');
    }
}
