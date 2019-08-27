
@extends('umum.header')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8">
            @if ((auth()->guard('member')->check()) && (auth()->guard('member')->user()->email_verified_at == NULL))
                <div class="alert alert-success" role="alert">
                    Akun Anda Belum Ter Verifikasi Silahkan Verifikasi Melalui Email Anda.
                </div>
            @endif
            <div class="card">
                <div class="card-header">Home</div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        Halaman home
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
{{-- <div class="bawah" style="">

    <div style="margin-top: -100px" class="">
            <div class="bgtekshome">
                    <img class="gambarfullhome" height="" src="" alt="">
                   
                    <div class="carihome">
                            <div class="d-flex justify-content-center">
                                    <div class="input-group mb-3" style="width: 50%; height: 50px">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text border-right-0" id="basic-addon1" style="background-color: white"><i class="fa fa-search fa-2x" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" class="form-control border-left-0" placeholder="Cari Even..." aria-label="Username" aria-describedby="basic-addon1" style="font-size: 18pt">
                                          </div>
                                        </div>
                                          
                             <!--   
                                <div class="border bg-putih d-flex justify-content-end"  style="width: 50%; height: 50px">
                                    
                                        <i class="fa fa-search fa-2x center" aria-hidden="true" style="height: 50px;"></i>
                                        <input type="" class="form-control border-0" style="height: 50px; font-size: 18pt; width: 90%"/>
                                </div>
                                
                        
                        

                      
                        <h1 class="judulhome anJudul">
                            ada Collection
                        </h1>
            
                        <p class="isihome anIsi">
                            Belanja baju mudah via online
                        </p>
            
                        <button class="btn btn-lg anBtn btn-depan">Lihat Produk</button>
                    -->
                    </div>
                </div>
        
    </div>
<div class="container" style="margin-top: 250px">

        <h4 class="text-center title-homeEven">New Event</h4>    
        <div class="row">
                
            <div class="col-sm-12 col-md-6 col-lg-6  py-0 pl-3 pr-1 anImgB">
                <div id="featured" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">			  
                            <div class="card text-white">
                                <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/review-gsp-amerika-ingin-perdagangan-yang-adil-dan-saling-menguntungkan-1531307731.jpg" alt="">
                                <div class="card-img-overlay d-flex linkfeat">
                                    <a href="" class="align-self-end">
                                        <span class="badge">Ekspor</span> 
                                        <h4 class="card-title">Review GSP: Amerika Ingin Perdagangan Saling Menguntungkan</h4>
                                        <p class="textfeat" style="display: none;">makro.id – Duta Besar Amerika Serikat untuk Indonesia Joseph R. Donovan menegaskan, langkah pemerintah Amerika Serikat meninjau ulang pemberian Generalized System od Preferenes (GSP) akan menguntungkan kedua belah pihak.
                  
                  Menurut Donovan,</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">			  
                            <div class="card text-white">
                                <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar-1531258457.jpeg" alt="">
                                 <div class="card-img-overlay d-flex linkfeat">
                                 <a href="" class="align-self-end">
                                    <span class="badge">Pertumbuhan Ekonomi</span> 
                                    <h4 class="card-title">DPR Setujui Penambahan Anggaran BP Batam Rp565 Miliar</h4>
                                    <p class="textfeat" style="display: none;">makro.id - Dewan Perwakilan Rakyat (DPR) menyetujui penambahan anggaran Badan Pengusahaan (BP) Batam Rp565 miliar. Dengan penambahan anggaran di tahun 2019 tersebut diharapkan dapat mendorong percepatan pembangunan Kota Batam.
                  
                  Anggota Komisi</p>
                                  </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">			  
                            <div class="card text-white">
                                <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/btn-targetkan-seribu-nasabah-valas-di-batam-1531227805.jpeg" alt="">
                                <div class="card-img-overlay d-flex linkfeat">
                                    <a href="" class="align-self-end">
                                        <span class="badge">Perbankan</span> 
                                        <h4 class="card-title">BTN Targetkan Seribu Nasabah Valas di Batam</h4>
                                        <p class="textfeat" style="display: none;">makro.id - Bank Tabungan Negara (Persero) resmi merilis tabungan valuta asing (valas) di Batam. Sebagai daerah yang berbatasan langsung dengan Singapura dan sebagai pintu gerbang wisatawan mancanegara (wisman), transaksi valas</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">			  <div class="card bg-dark text-white">
                            <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/sistem-oss-resmi-diluncurkan-1531225964.jpg" alt="">
                            <div class="card-img-overlay d-flex linkfeat">
                                <a href="" class="align-self-end">
                                    <span class="badge">Industri</span> 
                                    <h4 class="card-title">Sistem OSS Resmi Diluncurkan</h4>
                                    <p class="textfeat" style="display: none;">makro.id - Menteri Koordinator Bidang Perekonomian Darmin Nasution bersama dengan para menteri dan kepala lembaga terkait meresmikan penerapan Sistem Online Single Submission (OSS). 
                  
                  Layanan Perizinan Berusaha Terintegrasi Secara Elektronik (PBTSE), yang</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">			 
                        <div class="card text-white">
                            <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/grab-gandeng-samsung-telkomsel-dan-erafone-1531222875.JPG" alt="">
                            <div class="card-img-overlay d-flex linkfeat">
                                <a href="" class="align-self-end">
                                    <span class="badge">Nusantara</span> 
                                    <h4 class="card-title">Grab Gandeng Samsung, Telkomsel, dan Erafone</h4>
                                    <p class="textfeat" style="display: none;">:: Luncurkan Program Ponsel Cerdas untuk Pengemudi
                  
                  Batam - Grab menjalin kemitraan strategis dengan tiga perusahaan terkemuka di Indonesia yaitu Telkomsel, Samsung, dan Erafone terkait program kepemilikan ponsel cerdas khusus untuk</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">			  
                        <div class="card text-white">
                            <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/paket-kebijakan-ekonomi-mempermudah-izin-investasi-1530819316.jpg" alt="">
                            <div class="card-img-overlay d-flex linkfeat">
                                <a href="" class="align-self-end">
                                    <span class="badge">Finansial</span> 
                                    <h4 class="card-title">Paket Kebijakan Ekonomi Mempermudah Izin Investasi</h4>
                                    <p class="textfeat" style="display: none;">makro.id– Paket kebijakan ekonomi dinilai dapat memberikan kemudahan dalam pengurusan perizinan berinvestasi dan memberikan efek yang cukup signifikan kepada investor.
                  
                  Ketua Umum Himpunan Kawasan Industri (HKI) Sanny Iskandar menyatakan saat ini</p>
                                </a>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
            </div>
            <div class="col-6 py-0 px-1 d-none d-lg-block">
                <div class="row">
                    <div class="col-6 pb-2 mg-1	anImg1">
                            <div class="card text-white">
                                    <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/bi-atur-standarisasi-qr-code-1529952479.jpg" alt="">
                                    <div class="card-img-overlay d-flex">
                                      <a href="" class="align-self-end">
                                        <span class="badge">Finansial</span> 
                                        <h6 class="card-title">BI Atur Standarisasi QR Code</h6>
                                      </a>
                                    </div>
                                      </div>
                    </div>
                    <div class="col-6 pb-2 mg-2	anImg3">
                            <div class="card text-white">
                                    <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/ptsp-bp-batam-masuk-10-terbaik-di-indonesia-1531400445.jpeg" alt="">
                                    <div class="card-img-overlay d-flex">
                                      <a href="" class="align-self-end">
                                        <span class="badge">Industri</span> 
                                        <h6 class="card-title">PTSP BP Batam Masuk 10 Terbaik di Indonesia</h6>
                                      </a>
                                    </div>
                                      </div>
                    </div>
                    <div class="col-6 pb-2 mg-3	anImg2">
                            <div class="card text-white">
                                    <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/review-gsp-amerika-ingin-perdagangan-yang-adil-dan-saling-menguntungkan-1531307731.jpg" alt="">
                                    <div class="card-img-overlay d-flex">
                                      <a href="" class="align-self-end">
                                        <span class="badge">Ekspor</span> 
                                        <h6 class="card-title">Review GSP: Amerika Ingin Perdagangan Saling Menguntungkan</h6>
                                      </a>
                                    </div>
                                      </div>
                    </div>
                    <div class="col-6 pb-2 mg-4	anImg4">
                            <div class="card text-white">
                                    <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar-1531258457.jpeg" alt="">
                                    <div class="card-img-overlay d-flex">
                                      <a href="" class="align-self-end">
                                        <span class="badge">Pertumbuhan Ekonomi</span> 
                                        <h6 class="card-title">DPR Setujui Penambahan Anggaran BP Batam Rp565 Miliar</h6>
                                      </a>
                                    </div>
                            </div>
                    </div>
                                
                </div>
            </div>
        </div>
    

    <hr>
    <div class="pt-3">
        <h4 class="text-center title-homeEven">Event</h4>
    <div class="row " >
            
        <div class="col-3 p-sm-2" >            
                <a href="">
                    <div class="card" style="border-color: transparent">
                        <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar-1531258457.jpeg" alt="">
                        <div class="">
                        <a href="" class="align-self-end">
                            <H5>Judul</H5>
                            <span class="small"><i class="fa fa-map-marker "></i> asd</span>
                        </a>
                        </div>
                    </div>
                </a>
            
        </div>
        <div class="col-3 p-sm-2" >            
                <a href="">
                    <div class="card" style="border-color: transparent">
                        <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar-1531258457.jpeg" alt="">
                        <div class="">
                        <a href="" class="align-self-end">
                            <H5>Judul</H5>
                            <span class="small"><i class="fa fa-map-marker "></i> asd</span>
                        </a>
                        </div>
                    </div>
                </a>
            
        </div>
        <div class="col-3 p-sm-2" >            
                <a href="">
                    <div class="card" style="border-color: transparent">
                        <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar-1531258457.jpeg" alt="">
                        <div class="">
                        <a href="" class="align-self-end">
                            <H5>Judul</H5>
                            <span class="small"><i class="fa fa-map-marker "></i> asd</span>
                        </a>
                        </div>
                    </div>
                </a>
            
        </div>
        <div class="col-3 p-sm-2" >            
                <a href="">
                    <div class="card" style="border-color: transparent">
                        <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar-1531258457.jpeg" alt="">
                        <div class="">
                        <a href="" class="align-self-end">
                            <H5>Judul</H5>
                            <span class="small"><i class="fa fa-map-marker "></i> asd</span>
                        </a>
                        </div>
                    </div>
                </a>
            
        </div>
        <div class="col-3 p-sm-2" >            
                <a href="">
                    <div class="card" style="border-color: transparent">
                        <img class="card-img img-fluid" src="http://admin.makro.id/media/post_img_sm/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar-1531258457.jpeg" alt="">
                        <div class="">
                        <a href="" class="align-self-end">
                            <H5>Judul</H5>
                            <span class="small"><i class="fa fa-map-marker "></i> asd</span>
                        </a>
                        </div>
                    </div>
                </a>
            
        </div>
    </div>
</div>
</div>
</div> --}}


