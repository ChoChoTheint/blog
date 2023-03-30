<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   
    public function index(){
        // if($search=request('search')){
            // dd($search);
        // };
        return view('blogs.index',[
        'blogs' => Blog::latest()->filter(request(['search','category','author']))
        ->paginate(3)
        ->withQueryString()
        
        ]);
    }

    public function show(Blog $blog){
        
            return view('blogs.show',[
                'blog' => $blog->load('comments'),
                'randomBlogs' => Blog::inRandomOrder()->take(4)->get()
            ]);
        
    }
}
