<?php $__env->startSection('css'); ?>

<link href="<?php echo e(asset('/css/tab.css')); ?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(asset('/css/flexslider.css')); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo e(asset('/css/carousell.css')); ?>" type="text/css" media="screen" />
<meta name="description"
    content="Informasi seputar seminar kesehatan, yang di ikuti oleh Doktor Umum, 
    Doktor Spesialis, PPDS, Dokter Muda, Perawat Apoteker, Farmasi. Yang diselenggarakan di dalam kota maupun luar kota.">
<meta name="keywords" content="simposium, simpoku, seminar, seminar kesehatan, perawat, apoteker, dokter, ">
<meta name="author" content="">
<meta name="absrtact" content="">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>




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
    <div class="jumbotron jumbotron-fluid">
        <div class="container">

            <div class="flexslider" style="">
                <ul class="slides">

                    <?php $__currentLoopData = $carousel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="card bg-dark text-white border-0" style="">
                            <img class="card-img img-fluid" src="<?php echo e(asset ('/assets/foto/'.$data->gambar)); ?>" alt=""
                                style=" object-fit: cover; height: 400px;"  >
                              
                            <div class="card-img-overlay linkfeat d-flex ">
                                <a href="/dataevent?id=<?php echo e($data->id); ?>" class="align-self-end ">
                                    <h4 class="card-title"><?php echo e($data->judul); ?> </h4>
                                    <p class="textfeat" style="display: none;"><?php echo e($data->deskripsi); ?></p>
                                </a>
                            </div>
                        </div>


                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>

        </div>
    </div>


    <div class="container border" style="margin-top: -60px; background-color: white;  border-radius: 1rem !important">




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
                            <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $even): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/dataevent?id=<?php echo e($even->id); ?>" class="media pl-2 pt-3 pb-3 border-B listHover">
                                <div class="media">
                                    <div class="last-media-img ml-1 mt-1 mr-2"
                                        style="background-image: url(<?php echo e(asset ('/assets/foto/'.$even->gambar)); ?>)">
                                    </div>
                                    <div class="media-body pt-1">
                                        <div class="time-cat pb-1 pl-0">
                                            <span class="badge"><?php echo e($even->region); ?></span>
                                            <small class="text-time"
                                                style=""><?php echo e(date('d M', strtotime($even->tglMulai))); ?>

                                                s/d
                                                <?php echo e(date('d M Y', strtotime($even->tglAkhir))); ?></small>
                                        </div>
                                        <p class="mb-0 text-burgundy" id="title-lm"><?php echo e($even->judul); ?> </p>
                                        <p class="d-none d-lg-block mb-2 "><?php echo e($even->deskripsi); ?></p>
                                        <p class="d-none d-lg-block mb-0">Specialist : <?php echo e($even->spec); ?></p>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                        <img src="<?php echo e(asset ('/assets/gambar/qrcode.png')); ?>" class="img-fluid img-thumbnail border-0"
                            alt="asd">
                    </a>
                    <div class="text-center">
                        <a href="#!" class="btn btn-light w-200" style="border-radius: 5rem !important"><img
                                class="m-0 p-0" src="<?php echo e(asset('/assets/gambar/playstore.png')); ?>" alt="Twitter"
                                width="150"></a>
                    </div>
                    <div class="clearfix"></div>
                    <br>

                </div>

        </section>

    </div>







    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    <script defer src="<?php echo e(asset('/js/jquery.flexslider.js')); ?>"></script>

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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\projek\PROGRAM\website\simpoku\resources\views/main/home.blade.php ENDPATH**/ ?>