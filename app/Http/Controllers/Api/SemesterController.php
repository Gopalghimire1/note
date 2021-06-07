<?php

namespace App\Http\Controllers\Api;

use App\ApiData;
use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function list(){
        $semesters = Semester::all();
        return ApiData::S($semesters);
    }


    public function store(Request $request){
        $semester = new Semester();
        $semester->name = $request->name;
        $semester->faculty_id = $request->faculty_id;
        $semester->save();
        return ApiData::S($semester);
    }

    public function update(Request $request){
        $semester = Semester::where('id',$request->id)->first();
        $semester->name = $request->name;
        $semester->faculty_id = $request->faculty_id;
        $semester->save();
        return ApiData::S($semester);
    }

    public function delete(Request $request){
        $univer = Semester::where('id',$request->id)->first();
        $univer->delete();
        return ApiData::S(['Ok']);
    }
}
