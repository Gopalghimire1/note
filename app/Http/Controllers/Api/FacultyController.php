<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\ApiData;

class FacultyController extends Controller
{
    public function list(){
        $faculties = Faculty::all();
        return ApiData::S($faculties);
    }


    public function store(Request $request){
        $faculty = new Faculty();
        $faculty->name = $request->name;
        $faculty->detail = $request->detail;
        $faculty->university_id = $request->university_id;
        $faculty->save();
        return ApiData::S($faculty);
    }

    public function update(Request $request){
        $faculty = Faculty::where('id',$request->id)->first();
        $faculty->name = $request->name;
        $faculty->detail = $request->detail;
        $faculty->university_id = $request->university_id;
        $faculty->save();
        return ApiData::S($faculty);
    }

    public function delete(Request $request){
        $univer = Faculty::where('id',$request->id)->first();
        $univer->delete();
        return ApiData::S(['Ok']);
    }

}
