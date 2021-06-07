<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index(){
        $universities = University::all();
        return view('admin.university.index',compact('universities'));
    }

     public function store(Request $request){
         $univer = new University();
         $univer->name = $request->name;
         $univer->detail = $request->detail;
         $univer->save();
         return redirect()->back()->with('success','University added successfully!');
     }


    public function update(Request $request){
        $univer = University::where('id',$request->id)->first();
        $univer->name = $request->name;
        $univer->detail = $request->detail;
        $univer->save();
        return redirect()->back()->with('success','University added successfully!');
    }

}
