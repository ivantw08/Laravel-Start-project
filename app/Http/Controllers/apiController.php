<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

use Tymon\JWTAuth\Facades\JWTAuth;

use Tymon\JWTAuth\Facades\JWTFactory ;
use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;


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
        // $factory = JWTFactory::addClaims([
        //     'sub' => env('API_ID'),
        //     'name'=>'test',
        //     'jdskfjd'=>'asdf'
        // ]);
        
        // $payload = $factory->make();
        
        // $token = JWTAuth::encode($payload);
        
        // return ['HTTP_Authorization' => "Bearer {$token}"];
    }

    /*获取用户信息*/
    public function get_user_details(Request $request)
    {
        
    }

}
