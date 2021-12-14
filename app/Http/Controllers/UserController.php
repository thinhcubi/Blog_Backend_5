<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function getListPostByUser(){
         $users = JWTAuth::parseToken()->authenticate();
         $posts = Post::where('user_id',$users->id)->get();
         return response()->json($posts);
    }
}
