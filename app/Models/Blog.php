<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category', 'author'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
   
    public function scopeFilter($query, $filters){
        $query->when($filters['search'] ?? false,function($query, $search){
            $query = $query
                    ->where(function ($query) use ($search){
                        $query->where('title','LIKE','%'.'$search'.'%')
                              ->orWhere('body','LIKE','%'.'$search'.'%');
                    });
                    // ->where('title','abc');
        });
        $query->when($filters['category'] ?? false,function($query, $slug){
            $query->whereHas('category',function($query) use($slug){
                $query->where('slug', $slug);
                    });
        });
        $query->when($filters['author'] ?? false,function($query, $username){
            $query->whereHas('author',function($query) use($username){
                $query->where('username', $username);
                    });
        });
        }
        public function comments(){
            return $this->hasMany(Comment::class);
        }
        public function subscribedUsers(){
            return $this->belongsToMany(User::class,'blog_user');
        }
               
}




