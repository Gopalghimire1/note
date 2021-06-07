@extends('admin.layouts.app')
@section('title','Universities')
@section('head-title','Universities')
@section('css')
<link rel="stylesheet" href="{{ asset('calender/nepali.datepicker.v3.2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/select2.css') }}" />
@endsection
@section('toobar')
<div class="p-4 mb-2 cc1" style="background-color: white; border-radius: 10px">
    <form id="form_validation" action="{{ route('admin.university.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <label for="name">University Name</label>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter university name" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group" style="margin-top:30px;">
                    <button class="btn btn-primary btn-block">Submit Data</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('content')


<div class="table-responsive">
    <table id="newstable1" class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
                <th>University Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="expenseData">
           @foreach ($universities as $u)
               <form id="edit" action="{{ route('admin.university.update')}}" method="POST">
                @csrf
                    <tr>
                        <td>
                            <input type="hidden"  name="id" value="{{$u->id}}">
                            <input type="text" class="form-control" name="name" value="{{ $u->name }}">
                        </td>
                        <td><button class="btn btn-primary btn-sm">Update</button></td>
                    </tr>
               </form>
           @endforeach
        </tbody>
    </table>
</div>






@endsection
@section('js')
<script src="{{ asset('calender/nepali.datepicker.v3.2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>


@endsection
