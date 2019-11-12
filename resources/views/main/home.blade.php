@extends('main.header')



@section('css')

<link rel="stylesheet" href="{{ asset('/css/flexslider.css')}}" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ asset('/css/carousell.css')}}" type="text/css" media="screen" />
<meta name="description"
    content="Informasi seputar seminar kesehatan, yang di ikuti oleh Doktor Umum, 
    Doktor Spesialis, PPDS, Dokter Muda, Perawat Apoteker, Farmasi. Yang diselenggarakan di dalam kota maupun luar kota.">
<meta name="keywords" content="simposium, simpoku, seminar, seminar kesehatan, perawat, apoteker, dokter, ">
<meta name="author" content="">
<meta name="absrtact" content="">


@endsection

@section('content')

<script>




</script>

<style>
    .main {
        font-family: Arial;
        width: 100%;
        display: block;
        margin: 0 auto;
    }

    .tii {

        color: #3498db;
        font-size: 36px;
        line-height: 100px;
        margin: 10px;
        padding: 2%;
        position: relative;
        text-align: center;
    }

    .action {
        display: block;
        margin: 100px auto;
        width: 100%;
        text-align: center;
    }

    .action a {
        display: inline-block;
        padding: 5px 10px;
        background: #f30;
        color: #fff;
        text-decoration: none;
    }

    .action a:hover {
        background: #000;
    }

    @media (max-width: 1200px) {
        .kecil {
            height: 300px !important;

        }
    }

    @media (max-width: 765px) {
        .kecil {
            height: 127px !important;
            border-top-right-radius : 1rem !important;
            border-top-left-radius: 1rem !important;
        }
        .txtKecil{
            color: black;
        }
        .bgKecil {
            height: 200px !important;
            border: #dee2e6 1px solid !important;
            border-radius: 1rem !important;
        }

        .desSlider {
            display: block !important;
        }
    }
</style>
<div class="bawahHome" style="">
    @if (auth()->guard('member')->check() && auth()->guard('member')->user()->email_verified_at == NULL)
    <div class="alert alert-warning" role="alert">
        Please Verify Your Email Address by clicking Link.<br>
        If Your are not receive an email. click <a
            href="{{ url('/resend/'.auth()->guard('member')->user()->id) }}">RESEND</a> to resend mail verification.
    </div>
    @endif
    <div class=" container bawah">
        <div class="">



            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                {{-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol> --}}
                <div class="carousel-inner">
                    @foreach ($carousel as $data )

                    @if($loop->first)
                    <div class="carousel-item active">
                        @else
                        <div class="carousel-item">
                            @endif
                            @if ($data->jenis == 'event')
                            <a href="/dataevent?id={{$data->idEvent}}" class="">
                                @else
                                <a href="/dataiklan?id={{$data->id}}">
                                    @endif
                                    <div class="card text-white border-0 img bgKecil" style="height: 370px;">
                                        <img class="card-img img-fluid kecil" src="{{asset ('/assets/banner/'.$data->gambar)}}"
                                            alt="" style=" object-fit: cover !important; height: 100%">
                                        <div class="card-img-overlay d-flex linkfeat" style="z-index: 9999 !important">

                                            <div class="align-self-end">
                                                {{-- <span class="badge">{{$data->city}}, {{$data->regional}}</span>
                                                --}}
                                                <h4 class=" txtKecil" style="font-weight: bold ">{{$data->judul}}</h4>
                                                <p id="desSlider" class="textfeat txtKecil" style="display: none; ">
                                                    {{$data->deskripsi}}</p>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                        </div>

                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>


        <div class="container" style="margin-top: 30px; background-color: white; ">
            <style type="text/css">
            </style>
            <section id='tampilevent' class="pt-3 pb-3">
                <div class="row">

                    <div class="col-lg-9 col-md-12">

                        <div class="card border-0 m-0 p-0">
                            <div class="row">
                                <div class="col-lg-10 col-sm-6" style="bottom: -5px">
                                    <h4 class=" heading-large warna1">Upcoming Events </h4>
                                </div>

                            </div>
                            {{-- <div id="tampilEventHome"></div> --}}
                            <div class="card-body m-0 p-0 postList border-0">
                                @foreach ($event as $even)
                                <a href="/dataevent?id={{$even->id}}" class="media pl-2 pt-3 pb-3 border-B listHover">
                                    <div class="media">
                                        <div class="last-media-img ml-1 mt-1 mr-2"
                                            style="">
                                            <img src="{{asset ('/assets/thumbnails/'.$even->gambar)}}" alt="" width="120" height="120" style="object-fit: cover">
                                        </div>
                                        <div class="media-body pt-1">
                                            <div class="time-cat pb-1 pl-0">
                                                <span class="badge" style="">{{$even->city}}, {{$even->region}}</span>
                                                <small class="text-time "
                                                    style="">{{date('d M', strtotime($even->tglMulai))}}
                                                    s/d
                                                    {{date('d M Y', strtotime($even->tglAkhir))}}</small>
                                            </div>
                                            <p class="mb-0 text-burgundy" id="title-lm">{{$even->judul}} </p>
                                            <p class="d-none d-lg-block mb-2 ">{{$even->deskripsi}}</p>
                                            <p class="d-none d-lg-block mb-0">Specialist : {{$even->spec}}</p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach

                            </div>
                            <div id="load_more" class="pt-2 pb-4">
                                <a name="load_more_button" id="load_more_button" class="btn btn-light form-control load"
                                    href="event">Show More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 side-bar col-md-12">
                        <!--- BP Batam LOGO --->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <h4 class=" heading-large warna1">Download App </h4>
                            </li>
                        </ul>
                        <a href="" target="_blank">
                            <img src="{{asset ('/assets/gambar/qrcode.png')}}" class="img-fluid img-thumbnail border-0"
                                alt="asd">
                        </a>
                        <div class="text-center">
                            <a href="https://play.google.com/store/apps/details?id=com.genossys.simpoku_app&hl=en" target="_blank" class="btn btn-light w-200" style="border-radius: 5rem !important"><img
                                    class="m-0 p-0" src="{{ asset('/assets/gambar/playstore.png') }}" alt="Twitter"
                                    width="150"></a>
                        </div>
                        <div class="clearfix"></div>
                        <br>

                    </div>

            </section>

        </div>







        @endsection

        @section('script')
        <script src="{{ asset('/js/tampilan/listevent1.js') }}"></script>

        <script>
            function cariEvenHome() {
            var txt = $('.txtCariEven').val();
            if(txt === ''){
                alert('data kosong');
            }else {
            
            document.getElementById('formCari').action = 'event';
            document.getElementById('formCari').type = 'POST';
            document.getElementById('formCari').submit();
            sessionStorage.setItem('cari',txt);
                
            }
            
        }
        $(document).ready(function(){
            
        $(".linkfeat").hover(
          function () {
              $(".textfeat").show(500);
          },
          function () {
              $(".textfeat").hide(500);
          }
      );
  });
        
      

     
            

           
            
            
    
           
            
                  
        </script>
        @endsection