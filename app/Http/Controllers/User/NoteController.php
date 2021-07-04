<?php

namespace App\Http\Controllers\User;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(){
        return view('front.note.add');
    }

    public function add(Request $request){
        // dd($request->all());
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
        return redirect()->back()->with('success','New note added successfully!');
    }

    public  function list(){
        $notes = Note::latest()->get();
        return view('front.note.list',compact('notes'));
    }

    public function listByUser(){
        $note = Note::where('user_id',Auth::user()->id)->get();
        return view('front.note.user_note_list',compact('note'));
    }

    public function edit($id){
        $note = Note::where('id',$id)->first();
        return view('front.note.edit',compact('note'));
    }

    public function update(Request $request,$id){
        $note = Note::where('id',$id)->first();
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
        return redirect()->back()->with('success','Note updated successfully!');
    }

    public function delete($id){
        $note = Note::where('id',$id)->first();
        $note->delete();
        return redirect()->back()->with('success','Deleted successfully!');
    }



    public function search(Request $request){
        if ($request->isMethod('post')) {
            $offset = $request->offset ?? 0;
            $count = $request->count ?? 10;
            $user_id = $request->user_id;
            $semester = $request->semester;
            $subject = $request->subject;
            $faculty_id = $request->faculty_id;
            $key = $request->keyword;
            $all = $request->all != null;
            $orderby = $request->orderby ?? "id";
            $order = $request->order ?? "desc";
            $notes = Note::where('notes.id', '>', 0);
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
            $notes = $notes->join('users', 'users.id', '=', "notes.user_id")->select('notes.*');
            $notes = $notes->get();
            // dd($notes);
            return view('front.note.list',compact('notes'));

        }else{
            $notes = [];
            return view('front.note.list',compact('notes'));
        }


    }
}
