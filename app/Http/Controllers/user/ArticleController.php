<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::where('user_id', auth()->id())->get();
        return view('user.article.index', ['articles' => $articles]);
    }

    public function create(){
        $categories = Category::all();
        return view('user.article.create', ['categories' => $categories]);
    }

    public function store(Request $request){

        // dd($request->all());
        $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'category_id' => 'required|exists:categories,id',
                'image' => 'required|mimes:jpg,jpeg,png',
            ]
        );

        if(!$request->hasFile('image')){
            return redirect()->back()->with('error', 'Image is required');
        }

        $image = $request->file('image');

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('posts'), $imageName);

        Article::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'image' => $imageName,
                'user_id' => auth()->id(),
            ]
        );

        return redirect()->route('user.article')->with('success', 'Article created');
    }

    public function delete(Request $request){
        $id = $request->id;
        $article = Article::findOrFail($id);
        if($article->user_id != auth()->id()){
            return redirect()->back()->with('error', 'You are not authorized');
        }

        $image_path = public_path('posts').'/'.$article->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $article->delete();
        return redirect()->route('user.article')->with('success', 'Article deleted');
    }
}
