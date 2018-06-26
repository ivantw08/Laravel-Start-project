<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Services\KeyService;

class apiController extends Controller
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

        $credentials = $request->only('email', 'password');
        $token = JWTAuth::fromUser($user);
    
    }

    /*获取用户信息*/
    public function get_user_details(Request $request)
    {
        $authorization = $request->header('Authorization');
        $tokenData = JWTAuth::setToken($authorization)->authenticate();
        return response()->json(['result' => $tokenData]);
    }

}
