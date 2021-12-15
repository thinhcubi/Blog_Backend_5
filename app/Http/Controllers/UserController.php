<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function getListPostsByUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $posts = Post::where('user_id',$user->id);
        return response()->json($posts);
    }
}
