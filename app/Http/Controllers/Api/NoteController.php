<?php

namespace App\Http\Controllers\Api;

use App\ApiData;
use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NoteController extends Controller
{

    public function checkOption(Request $request){
        $data=Option::where('key',$request->option)->get();
        return ApiData::S($data);
    }


    public function listNotes(Request $request)
    {
        try {
            //code...

            $offset = $request->offset ?? 0;
            $count = $request->count ?? 5;
            $user_id = $request->user_id;
            $semester = $request->semester;
            $subject = $request->subject;
            $faculty_id = $request->faculty_id;
            $key = $request->keyword;
            $all = $request->all != null;
            $orderby = $request->orderby ?? "id";
            $order = $request->order ?? "desc";
            $notes = Note::where('id', '>', 0);
            if ($faculty_id != null) {
                $notes = $notes->where('notes.faculty_id', $faculty_id);
            }

            if ($semester != null) {
                $notes = $notes->where('notes.semester', $semester);
            }

            if ($subject != null) {
                $notes = $notes->where('notes.subject', $subject);
            }

            if ($user_id != null) {
                $notes = $notes->where('notes.user_id', $user_id);
            }

            if($key != null){
                $notes = $notes->where('notes.name','like','%'.$key."%");
            }

            if ($all) {
            } else {
                if ($offset > 0) {
                    $notes = $notes->skip($offset);
                }
                $notes = $notes->take($count);
            }

            $notes = $notes->orderBy("notes." . $orderby, $order);
            $notes = $notes->join('users', 'users.id', '=', "notes.user_id")->select('notes.*', 'users.name');
            return ApiData::S($notes->get());
        } catch (\Throwable $th) {
            return ApiData::F([$th->getMessage()]);
        }
    }
    public function list()
    {
        $notes = Note::where('user_id', Auth::user()->id)->get();
        return ApiData::S($notes);
    }


    public function store(Request $request)
    {
        $note = new Note();
        $note->name = $request->name;
        $note->detail = $request->detail;
        $note->semester = $request->semester;
        $note->subject = $request->subject;
        $note->faculty_id = $request->faculty_id;
        $note->user_id = Auth::user()->id;
        if ($request->has('image')) {
            $note->image = $request->image->store(Helper::getFilePath(Auth::user()->id));
        }
        $note->save();
        return ApiData::S($note);
    }

    public function update(Request $request)
    {
        $note = Note::where('id', $request->id)->first();
        $note->name = $request->name;
        $note->detail = $request->detail;
        $note->semester = $request->semester;
        $note->subject = $request->subject;
        $note->faculty_id = $request->faculty_id;

        if ($request->has('image')) {
            $note->image = $request->image->store(Helper::getFilePath(Auth::user()->id));
        }
        $note->save();
        return ApiData::S($note);
    }

    public function delete(Request $request)
    {
        $univer = Note::where('id', $request->id)->first();
        $univer->delete();
        return ApiData::S(['Ok']);
    }
}
