<?php

namespace App\Http\Controllers\Api;

use App\ApiData;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function list(){
        $notes = Note::all();
        return ApiData::S($notes);
    }


    public function store(Request $request){
        $note = new Note();
        $note->name = $request->name;
        $note->detail = $request->detail;
        $note->semester = $request->semester;
        $note->subject = $request->subject;
        $note->faculty_id = $request->faculty_id;
        $note->user_id = Auth::user()->id;
        if($request->has('image')){
            $note->image = $request->image->store('note/data');
        }
        $note->save();
        return ApiData::S($note);
    }

    public function update(Request $request){
        $note = Note::where('id',$request->id)->first();
        $note->name = $request->name;
        $note->detail = $request->detail;
        $note->semester = $request->semester;
        $note->subject = $request->subject;
        $note->faculty_id = $request->faculty_id;
        $note->user_id =Auth::user()->id;
        if($request->has('image')){
            $note->image = $request->image->store('note/data');
        }
        $note->save();
        return ApiData::S($note);
    }

    public function delete(Request $request){
        $univer = Note::where('id',$request->id)->first();
        $univer->delete();
        ApiData::S(['Ok']);
    }

}
