<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ApiData as res;
use App\Models\Option;
use App\Models\User;
use App\Models\UserOption;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $extrainfo = null;
        $user = null;
        $okk = false;
        $token = "";
        if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $user = Auth::user();
            $user->token = $user->createToken('logintoken')->accessToken;
            return res::s($user);
        }else{
            return res::f(["Email and Password Missmatch"]);
        }
    }

    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role =  2;
        $user->password = bcrypt($request->password);
        $user->save();
        $opt = new UserOption();
        $opt->user_id = $user->id;
        $opt->university_id = $request->university_id;
        $opt->faculty_id = $request->faculty_id;
        $opt->semester = $request->semester;
        $opt->school = $request->school;
        $opt->class = $request->class;
        $opt->save();
        if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $user = Auth::user();
            $user->token = $user->createToken('logintoken')->accessToken;
            return res::s($user);
        }else{
            return res::f(["Phone and Password Missmatch"]);
        }
    }
}
