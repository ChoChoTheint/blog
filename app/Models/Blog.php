<?php
namespace App\Models;

use Illuminate\Support\Facades\File;

class Blog{
    public static function all(){
        $files = File::files(resource_path("blogs"));
       return array_map(function($file){
           return $file->getContents();
        },$files);
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