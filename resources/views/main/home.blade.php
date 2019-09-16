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
</style>
<div class="bawahHome" style="">
    @if (auth()->guard('member')->check() && auth()->guard('member')->user()->email_verified_at == NULL)
        <div class="alert alert-warning" role="alert">
            Please Verify Your Email Address by clicking Link.<br>
            If Your are not receive an email. click <a href="{{ url('/resend/'.auth()->guard('member')->user()->id) }}">RESEND</a> to resend mail verification.
        </div>
    @endif
    <div class="jumbotron jumbotron-fluid">
        <div class="container">

            {{-- <div class="flexslider" style="">
                <ul class="slides">

                    @foreach ($carousel as $data )
                    <li>
                        <div class="card bg-dark text-white border-0" style="">
                            <img class="card-img img-fluid" src="{{asset ('/assets/foto/'.$data->gambar)}}" alt=""
            style=" object-fit: cover; height: 400px;" >

            <div class="card-img-overlay linkfeat d-flex ">
                <a href="/dataevent?id={{$data->id}}" class="align-self-end ">
                    <h4 class="card-title">{{$data->judul}} </h4>
                    <p class="textfeat" style="display: none;">{{$data->deskripsi}}</p>
                </a>
            </div>
        </div>


        </li>
        @endforeach

        </ul>
    </div> --}}

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        {{-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol> --}}
        <div class="carousel-inner">
                @foreach ($homeCarousell as $data )
    
                @if($loop->first)
                <div class="carousel-item active">
                    @else
                    <div class="carousel-item">
                        @endif

                        <div class="card bg-dark text-white border-0" style="height: 400px;">
                            <img class="card-img img-fluid" src="{{asset ('/assets/foto/'.$data->gambar)}}"
                                alt="" style=" object-fit: cover">
                            <div class="card-img-overlay d-flex linkfeat">
                                <a href="/dataevent?id={{$data->id}}" class="align-self-end">
                                    <span class="badge">{{$data->city}}, {{$data->regional}}</span>
                                    <h4 class="card-title">{{$data->judul}} </h4>
                                    <p class="textfeat" style="display: none;">{{$data->deskripsi}}</p>
                                </a>
                            </div>
                        </div>

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


<div class="container border" style="margin-top: -80px; background-color: white;  border-radius: 1rem !important">




    <style type="text/css">

    </style>


    <section id='tampilevent' class="pt-3 pb-3">
        <div class="row">

            <div class="col-lg-9 col-md-12">

                <div class="card border-0 m-0 p-0">
                    <div class="row">
                        <div class="col-lg-10 col-sm-6" style="bottom: -5px">
                            <h4 class=" heading-large title-homeEven">Upcoming Events </h4>
                        </div>
                        <div class="col-lg-2 col-sm-6" style="bottom: -5px">
                            <a href="event" class="pull-right">Show more</a>
                        </div>
                    </div>
                    <div class="card-body m-0 p-0 postList border-0">
                        @foreach ($event as $even)
                        <a href="/dataevent?id={{$even->id}}" class="media pl-2 pt-3 pb-3 border-B listHover">
                            <div class="media">
                                <div class="last-media-img ml-1 mt-1 mr-2"
                                    style="background-image: url({{asset ('/assets/foto/'.$even->gambar)}})">
                                </div>
                                <div class="media-body pt-1">
                                    <div class="time-cat pb-1 pl-0">
                                        <span class="badge">{{$even->city}}, {{$even->region}}</span>
                                        <small class="text-time" style="">{{date('d M', strtotime($even->tglMulai))}}
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
                </div>
            </div>
            <div class="col-lg-3 side-bar col-md-12">
                <!--- BP Batam LOGO --->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <h4 class=" heading-large title-homeEven">Download App </h4>
                    </li>
                </ul>
                <a href="" target="_blank">
                    <img src="{{asset ('/assets/gambar/qrcode.png')}}" class="img-fluid img-thumbnail border-0"
                        alt="asd">
                </a>
                <div class="text-center">
                    <a href="#!" class="btn btn-light w-200" style="border-radius: 5rem !important"><img class="m-0 p-0"
                            src="{{ asset('/assets/gambar/playstore.png') }}" alt="Twitter" width="150"></a>
                </div>
                <div class="clearfix"></div>
                <br>

            </div>

    </section>

</div>







@endsection

@section('script')


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
        
      

        $(window).on('load',function(){
  $('.flexslider').flexslider({
    animation: "slide",
    rtl: true,
   
  });
});
            

           
            
            
    
           
            
                  
</script>
@endsection