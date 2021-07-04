@extends('front.layouts.app')
@section('title')
Note List
@endsection
@section('content')
<div class="row mt-2">
    <div class="col-md-9">
        <div class="card" style="box-shadow: 0 0 10px 0 rgb(44 83 217 / 30%); border-radius: 10px; ">
            <div class="card-body p-4">
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-3">
                            <h5><strong> Available Notes </strong> </h5>
                        </div>
                        <style>
                             .searchbar{

                                height: 49px;
                                background-color: #353b48;
                                border-radius: 30px;
                                padding: 5px;
                                width: 400px;
                                }

                                .search_input{
                                color: white;
                                border: 0;
                                outline: 0;
                                background: none;
                                caret-color:transparent;
                                line-height: 36px;
                                }
                                .search_icon{
                                height: 40px;
                                width: 40px;
                                float: right;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                border-radius: 50%;
                                color:white;
                                text-decoration:none;
                                }
                        </style>
                        <div class="col-md-9 ">
                            <div class="d-flex justify-content-end h-100">
                                <form action="{{ route('note.search')}}" method="POST">
                                    @csrf
                                    <div class="searchbar">
                                      <input class="search_input" type="text" name="" placeholder="Search...">
                                      <button class="btn btn-warning search_icon">s</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach ($notes as $note)
                            <div class="col-md-3 mb-3">
                                <a href="/{{ $note->image }}" target="_blank">{{ $note->name }}</a>
                            </div>
                        @endforeach
                    </div>
                  </div>
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

