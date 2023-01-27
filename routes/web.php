<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

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
Route::get('/',function(){
    
    return view('blogs',[
        'blogs' =>Blog::all()
    ]);
});
Route::get('/blogs/{slug}',function($slug){
    $blog = Blog::findOrFail($slug);
    return view('blog',[
        'blog' => $blog
        ]);
})->where('slug','[A-z\0-9\-]+');