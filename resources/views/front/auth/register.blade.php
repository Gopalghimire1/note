<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Note - Register</title>
    <style>
        label{
            font-weight: 600;
        }
    </style>
  </head>
  <body>


    <div class="row m-0" style="height:100vh;">
        <div class="col-md-6 p-0 d-none d-md-block" style="background: #1D1D1D">

        </div>
        <div class="col-md-6 p-0">
            <div class="container">
                <div class="text-center mt-2 mb-2">
                    <img src="https://www.logodesign.net/images/nature-logo.png" alt="" style="width:200px;">
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register')}}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="n">Name*</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="e">E-mail</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col-md-6">
                                            <label for="p">Phone*</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"  name="phone" required>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="p">Password*</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col-md-6">
                                            <label for="p">Universiest</label>
                                            <select name="university_id" id="university_id" onchange="loadFaculty();" class="form-control">
                                                <option></option>
                                                @foreach (\App\Models\University::all() as $university)
                                                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="p">Faculties</label>
                                            <select name="faculty_id" id="faculties" class="form-control">
                                                <option></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col-md-3">
                                            <label for="s">Semester</label>
                                            <input type="number" min="0" class="form-control" name="semester">
                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="sch">School</label>
                                            <input type="text" class="form-control" name="school" >
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cl">Class</label>
                                            <input type="number" min="0" class="form-control" name="class">
                                        </div>
                                    </div>



                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Register Now') }}
                                        </button>
                                    </div>

                                </form>
                                <div class="text-right">
                                    <a href="{{ route('login')}}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>

    <script>
        function loadFaculty(){
           var university_id = $('#university_id').val();
           console.log(university_id);
           axios.post('{{route('faculty.load')}}',{'university_id':university_id})
           .then(function(res){
               $('#faculties').html(res.data);
               console.log(res.data);
           }).catch(function(err){
               console.log(erro);
           });
        }
    </script>
  </body>
</html>


