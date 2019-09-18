<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="revisit-after" content="7 day">
    <meta name="robots" content="all, index, follow">
    <meta name="description"
        content="Informasi seputar seminar kesehatan, yang di ikuti oleh Doktor Umum, 
    Doktor Spesialis, PPDS, Dokter Muda, Perawat Apoteker, Farmasi. Yang diselenggarakan di dalam kota maupun luar kota.">


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



    <link rel="shortcut icon" href="{{asset('assets/gambar/logo2.png')}}" type="image/x-icon">


    @yield('css')

    <script>
        function cariDataevent(){
        var a = $('#txtCari1').val();
        
        if(event.keyCode === 13){
            window.location = 'eventsearch?par='+a;
            //cariEven(a);
        }
    }
    </script>


</head>

<body style="" class="" style=" ">
    -->
    <div id="flipkart-navbar" class="warna-burgundy fixed-top z-depth-2">
        <div class="container">
            <div class="row row1">
                <div class="col-lg-12 justify-content-end">
                    <ul class="largenav float-right " style="height: 10px">

                        <li class="upper-links"><a class="links" href="event"><i class="fa fa-calendar"
                                    aria-hidden="true"></i> Event</a></li>
                        @if (auth()->guard('member')->check())
                        Hi, {{auth()->guard('member')->user()->fullname}}
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
                            style="background-color: transparent" type="text" id="txtCari1"
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

    <div style="min-height: 100%" class="">
        @yield('content')
    </div>



    <footer class="mt-5" style="background-color: #E9ECEF">
        <div class="container">
            <div class="row pt-4">
                <div class="col-lg-4 col-sm-12 pb-4">
                    <div class="pb-2">
                        <h6 class="text-uppercase pb-1 font-weight-bold">Contact Us :</h6>
                        <p class="mb-2"><i class="fa fa-envelope mr-3 "></i>support@simpoku.com</p>
                        <p><i class="fa fa-phone mr-3"></i>0822 2345 5737</p>
                    </div>
                    <div class="pb-4">
                        <h6 class="text-uppercase font-weight-bold pb-1" style="">Social Media :</h6>
                        <div class="row col-12">
                            <a href="instagram" id="" class="" aria-hidden="true">
                                <span class="fa-stack fa-lg ig" aria-hidden="true" id="ig">
                                    {{-- <i class="fa fa-square-o fa-stack-2x"></i> --}}
                                    <i class="fa fa-instagram fa-stack-2x ig" aria-hidden="true"></i>
                                    {{-- <i class="fa fa-instagram fa-stack-1x "></i> --}}
                                </span>
                            </a>
                            <a href="facebook" id="fb">
                                <span class="fa-stack fa-lg">
                                    {{-- <i class="fa fa-square-o fa-stack-2x"></i> --}}
                                    <i class="fa fa-facebook-square fa-stack-2x"></i>
                                </span>
                            </a>
                            <a href="twitter" id="tw">
                                <span class="fa-stack fa-lg">
                                    {{-- <i class="fa fa-square-o fa-stack-2x"></i> --}}
                                    <i class="fa fa-twitter-square fa-stack-2x" style=""></i>
                                </span>
                            </a>

                        </div>
                    </div>
                    <div class="pb-2">
                        <h6 class="text-uppercase font-weight-bold">Download</h6>
                        <a href="android" id="ad" class="">
                            <span class="fa-stack fa-lg">
                                {{-- <i class="fa fa-square-o fa-stack-2x"></i> --}}
                                <i class="fa fa-android fa-stack-2x" style=""></i>
                            </span>
                        </a>
                    </div>
                </div>


                <div class="col-lg-8 col-sm-12">
                    <label class="text-uppercase pb-1 font-weight-bold ">About Us :</label>
                    <p align="justify">
                        Di akhir tahun 2018, terik mentari menyengat dan 2 orang sahabat berteduh di tempat yang kami
                        menyebutnya "sor talok" dengan secangkir kopi. Mereka adalah - orang yang selama ini
                        menemukan banyak keresahan dari seminar - seminar kedokteran yang telah banyak mereka amati.
                        Berdikusi dan mengumpulkan banyak opini rekan - rekan sejawat yang banyak berkeluh kesah atas
                        event kedokteran yang mereka tangani, membuat mereka berdua harus berpikir tidak lazim dan
                        mengubah paradigma mereka sendiri.
                        SIMPOKU adalah hasil pemikiran out of the box sebagai sarana rekan sejawat untuk menjawab
                        berbagai keresahan tersebut. Dengan menyuguhkan daftar event kedokteran terlengkap sebagai
                        pondasi awal, kami ingin menjadi partner untuk rekan-rekan sejawat untuk mensukseskan
                        event - event kedokteran.
                    </p>

                </div>
                <div class="col-12">
                    <div class=" row col-12 justify-content-center pt-5">
                        <small><i class="fa fa-copyright" aria-hidden="true"></i> Powered By abiaga</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <style>
        #tw:hover {
            color: #1DA1F2;
        }

        #fb:hover {
            color: #4267B2;
        }

        #ad:hover {
            color: #A4C639;
        }

        .ig:hover {
            background: pink;
            background: -webkit-radial-gradient(33% 100% circle, #FED373 4%, #F15245 30%, #D92E7F 62%, #9B36B7 85%, #515ECF);
            background: radial-gradient(circle at 33% 100%, #FED373 4%, #F15245 30%, #D92E7F 62%, #9B36B7 85%, #515ECF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;


        }

        .instagrsam {
            background: pink;
            background: -webkit-radial-gradient(33% 100% circle, #FED373 4%, #F15245 30%, #D92E7F 62%, #9B36B7 85%, #515ECF);
            background: radial-gradient(circle at 33% 100%, #FED373 4%, #F15245 30%, #D92E7F 62%, #9B36B7 85%, #515ECF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;





        }
    </style>





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