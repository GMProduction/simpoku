<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simpoku</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset ('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">

    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/genosstyle.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/flipkart.css') }}" rel="stylesheet" />

    <script src="{{ asset('/js/flipkart.js') }}"></script>

    <link rel="shortcut icon" href="{{asset('assets/gambar/logo2.png')}}" type="image/x-icon">


    @yield('css')

    <script>
        function cariDataevent(){
        var a = $('#txtCari').val();
        
        if(event.keyCode === 13){
            window.location = 'event';
            cariEven(a);
        }
    }
    </script>


</head>

<body style="" class="">
    -->
    <div id="flipkart-navbar" class="warna-burgundy fixed-top z-depth-2">
        <div class="container">
            <div class="row row1">
                <div class="col-lg-12 justify-content-end">
                    <ul class="largenav float-right " style="height: 10px">

                        <li class="upper-links"><a class="links" href="event"><i class="fa fa-calendar"
                                    aria-hidden="true"></i> Event</a></li>
                        @if (auth()->guard('member')->check())
                            {{auth()->guard('member')->user()->fullname}}
                            <li class="upper-links"><a class="links" href="/logout"><i class="fa fa-sign-out"
                                    aria-hidden="true"></i> Logout</a></li>
                        @else
                            <li class="upper-links"><a class="links" href="login"><i class="fa fa-lock"
                        aria-hidden="true"></i> Login </a></li>
                        
                        <li class="upper-links">|</li>
                        <li class="upper-links"><a class="links" href="/register"><i class="fa fa-sign-in"
                                    aria-hidden="true"></i> Register</a></li>
                        @endif
                        
                        

                    </ul>
                </div>
            </div>
            <div class="row row2">
                <div class="col-sm-12 col-lg-3 col-md-5">
                    <h2 style="margin:0px;"><span class="smallnav menu" onclick=""><i class="fa fa-bars"
                                onclick="openNav()" aria-hidden="true"></i> <a href="/">Simpoku</a></span></h2>
                    <h1 style="margin:0px; position: absolute;" class=""><a href="/" class="profile-li"><span
                                class="largenav"><img src="{{ asset('/assets/gambar/logo1.png') }}" width="250" style=""
                                    alt=""></span></a></h1>
                </div>
                <div class="flipkart-navbar-search smallsearch col-lg-8 col-md-7 col-sm-11 float-left">
                    <div class="row rounded5rem bg-putih">
                        <input class="flipkart-navbar-input col-md-11 col-sm-11 text-black"
                            style="background-color: transparent" type="text" id="txtCari"
                            placeholder="Search Event Name, Specialist, Region, Month " name=""
                            onkeyup="cariDataevent()">
                        <button class="flipkart-navbar-button  col-md-1 col-sm-1 rounded5rem-kanan warna-gray" style=""
                            onclick="cariDataevent()">
                            <i class="fa fa-lg fa-search"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="mySidenav" class="sidenav" style="z-index: 9999">
        <div class="container warna-burgundy" style="padding-top: 10px; height: 119px">
            <span class="sidenav-heading"><img src="{{ asset('/assets/gambar/logo.png') }}" width="100" style=""
                    alt=""></span>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        </div>
        <a class="links" href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a class="links" href="event"><i class="fa fa-calendar" aria-hidden="true"></i> Event</a>
        <a class="links" href="login"><i class="fa fa-lock" aria-hidden="true"></i> Login</a>
        <a class="links" href="register"><i class="fa fa-sign-in" aria-hidden="true"></i> Register</a>
    </div>

    <div style="min-height: 231px">
        @yield('content')
    </div>



    <footer class="warna-burgundy footer" style="height: 300px">
        <div class="container">
            <div class="row pt-4 mr-3">
                <div class="col-6">
                    <h6 class="text-uppercase pb-1 font-weight-bold">Contact Us :</h6>
                    <p class="mb-2"><i class="fa fa-envelope mr-3 "></i>admin@simpoku.com</p>
                    <p><i class="fa fa-phone mr-3"></i>+628 1166 63339</p>
                    <br>
                    <h6 class="text-uppercase font-weight-bold" style="">Social Media :</h6>
                    <div class="row">
                        <a href="ig">
                            <img class="m-2" src="{{ asset('/assets/gambar/instagram.png') }}" alt="Instagram">
                        </a>
                        <a href="fb">
                            <img class="m-2" src="{{ asset('/assets/gambar/facebook.png') }}" alt="Facebook">
                        </a>
                        <a href="tw">
                            <img class="m-2" src="{{ asset('/assets/gambar/twitter.png') }}" alt="Twitter">
                        </a>

                    </div>
                </div>


                <div class="col-3">
                    <label class="text-uppercase pb-1 font-weight-bold ">About Us :</label>


                </div>
                <div class="col-12"> 
                    <div class=" row col-12 justify-content-center pt-5">
                        <small><i class="fa fa-copyright" aria-hidden="true"></i> Powered By abiaga</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>



</body>


<!-- JS -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')

<script>
    function cariEven(nm) {
    $.ajax({
        type : 'GET',
        url : '/cariListEven',
        data : {
            nama: nm
        },
        success : function(data){
            $('#tampilanListEven').html(data.html);
            
        }
    })

   
    
}


        
</script>



@yield('script')