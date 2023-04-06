<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// /api
Route::get('/users',function(){
    try{
        return response()->json([
            'users' => User::all()
        ],200);
    }catch(Exception $e){
       return response()->json([
        'message' => $e->getMessage()
       ],500);
    }
});