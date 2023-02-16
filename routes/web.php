<?php

use App\Models\Blog;
use App\Models\Category;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/about',function(){
//     return view('about');
// });
// Route::get('/home',function(){
//     // dd('home');
//     return view('home',[
//         'name' => "cho cho theint"
//     ]);
// });
Route::get('/',[BlogController::class,'index']);
Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->where('blog','[A-z\0-9\-]+');
Route::get('/categories/{category:slug}',[CategoryController::class,'index'])->where('id','[A-z\d\-_]+');
Route::get('/users/{user::username}',function(User $user){
    return view('blogs',[
        'blogs' =>$user->blogs,
        'categories' =>Category::all()
    ]);
});

Route::get('/register',[AuthController::class,'create']);

Route::post('/register',function(Request $request){
      $cleanData = request()->validate([
        'name' => 'required',
        'username' => 'required',
        'email' => ['required','email',Rule::unique('users','email')],
        'password' => 'required',
    ],[
        'email.required' => 'We need to know your email address!',
        'email.email' => 'Your email is not a valid email address!',
    ]);
    $user = new User();
    $user->name = $cleanData['name'];
    $user->username = $cleanData['username'];
    $user->email = $cleanData['email'];
    $user->password = bcrypt($cleanData['password']);
    $user->save();

    auth()->login($user);
    return redirect('/')->with('success','Welcome Back');

});
Route::get('/login',function(){
    return view('login.index');
});
Route::post('login',function(){
   $user = User::where('email',request('email'))->first();
   if($user){
    if(Hash::check(request('password'),$user->password)){
        auth()->login($user);
        return redirect('/')->with('success','Welcome back' . $user->name);
    }
   }
});
Route::post('/logout',function(){
   auth()->logout();
   return redirect('/');
});