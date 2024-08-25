<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\guest\GuestController;
use App\Http\Controllers\user\ArticleController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\UserController as UserUserController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\isNotLogin;
use App\Http\Middleware\isUser;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   if(auth()->check()){
       if(auth()->user()->role == 'admin'){
           return redirect()->route('admin.home');
       }else{
           return redirect()->route('user.home');
       }
   }else{
         return redirect()->route('guest.home');
   }
})->name('home');
Route::middleware(Localization::class)->group(function(){
    Route::prefix('auth')->group(function(){
        Route::get('/login', [LoginController::class, 'index'])->name('auth.login')->middleware([isNotLogin::class]);
        Route::post('/login', [LoginController::class, 'store'])->name('auth.login_store')->middleware([isNotLogin::class]);
        Route::get('/register', [RegisterController::class, 'index'])->name('auth.register')->middleware([isNotLogin::class]);
        Route::post('/register', [RegisterController::class, 'store'])->name('auth.register_store')->middleware([isNotLogin::class]);
        Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout')->middleware(isLogin::class);
    });


    Route::prefix('/guest')->group(function(){
        Route::get('/home', [GuestController::class, 'index'])->name('guest.home')->middleware(isNotLogin::class);
        Route::get('/article/{name?}', [GuestController::class, 'index'])->name('guest.article')->middleware(isNotLogin::class);
        Route::get('/{id}/article', [GuestController::class, 'show'])->name('guest.article.show')->middleware(isNotLogin::class);
    });

    Route::prefix('user')->group(function(){
        Route::get('/home', [UserUserController::class, 'index'])->name('user.home')->middleware([isLogin::class, isUser::class]);
        Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile')->middleware([isLogin::class, isUser::class]);
        Route::post('/profile', [ProfileController::class, 'update'])->name('user.profile.update')->middleware([isLogin::class, isUser::class]);
        Route::get('/article', [ArticleController::class, 'index'])->name('user.article')->middleware([isLogin::class, isUser::class]);
        Route::get('/article/create', [ArticleController::class, 'create'])->name('user.article.create')->middleware([isLogin::class, isUser::class]);
        Route::post('/article/create', [ArticleController::class, 'store'])->name('user.article.store')->middleware([isLogin::class, isUser::class]);
        Route::post('/article/delete', [ArticleController::class, 'delete'])->name('user.article.delete')->middleware([isLogin::class, isUser::class]);
    });

    Route::prefix('admin')->group(function(){
        Route::get('/home', [AdminController::class, 'home'])->name('admin.home')->middleware([isLogin::class, isAdmin::class]);

        Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.admin.index')->middleware([isLogin::class, isAdmin::class]);
        Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.admin.create')->middleware([isLogin::class, isAdmin::class]);
        Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.admin.store')->middleware([isLogin::class, isAdmin::class]);

        Route::get('/user/index', [UserController::class, 'index'])->name('admin.user.index')->middleware([isLogin::class, isAdmin::class]);
        Route::post('/user/delete', [UserController::class, 'delete'])->name('admin.user.delete')->middleware([isLogin::class, isAdmin::class]);
    });
});
Route::get('/locale/{locale?}', function($locale){
    session()->put('locale', $locale);
    app()->setLocale($locale);
    return redirect()->back();
})->name('set_locale');


