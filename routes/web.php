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
Route::get('/',function(){
    return view('blogs');
});
Route::get('/blogs/{filename}',function($filename){
    $path = resource_path("/blogs/$filename.html");
    if(!file_exists($path)){
        // abort(404);
        return redirect('/');
    }
    $blogContent = file_get_contents($path);
    return view('blog',[
        'blog' => $blogContent
        ]);
});