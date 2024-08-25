<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $login_as = $request->login_as;

        $request->validate(
            [
                'email' => 'required|email|max:255',
                'password' => 'required|min:8|max:255',
            ]
        );

        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('error', 'Invalid login details');
        }

        if($login_as == 'admin'){
            if(auth()->user()->role != 'admin'){
                auth()->logout();
                return back()->with('error', 'Invalid login details');
            }
        }


        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('auth.login');
    }
}
