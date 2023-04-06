<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index(){
        return view('admin.index',[
            'blogs' => Blog::paginate()
        ]);
    }
    public function create(){
        return view('admin.create',[
            'categories' => Category::all()
        ]);
    }
    public function store(){
        $cleanData = request()->validate([
            "title" => ['required'],
            "slug" => ['required'],
            "intro" => ['required'],
            "body" => ['required'],
            "photo" => ["image"],
            "category_id" => ['required', Rule::exists('categories', 'id')]
            
        ]);
        $path = request('photo')->store('my-photo');
        $cleanData['user_id'] = auth()->id();
        $cleanData['photo'] = $path;
        Blog::create($cleanData);
        return redirect('/');
    }
    public function destory(Blog $blog){
            $blog->delete();
           return back();
    }

    public function edit(Blog $blog)
    {
        return view("admin.edit",[
            'blog'=>$blog,
            'categories'=>Category::all()
        ]);
    }


    public function update(Blog $blog)
    {

       $getData = $this->cleanData();

       if(request('photo') == null){
            $getData['photo'] = $blog->photo;
       }else{
        $path = request('photo')->store("my-photo");
            $getData['photo']=$path;
       }

       Blog::where("id",$blog->id)->update($getData);
       return redirect('/');
    }


    // private function requestData()
    // {
        // $requestData = request()->validate([
            // 'title'=>'required',
            // 'slug'=>'required',
            // 'body'=>'required',
            // 'intro'=>'required',
            // 'photo'=>"image",
            // 'category_id'=>['required',Rule::exists("categories",'id')],
        // ]);
        // $requestData['user_id'] = auth()->user()->id;

        // return $requestData;
    // }
}
