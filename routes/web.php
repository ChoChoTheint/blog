<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/blogs',function(){
    return view('blogs');
});
Route::get('/blogs/{blog}',function($blog){
    $path = '../resources/blogs/first-blog.html';

    $blogContent = file_get_contents($path);
    return view('blog',[
        'blog' => $blogContent
        ]);
});