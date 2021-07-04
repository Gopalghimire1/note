@extends('front.layouts.app')
@section('title')
Note Update
@endsection
@section('content')
<div class="row mt-2">
    <div class="col-md-9">
        <div class="card" style="box-shadow: 0 0 10px 0 rgb(44 83 217 / 30%); border-radius: 10px; ">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('note.update',$note->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="name" value="{{ $note->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="detail">Details</label>
                        <textarea name="detail" class="form-control" rows="5" required>{{ $note->detail }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Universities</label>
                            <select name="" id="university_id" onchange="loadFaculty();" class="form-control">
                                <option></option>
                                @foreach (\App\Models\University::all() as $uni)
                                    <option value="{{$uni->id}}">{{$uni->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Faculties</label>
                            <select name="faculty_id" id="faculties" class="form-control" required>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="sem">Semester</label>
                            <input type="number" min="1" class="form-control" value="{{ $note->semester }}" name="semester" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Sch">School/College</label>
                            <input type="text" class="form-control" value="{{ $note->school }}" name="school">
                        </div>
                    </div>
                    <div class="file mt-3">
                        <p>File</p>
                        <input type="file" name="image"  id="dropify-event" data-default-file="{{ $note->image }}">
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary btn-block">Save Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card" style="box-shadow: 0 0 10px 0 rgb(44 83 217 / 30%); border-radius: 10px; height:100vh;">
            <div class="card-body p-4">
                <h5><strong>Your Uploads</strong></h5>
                <hr>
                @foreach (\App\Models\Note::where('user_id',Auth::user()->id)->latest()->take(10)->get() as $note)
                    <h6><a href=""> {{ $note->name }}</a></h6>
                @endforeach
                <div class="text-right mt-3">
                    <a href="{{ route('note.list.by.user') }}">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
 <script>
     function loadFaculty(){
        var university_id = $('#university_id').val();
        axios.post('{{route('faculty.load')}}',{'university_id':university_id})
        .then(function(res){
            $('#faculties').html(res.data);
            console.log(res.data);
        }).catch(function(err){
            console.log(erro);
        });
     }
 </script>
@endsection
