<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function getListPostsByUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $posts = Post::where('user_id',$user->id)->get();
        return response()->json($posts);
    }

    public function editProfile(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
            $data = [
                'status' => 'success',
                'message' => 'Cập nhật thành công',
            ];
            return response()->json($data);
    }
}
