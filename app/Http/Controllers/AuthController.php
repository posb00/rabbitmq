<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    //


    public function register(RegisterRequest $request)
    {

        //Creating User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);


        //Creating Token
        $token = $user->createToken('tokenApp')->plainTextToken;

        //Response
        $response = ['user' => $user, 'token' => $token];


        return response()->json($response,201);


    }
}