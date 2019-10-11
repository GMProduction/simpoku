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

<?php $__currentLoopData = $carousel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<div class="container bawah" style="">
    <div class="">
        <div class="">

            <div class=" list-event box-putih" style="">
                
                <div class=" pt-4 pr-3 pl-3 pb-3 justify-content-center ">
                        <h3 class="judul "><?php echo e($carousel->judul); ?></h3>
                    <img class="img-event" src="<?php echo e(asset ('/assets/banner/'.$carousel->gambar)); ?>" alt="" width="400">
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
<?php echo $__env->make('main.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Program\web\New folder\simpoku\resources\views/main/dataiklan.blade.php ENDPATH**/ ?>