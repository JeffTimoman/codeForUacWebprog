<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index($name = "regional")
    {
        $category = Category::where('name', $name)->firstOrFail();
        return view('article.index', ['category' => $category]);
    }

    public function show($id){
        $article = Article::findOrFail($id);
        return view('article.detail', ['article' => $article]);
    }
}
