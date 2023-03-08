<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getNameAttribute($value){
        return ucfirst($value);
    }
    public function getProfileAttribute($value)
    {
        return $value ? $value : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
    }

    public function setPasswordAttribute($value)
        {
            $this->attributes['password'] = bcrypt($value);
        }
    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class,'blog_user');
    }
    public function isSubscribed($blog){
        return auth()->user()->subscribedBlogs 
                 && auth()->user()->subscribedBlogs->contains('id',$blog->id);

    

    }
}
