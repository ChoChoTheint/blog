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
        return view('blogs',[
        'blogs' =>Blog::latest()->filter(request(['search','category']))->paginate(6),
        'categories' => Category::all()
            ]);
    }

    public function show(Blog $blog){
        
            return view('blog',[
                'blog' => $blog,
                'ramdomBlogs' => Blog::inRandomOrder()->take(2)->get(),
                // 'categories' => Category::all()
                ]);
        
    }
}
