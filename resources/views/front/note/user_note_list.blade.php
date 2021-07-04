@extends('front.layouts.app')
@section('title')
Note List
@endsection
@section('content')
<div class="row mt-2">
    <div class="col-md-9">
        <div class="card" style="box-shadow: 0 0 10px 0 rgb(44 83 217 / 30%); border-radius: 10px; ">
            <div class="card-body p-4">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <Th>Faculty</Th>
                        <th>Details</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($note as $n)
                        <tr>
                            <td>{{ $n->name }}</td>
                            <td>{{ $n->faculty->name }}</td>
                            <td>{{ $n->detail }}</td>
                            <td><a href="/{{ $n->image }}">{{ $n->name }}</a></td>
                            <td><a href="{{ route('note.edit',$n->id)}}" class="badge badge-primary">Update</a> <a href="{{ route('note.delete',$n->id) }}" class="badge badge-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
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
            </div>
        </div>
    </div>
</div>

@endsection

