<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(Category $category){
    
        return view('blogs.index',[
            'blogs' => $category->blogs->load('category'),
            'categories' => Category::all(),
            'currentCategory'=>$category
        ]);
    }
}
