<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;
use App\ApiData as res;

class UniversityController extends Controller
{
    //
    public function list(){
        $universities = University::with('faculty')->get();
        return res::S($universities);
    }

    public function store(Request $request){
        $university = new University();
        $university->name = $request->name;
        $university->detail = $request->detail;
        $university->save();
        return res::S($university);
    }


   public function update(Request $request){
       $university = University::where('id',$request->id)->first();
       $university->name = $request->name;
       $university->detail = $request->detail;
       $university->save();
       return res::S($university);
   }

   public function delete(Request $request){
    $univer = University::where('id',$request->id)->first();
    $univer->delete();
    return res::S(['Ok']);
   }

}
