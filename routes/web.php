<?php


use App\Models\User;

use App\Models\Category;
use App\Mail\SubscriberMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscriptionController;

// Route::get('/',[BlogController::class,'index']);
Route::get('/',function(){
    $user = User::first();
    Mail::to($user->email)->send(new SubscriberMail($user));
    return "mail sent";
})->name('home');

Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->where('blog','[A-z\0-9\-]+');
// Route::get('/categories/{category:slug}',[CategoryController::class,'index'])->where('id','[A-z\d\-_]+');
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

Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store'])->name('blogs.comments.store');

Route::post('/blogs/{blog:slug}/subscription',[SubscriptionController::class,'toggleSubscription']);

