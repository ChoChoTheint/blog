<?php
namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;



class Blog{
    public $title;
    public $slug;
    public $date;
    public $body;

    public function __construct($title,$slug,$body,$date)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->date=$date;
        $this->body=$body;
    }
    public static function all(){
        $files = collect(File::files(resource_path("/blogs")));
        // $blogs=[];
        // foreach($files as $file){
        // $obj = YamlFrontMatter::parseFile($file);
        // $blog = new Blog($obj->title,$obj->filename,$obj->intro,$obj->body());
        // $blogs[] = $blog;
        // // dd($obj);

        return $files->map(function($file){
            $yamlObj = YamlFrontMatter::parse($file->getContents());
            $title = $yamlObj->title;
            $slug = $yamlObj->slug;
            $body = $yamlObj->body();
            $date = $yamlObj->date;
            return new Blog($title,$slug,$body,$date);
        })->sortByDesc('date');
       
        }
        

    //    return array_map(function($file){
    //        return $file->getContents();
    //     },$files);
    // }
    public static function find($slug){
        // $path = resource_path("/blogs/$slug.html");
        // if(!file_exists($path)){
        //     return redirect('/');
        // }
        
        // return cache()->remember("posts.$slug", now()->addSeconds(5),function(){
        //     // return file_get_contents($path);
        // });
        // dd(static::all()->where('slug',$slug));
        return static::all()->firstWhere('slug',$slug);
    }
    public static function findOrFail($slug){
        $blog = static::find($slug);
        if(!$blog){
            abort(404);
        }
        return $blog;
    }
}
?>