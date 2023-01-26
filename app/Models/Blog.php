<?php
namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;



class Blog{
    public $title;
    public $filename;
    public $intro;
    public $body;

    public function __construct($title,$filename,$intro,$body)
    {
        $this->title=$title;
        $this->filename=$filename;
        $this->intro=$intro;
        $this->body=$body;
    }
    public static function all(){
        $files = File::files(resource_path("blogs"));
        $blogs=[];
        foreach($files as $file){
        $obj = YamlFrontMatter::parseFile($file);
        $blog = new Blog($obj->title,$obj->filename,$obj->intro,$obj->body());
        $blogs[] = $blog;
        // dd($obj);
       
        }
        return $blogs;

    //    return array_map(function($file){
    //        return $file->getContents();
    //     },$files);
    }
    public static function find($filename){
        $path = resource_path("/blogs/$filename.html");
        if(!file_exists($path)){
            return redirect('/');
        }
        
        return cache()->remember("posts.$filename", now()->addSeconds(5),function() use ($path){
            return file_get_contents($path);
        });
    }
}
?>