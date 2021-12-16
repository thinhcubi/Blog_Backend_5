<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $users = User::all();
        $result = [
            'status' => 'success',
            'data' => $users
        ];
        return response()->json($result);
    }

    function delete($id)
    {
        Post::where('user_id', $id)->update(['user_id' => 1]);
        User::destroy($id);
        return response()->json();
    }

    function store(Request $request)
    {
        $user = new User();
        $user->create($request->all());
        $data = [
            'status' => 'success',
            'message' => 'tao moi thanh cong',
        ];
        return response()->json($data);
    }


    function showDetail($id) {
        $user = User::find($id);
        return response()->json($user);
    }

    function search(Request $request) {
        $keyword = $request->input('keyword');

        if (!$keyword) {
            return response()->json('khong tin thay');
        }
        $users = User::where('id', '=', '%'.$keyword.'%')->first();

        return response()->json($users);
    }
}
