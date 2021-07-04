<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\User;
use App\Models\UserOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->getMethod()=="POST"){
            // dd($request->all());

            $request->validate([
                'phone' => 'required|numeric',
                'password' => 'required|string',

            ]);

            $phone=$request->phone;
            $password=$request->password;
            if (Auth::attempt(['phone' => $phone, 'password' => $password], true)) {
                    return redirect()->route(Auth::user()->getRole().'.home');
            }else{
                // dd('hello');
                return redirect()->back()->withErrors('Credential do not match');
            }
        }else{
            return view('front.auth.login');
        }
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            // dd($request->all());
            $request->validate([
                'name' => 'required',
                'phone' => 'required|numeric|unique:users',
                'password' => 'required|string',

            ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            $user->role = 1;
            $user->save();
            $userOpt = new UserOption();
            $userOpt->user_id = $user->id;
            $userOpt->university_id = $request->university_id;
            $userOpt->faculty_id = $user->faculty_id;
            $userOpt->semester = $user->semester;
            $userOpt->school = $user->school;
            $userOpt->class = $user->class;
            $userOpt->save();
            if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password], true)) {
                return redirect()->route(Auth::user()->getRole().'.home');
           }

        }else{
            return view('front.auth.register');
        }
    }


    // faculties load by university id
    public function facultyLoad(Request $request)
    {
        // dd($request->all());
        $faculties = Faculty::where('university_id',$request->university_id)->get();
        return view('front.data.faculty',compact('faculties'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
