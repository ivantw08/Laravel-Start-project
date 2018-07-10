<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller
{
    protected $keyService;

    public function register(Request $request)
    {
        $parameter=  ['name','email', 'password','app_id','level','city','address'];
        $data = $request->only($parameter);
        
        $rules = [
            'password' => 'required|max:30',
            'email' => 'required|email|max:255|unique:user',
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }    
        $result = User::create($data);
        return $result;
    }


    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json(['result' => '邮箱或密码错误.']);
        }
        return response()->json(['result' => $token]);
    }

    public function get_user_details(Request $request)
    {
        $authorization = $request->header('Authorization');
        //return $authorization;
        $tokenData = JWTAuth::setToken($authorization)->authenticate();
        return response()->json(['result' => $tokenData]);
    }

}