<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css')}}">

</head>
<body>

    <div class="main">
        <div class="sidebar">
            <div class="side-menu">
                <div class="logo text-center">
                    <img src="https://www.logodesign.net/images/nature-logo.png" alt="" style="width:150px;">
                </div>
                <style>
                    .menu{
                        padding: 10px;

                    }
                    .menu-item{
                        height: 31px;
                        width: 100%;
                        padding-left: 2rem;
                        line-height: 2;
                        background: rgb(26, 24, 24);
                        margin-left: 2px;
                        margin-top: 8px;
                        margin-bottom: 12px;
                        border-radius: 5px;
                    }
                    .menu-item:hover{
                        height: 31px;
                        width: 100%;
                        padding-left: 2rem;
                        line-height: 2;
                        background: rgb(252, 82, 15);
                        margin-left: 2px;
                        margin-top: 8px;
                        margin-bottom: 12px;
                        border-radius: 5px;
                    }

                    .menu-item>a{
                        font-size: 13px;
                        color: rgb(255, 255, 255);
                        text-decoration: none;
                        font-weight: 600;
                    }
                </style>
                <div class="menu">
                    <div class="menu-item">
                        <a href="{{ url('/') }}">Home</a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('note.list')}}">Note List</a>
                    </div>
                    <div class="menu-item">
                        <a href="">Menu name</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="top-bar">
                <div class="title">@yield('title')</div>
                <div class="toolbar">
                    @yield('tools')
                    <button class="round_btn " data-toggle="dropdown" >
                        <img style="width: 20px;" src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/user-512.png" alt="">
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('note.index') }}">Upload Note</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="{{ route('logout')}}">Log Out</a>
                    </div>

                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{ asset('js/axios.min.js')}}"></script>
    <script src="{{ asset('js/dropify.min.js')}}"></script>
    <script src="{{ asset('js/dropify.js')}}"></script>

    @yield('js')
</body>
</html>
