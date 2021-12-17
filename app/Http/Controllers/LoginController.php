<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassWordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class LoginController extends Controller

{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);
        try {
            if ($token) {
                $data = [
                    'token' => $token,
                    'status' => 'success',
                    'user' => Auth::user(),
                    'message' => 'đăng nhập thành công'
                ];
                return response()->json($data);
            } else {
                $data = [
                    'status' => 'error',
                    'message' => 'Tài khoản hoặc mật khẩu không hợp lệ hợp lệ vui lòng nhập lại'
                ];
                return response()->json($data);
            }
        } catch (JWTException $e) {
            return response()->json($e->getMessage());
        }
    }


    public function getAuthenticatedUser()

    {

        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));

    }

    public function register(Request $request)
    {
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => 1,
        ]);


        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);

    }

    function logout()
    {
        Auth::logout();
        $data = [
            'status' => 'success',
            'message' => 'Logout success'
        ];
        return response()->json($data);
    }

    function changePassword(ChangePassWordRequest $request)
    {
        $user = Auth::user();
        $userPassword = $user->password;

        if (!Hash::check($request->current_password, $userPassword)){
            $data = [
                'status' => 'error',
                'message' => 'Mật khẩu không khớp vui lòng nhập lại'
            ];
            return response()->json($data);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        $data = [
            'status' => 'success',
            'message' => 'Mật khẩu đã được thay đổi thành công'
        ];
        return response()->json($data);
    }
}
