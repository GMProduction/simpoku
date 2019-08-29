@extends('main.header')



@section('css')

<link href="{{ asset('/css/tab.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('/css/flexslider.css')}}" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ asset('/css/carousell.css')}}" type="text/css" media="screen" />
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


    <div class="container pt-4">
        <style type="text/css">

        </style>
        <div class="row" style="">
            <div class="col-sm-12 col-md-6 col-lg-6  py-0 pl-3 pr-1 featcard">
                <div id="featured" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($homeCarousell as $data )
                        @if($loop->first)
                        <div class="carousel-item active">
                            @else
                            <div class="carousel-item">
                                @endif

                                <div class="card bg-dark text-white border-0">
                                    <img class="card-img img-fluid" src="{{asset ('/assets/foto/'.$data->gambar)}}"
                                        alt="" style="height: 276px">
                                    <div class="card-img-overlay d-flex linkfeat">
                                        <a href="{{$data->id}}" class="align-self-end">
                                            <span class="badge">{{$data->regional}}</span>
                                            <h4 class="card-title">{{$data->judul}} </h4>
                                            <p class="textfeat" style="display: none;">{{$data->deskripsi}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--
                        <div class="carousel-item active">
                            <div class="card bg-dark text-white">
                                <img class="card-img img-fluid"
                                    src="https://makro.id/admin/media/image/cegah-korupsi-ini-yang-dilakukan-bandara-hang-nadim-dan-pelabuhan-1564066372.jpg"
                                    alt="">
                                <div class="card-img-overlay d-flex linkfeat">
                                    <a href="https://makro.id/cegah-korupsi-ini-yang-dilakukan-bandara-hang-nadim-dan-pelabuhan"
                                        class="align-self-end">
                                        <span class="badge">Industri</span>
                                        <h4 class="card-title">Cegah Korupsi, Ini yang Dilakukan Bandara Hang Nadim dan
                                            Pelabuhan Batam </h4>
                                        <p class="textfeat" style="display: none;">MAKRO.ID, BATAM - Badan Pengusahaan
                                            (BP) Batam melalui BUBU Hang Nadim Batam dan Badan Pengelola Pelabuhan Batam
                                            bersama KSOP Khusus Batam, melakukan penandatanganan pencanangan pembangunan
                                            zona integritas menuju Wilayah Bebas</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card bg-dark text-white">
                                <img class="card-img img-fluid"
                                    src="https://makro.id/admin/media/image/ini-cara-bp-batam-untuk-gaet-investor-ke-kota-batam-1564063343.jpg"
                                    alt="">
                                <div class="card-img-overlay d-flex linkfeat">
                                    <a href="https://makro.id/ini-cara-bp-batam-untuk-gaet-investor-ke-kota-batam"
                                        class="align-self-end">
                                        <span class="badge">Industri</span>
                                        <h4 class="card-title">Ini Cara BP Batam untuk Gaet Investor ke Kota Batam</h4>
                                        <p class="textfeat" style="display: none;">MAKRO.ID, BATAM&nbsp;- Badan
                                            Pengusahaan (BP) Batam terus berusaha menggenjot investasi di Kota Batam,
                                            Provinsi Kepulauan Riau.

                                            Salah satunya dengan melakukan promosi ke Taiwan. Kehadiran BP Batam ke
                                            Taiwan untuk&nbsp;memenuhi undangan dari</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card bg-dark text-white">
                                <img class="card-img img-fluid"
                                    src="https://makro.id/admin/media/image/bp-batambatalkan-alokasi-lahanpt-pulau-mas-putih-1563445416.jpeg"
                                    alt="">
                                <div class="card-img-overlay d-flex linkfeat">
                                    <a href="https://makro.id/bp-batambatalkan-alokasi-lahanpt-pulau-mas-putih"
                                        class="align-self-end">
                                        <span class="badge">Industri</span>
                                        <h4 class="card-title">BP Batam Batalkan Alokasi Lahan PT Pulau Mas Putih</h4>
                                        <p class="textfeat" style="display: none;">MAKRO.ID, BATAM&nbsp;- Program
                                            penertiban lahan terus dilaksanakan oleh BP Batam, salah satunya adalah
                                            pemasangan papan pemberitahuan pada alokasi lahan yang dilaksanakan pada
                                            Rabu (17/7/2019) siang. Papan pemberitahuan ini telah dipasang</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card bg-dark text-white">
                                <img class="card-img img-fluid"
                                    src="https://makro.id/admin/media/image/3-perusahaan-hongkong-jajaki-peluang-investasi-di-batam-1563364236.jpeg"
                                    alt="">
                                <div class="card-img-overlay d-flex linkfeat">
                                    <a href="https://makro.id/3-perusahaan-hongkong-jajaki-peluang-investasi-di-batam"
                                        class="align-self-end">
                                        <span class="badge">Industri</span>
                                        <h4 class="card-title">3 Perusahaan Hongkong Jajaki Peluang Investasi di Batam
                                        </h4>
                                        <p class="textfeat" style="display: none;">MAKRO.ID, BATAM - Plh Direktur
                                            Promosi dan Humas BP Batam Mohamad Taofan menuturkan Batam terbuka dengan
                                            masuknya investasi asing. Batam memiliki banyak peluang usaha yang dapat
                                            ditawarkan kepada investor.

                                            &ldquo;Peluang investasi</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card bg-dark text-white">
                                <img class="card-img img-fluid"
                                    src="https://makro.id/admin/media/image/pejabat-eselon-ii-bp-batam-dirotasi-1563185753.jpeg"
                                    alt="">
                                <div class="card-img-overlay d-flex linkfeat">
                                    <a href="https://makro.id/pejabat-eselon-ii-bp-batam-dirotasi"
                                        class="align-self-end">
                                        <span class="badge">Ragam</span>
                                        <h4 class="card-title">Pejabat Eselon II BP Batam Dirotasi</h4>
                                        <p class="textfeat" style="display: none;">MAKRO.ID, BATAM - Kepala BP Batam,
                                            Edy Putra Irawady melantik 8 pejabat stuktural &nbsp;Eselon II dan III di
                                            lingkungan BP Batam pada Jumat (12/7/2019) pagi.&nbsp;

                                            Pelantikan ini dilaksanakan di Ruang Rapat</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    -->
                        </div>
                    </div>
                </div>
                <div class="col-6 py-0 px-1 d-none d-lg-block">
                    <div class="row">
                        @php
                        $a = 1;
                        @endphp
                        @foreach ($homeCarousell as $data )
                        <div class="col-6 pb-2 mg-{{$a}}">
                            <div class="card bg-dark text-white border-0">
                                <img class="card-img img-fluid" src="{{asset ('/assets/foto/'.$data->gambar)}}" alt=""
                                    style="height: 134px">
                                <div class="card-img-overlay d-flex">
                                    <a href="/dataevent?id=/dataevent?id={{$data->id}}}}" class="align-self-end">
                                        <span class="badge">Industri</span>
                                        <h6 class="card-title">{{$data->judul}} </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @php
                        $a = $a+1;
                        @endphp

                        @endforeach
                        <!--
                    <div class="col-6 pb-2 mg-1	">
                        <div class="card bg-dark text-white">
                            <img class="card-img img-fluid"
                                src="https://makro.id/admin/media/image/cegah-korupsi-ini-yang-dilakukan-bandara-hang-nadim-dan-pelabuhan-1564066372.jpg"
                                alt="">
                            <div class="card-img-overlay d-flex">
                                <a href="https://makro.id/cegah-korupsi-ini-yang-dilakukan-bandara-hang-nadim-dan-pelabuhan"
                                    class="align-self-end">
                                    <span class="badge">Industri</span>
                                    <h6 class="card-title">Cegah Korupsi, Ini yang Dilakukan Bandara Hang Nadim dan
                                        Pelabuhan Batam </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pb-2 mg-2	">
                        <div class="card bg-dark text-white">
                            <img class="card-img img-fluid"
                                src="https://makro.id/admin/media/image/ini-cara-bp-batam-untuk-gaet-investor-ke-kota-batam-1564063343.jpg"
                                alt="">
                            <div class="card-img-overlay d-flex">
                                <a href="https://makro.id/ini-cara-bp-batam-untuk-gaet-investor-ke-kota-batam"
                                    class="align-self-end">
                                    <span class="badge">Industri</span>
                                    <h6 class="card-title">Ini Cara BP Batam untuk Gaet Investor ke Kota Batam</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pb-2 mg-3	">
                        <div class="card bg-dark text-white">
                            <img class="card-img img-fluid"
                                src="https://makro.id/admin/media/image/bp-batambatalkan-alokasi-lahanpt-pulau-mas-putih-1563445416.jpeg"
                                alt="">
                            <div class="card-img-overlay d-flex">
                                <a href="https://makro.id/bp-batambatalkan-alokasi-lahanpt-pulau-mas-putih"
                                    class="align-self-end">
                                    <span class="badge">Industri</span>
                                    <h6 class="card-title">BP Batam Batalkan Alokasi Lahan PT Pulau Mas Putih</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pb-2 mg-4	">
                        <div class="card bg-dark text-white">
                            <img class="card-img img-fluid"
                                src="https://makro.id/admin/media/image/3-perusahaan-hongkong-jajaki-peluang-investasi-di-batam-1563364236.jpeg"
                                alt="">
                            <div class="card-img-overlay d-flex">
                                <a href="https://makro.id/3-perusahaan-hongkong-jajaki-peluang-investasi-di-batam"
                                    class="align-self-end">
                                    <span class="badge">Industri</span>
                                    <h6 class="card-title">3 Perusahaan Hongkong Jajaki Peluang Investasi di Batam</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                -->
                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="container pt-3 " style="">




        <style type="text/css">

        </style>


        <section id='tampilevent'>
            <div class="row">

                <div class="col-lg-9 col-md-12">

                    <div class="card border-0 m-0 p-0">
                        <div class="row">
                            <div class="col-lg-10 col-sm-6" style="bottom: -5px">
                                <h4 class=" heading-large title-homeEven">Incoming Events </h4>
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
                                            <span class="badge">{{$even->region}}</span>
                                            <small class="text-time">{{date('d M', strtotime($even->tglMulai))}} s/d
                                                {{date('d M Y', strtotime($even->tglAhkir))}}</small>
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
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#pop" role="tab">Terpopuler</a>
                        </li>
                    </ul>
                </div>

        </section>

    </div>







    @endsection

    @section('script')

    <script>
        $(document).ready(function(){
        
            });

            function homeCarousell(){           
                   
                $.ajax({
                    type: 'GET',
                    url: '/homeCarousell',
                    success : function(data){
                        
                }
                }) ;
           }
           function tampilDoktor(){
               
               if($('#nav-home-tab').hasClass('active')){
                   alert('aktiv');
               }
           }

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
        
        

            function tampilEvenTahun(th){
                $.ajax({
                type : 'GET',
                url : '/eventTahun',
                data : {
                    tahun: th
                },
                success : function(data){
                    if(th === '2019'){
                        $('#slide2019').html(data.html);
                    }else{
                        $('#slide2018').html(data.html);
                    }                    
                    

                }
            });
            }

            function spec(){
                tampilEvenSpec('SpOG');
            }

            function tampilEvenSpec(sp){
               
                $.ajax({
                type : 'GET',
                url : '/eventSpec',
                data : {
                    spec: sp
                },
                success : function(data){
                    if(sp === 'SpOG'){
                        $('#slideSpOG').html(data.html);
                    }else{
                        $('#slide').html(data.html);
                    }                    
                    

                }
            });
            }
            
           $(window).on('load', function(){
              tampilEvenTahun('2019');
              tampilEvenTahun('2018')
            });

            
            
    
           
            
                  
    </script>
    @endsection