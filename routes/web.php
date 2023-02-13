<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/about',function(){
//     return view('about');
// });
// Route::get('/home',function(){
//     // dd('home');
//     return view('home',[
//         'name' => "cho cho theint"
//     ]);
// });
Route::get('/',[BlogController::class,'index']);
Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->where('blog','[A-z\0-9\-]+');
Route::get('/categories/{category:slug}',[CategoryController::class,'index'])->where('id','[A-z\d\-_]+');
Route::get('/register',[AuthController::class,'create']);

Route::post('/register',function(Request $request){
    request()->validate([
        'name' => 'required',
        'username' => 'required',
        'email' => ['required','email'],
        'password' => 'required',
    ],[
        'email.required' => 'We need to know your email address!',
        'email.email' => 'Your email is not a valid email address!',
    ]);
    dd('hit');
});