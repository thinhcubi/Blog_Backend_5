<?php

namespace App\Http\Controllers;

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

    function edit(Request $request, $id) {
        User::find($id)->update($request->all());
        $data = [
            'status' => 'success',
            'message' => 'sua thanh cong',
        ];
        return response()->json($data);
    }

    function showDetail($id) {
        $user = User::find($id);
        return response()->json($user);
    }
}
