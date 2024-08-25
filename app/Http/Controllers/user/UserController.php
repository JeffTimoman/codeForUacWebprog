<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }
}
