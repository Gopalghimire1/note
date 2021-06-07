<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ApiData as res;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $extrainfo = null;
        $user = null;
        $okk = false;
        $token = "";
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->token = $user->createToken('logintoken')->accessToken;
            return res::s($user);
        }else{
            return res::f(["Email and Password Missmatch"]);
        }
    }
}
