<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}">
 <title>Simpoku</title>
 <!-- Font -->

 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{asset ('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">

 <!-- Styles -->
 <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
 <link href="{{ asset('/css/genosstyle.css') }}" rel="stylesheet" />
 <link href="{{ asset('/css/animate.css') }}" rel="stylesheet" />

 
</head>

 <body>
    <nav class="navbar navbarfont navbar-expand-lg  warna-burgundy" style="height: 20px; font-family: 'hel';">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mt-2 ml-auto mt-sms-0  ">
                
                @if (auth()->guard('member')->check())
                    <li class="nav-item dropdown">
                        <a class="text-white nav-link small" data-toggle="dropdown" href="#"> {{auth()->guard('member')->user()->username}} <i class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <a href="{{route('logout')}}" class="dropdown-item dropdown-footer">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="">
                        <a class="text-white nav-link small" href="/register">Register</a>
                    </li>
                    <li class="">
                        <label class="text-white  nav-link small">|</label>
                    </li>
                    <li class=" ">
                        <a class="text-white nav-link small" href="/login"> Login <i class="fa fa-user"></i></a>
                    </li>
                @endif
                
    
            </ul>
        </div>        
    </nav>

    
  
<nav class="navbar navbarfont navbar-expand-lg home" id='navMenu' style="height: 49px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span id="toggler"><i class="fa fa-bars" aria-hidden="true"></i></span>
    </button>
    <a class="navbar-brand" href="#">
        <!-- <img src="{{ asset('/assets/gambar/logo2.png') }} " alt="logo" /> -->
    </a>

    <div class="collapse navbar-collapse navbar-brand" id="">
        <a style="position: absolute; top: 5px" href="/">
                <img class=""  src="{{ asset('/assets/gambar/simpoku.png') }}" alt="simpoku" width="120" height="" >
        </a>
        <ul class="navbar-nav ml-auto mt-sms-0" style="width: 100px">
            <li class="nav-item" style="">
               <input type="text" class="form-control">
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mt-sms-0  ">
            <li class="nav-item ">
                <a id="home" class="text-burgundy garis lead" href="/">Home </a>
            </li>

            <li class="nav-item ">
                <a id="event" class="text-burgundy garis lead" href="/event">Events</a>
            </li>

            <li class="nav-item ">
                <a id="about" class="text-burgundy garis lead" href="/about">About Us</a>
            </li>

        </ul>
    </div>
</nav>

@yield('content')



  
<footer class="warna-burgundy footer" style="">
    <div class="container">
    <div class="row pt-5 mr-3">
        <div class="col-3">
            <label class="text-white lead">Company</label>
        </div>
        <div class="col-3">
                <label class="text-white lead">Company</label>
            </div>
        <div class="col-3">
                <label class="text-white lead">Company</label>
                <div class="row">
                    <a href="ig">
                            <img class="m-2" src="{{ asset('/assets/gambar/instagram.png') }}" alt="Instagram">
                    </a>
                    <a href="fb">
                            <img  class="m-2" src="{{ asset('/assets/gambar/facebook.png') }}" alt="Facebook">
                        </a>
                        <a href="tw">
                                <img class="m-2"  src="{{ asset('/assets/gambar/twitter.png') }}" alt="Twitter">
                            </a>
                        
                        
                        
                </div>
                
        </div>
        
    </div>
    </div>
</footer>

</body>


<!-- JS -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>

<script>
        $(document).ready(function(){
            $(window).scroll(function (){
                if($(window).scrollTop() > 100){
                    $('#navMenu').addClass('fixed-top');
                    $('#navMenu').addClass('bg-putih');
                    $('#navMenu').removeClass('');
                    $('#navMenu').addClass('z-depth-2');
                    $('.bawah').addClass('conten-fixed');
                }else{
                   $('#navMenu').removeClass('fixed-top');
                   $('#navMenu').removeClass('bg-putih');
                   $('#navMenu').addClass('');                  
                   $('.bawah').removeClass('conten-fixed');
                   $('#navMenu').removeClass('z-depth-2');
                }
            });
        });
    </script>