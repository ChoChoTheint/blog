<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // public function getBlogs(){
    //     return 
    // } 
    public function index(){
        // $blogs = $this->getBlogs();
        return view('blogs.index',[
        'blogs' =>Blog::latest()->filter(request(['search','category','author']))->paginate(3)->withQueryString()
        
            ]);
    }

    public function show(Blog $blog){
        
            return view('blogs.show',[
                'blog' => $blog->load('comments'),
                'ramdomBlogs' => Blog::inRandomOrder()->take(2)->get()
                // 'categories' => Category::all()
                ]);
        
    }
}
