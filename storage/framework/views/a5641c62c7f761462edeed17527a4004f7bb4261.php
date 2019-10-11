<?php $__env->startSection('content'); ?>

<style>
    .detailInf {
        margin-top: 1rem;
        padding-bottom: 5px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    }

    tr {
        height: 55px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);

    }

    td {
        vertical-align: middle !important;

        font-weight: bolder;
        opacity: 0.8;
    }

    .judul {
        font-weight: bolder;
    }
</style>

<?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $even): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<div class="container bawah" style="">
    <div class="">
        <div class="">

            <div class="row list-event box-putih" style="">
                <div class="col-lg-6 pt-4 pr-3 pl-3 pb-3 justify-content-center ">
                    <img class="img-event" src="<?php echo e(asset ('/assets/foto/'.$even->gambar)); ?>" alt="" width="400">
                </div>
                <div class="col-lg-6 p-3">
                    <h2 class="judul "><?php echo e($even->judul); ?></h2>

                    <div class="row col justify-content-center mb-2">
                        <div style="border: 1px solid red; width: 30%;"></div>
                    </div>

                    <table class="table table-sm table-borderless">
                        <tr>
                            <td class="" style=""><i class="fa fa-clipboard text-burgundy" aria-hidden="true"></i></td>
                            <td class=""><?php echo e($even->deskripsi); ?></td>
                        </tr>
                        <tr>
                            <td class="" style="width: 30px"><span class="fa fa-calendar text-burgundy "></span></td>
                            <td class=""><?php echo e(date('D, d M', strtotime($even->tglMulai))); ?> -
                                <?php echo e(date('D, d M Y', strtotime($even->tglAkhir))); ?></td>

                        </tr>
                        <tr>
                            <td class="" style=""><i class="fa fa-location-arrow text-burgundy" aria-hidden="true"></i>
                            </td>
                            <td class=""><?php echo e($even->tempat); ?>, <?php echo e($even->city); ?>, <?php echo e($even->region); ?></td>
                        </tr>

                        <tr>
                            <td><i class="fa fa-phone text-burgundy" aria-hidden="true"></i></td>
                            <td class=""> <?php echo e($even->namaContact); ?> : <?php echo e($even->noContact); ?> </td>
                        </tr>
                        <tr style="">
                            <td class=""><i class="fa fa-user-md text-burgundy" aria-hidden="true"></i></td>
                            <td class=""><?php echo e($even->spec); ?></td>
                        </tr>
                        <tr style="border-bottom: 0">
                            <td class=""><i class="fa fa-download text-burgundy" aria-hidden="true"></i></td>
                            <td class="">

                                <?php if($even->filepdf == ''): ?>
                                <a class=" rounded " href="#!"><i class="fa fa-file-pdf-o" aria-hidden="true"
                                        style="color: red"></i> Unavailabe</a>
                                <?php else: ?>
                                <?php if(auth()->guard('member')->check()): ?>
                                <a class="rounded" href="dataevent/download?pdf=<?php echo e($even->filepdf); ?>"><i
                                        class="fa fa-file-pdf-o" aria-hidden="true" style="color: red"></i>
                                    <?php echo e($even->filepdf); ?></a>
                                <?php else: ?>
                                <a class="rounded" href="#!" onclick="alertLogin()"><i class="fa fa-file-pdf-o" aria-hidden="true"
                                        style="color: red"></i>
                                    <?php echo e($even->filepdf); ?></a>
                                <?php endif; ?>

                                <?php endif; ?>
                            </td>
                        </tr>


                    </table>




                </div>
            </div>

        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    function bokmark(){
    
        $('#iconBookmark').removeClass('fa-bookmark-o');
        $('#iconBookmark').addClass('fa-bookmark');
    
}

function alertLogin(){
    Swal.fire({
  title: 'Warning',
  html: 'Please Login / Register for download announcement !',
  type: 'warning',
  showCancelButton: true,
  showCloseButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Register',
  confirmButtonText: 'Login'
}).then((result) => {
  if (result.value) {
    window.location = 'login'
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ){
    window.location = 'register'
  }
});
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Program\web\New folder\simpoku\resources\views/main/dataevent.blade.php ENDPATH**/ ?>