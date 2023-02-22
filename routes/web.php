<?php


use App\Models\User;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

Route::get('/',[BlogController::class,'index']);
Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->where('blog','[A-z\0-9\-]+');
Route::get('/categories/{category:slug}',[CategoryController::class,'index'])->where('id','[A-z\d\-_]+');
Route::get('/users/{user::username}',function(User $user){
    return view('blogs',[
        'blogs' =>$user->blogs,
        'categories' =>Category::all()
    ]);
});

Route::get('/register',[AuthController::class,'register'])->middleware('guest');
Route::post('/register',[AuthController::class,'registerStore'])->middleware('guest');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('login',[AuthController::class,'loginStore']);
Route::post('/logout',[AuthController::class,'logout']);



