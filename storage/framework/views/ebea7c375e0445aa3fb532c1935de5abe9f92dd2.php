<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/css/carousell.css')); ?>" type="text/css" media="screen" />



<div class="container bawah ">




    <div class="row pb-3 border box-putih" style="border-radius: 1rem !important;">
        <div class=" col-lg-6">
            <label for="comboSpec" class=" col-form-label">Specialist : </label>
            <select name="comboSpec" id="comboSpec" class="form-control form-control-sm" onchange="">
                <option value="">All</option>
                <?php $__currentLoopData = $spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->spec); ?>"><?php echo e($item->spec); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-lg-2">
            <label for="comboYear" class=" col-form-label">Year : </label>
            <select name="comboYear" id="comboYear" class="form-control form-control-sm" onchange="">
                <option value="">All</option>
                <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

        </div>
        <div class="col-lg-2">
            <label for="comboMonth" class=" col-form-label">Month : </label>
            <select name="comboMonth" id="comboMonth" class="form-control  form-control-sm" onchange="">
                <option value="">All</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="combo" class=" col-form-label">Regional : </label>
            <select name="" id="comboRegion" class="form-control  form-control-sm" onchange="">
                <option value="">All</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="combo" class=" col-form-label">City : </label>
            <select name="" id="comboCity" class="form-control form-control-sm" onchange="">
                <option value="">All</option>
            </select>
        </div>

        <div class="col-lg-1 align-self-end col-form-label">
            <button class="btn floaat-bottom btn-primary btn-sm" onclick="cari()"><i class="fa fa-search"
                    aria-hidden="true"></i> Search</button>
        </div>
        <div class="col-lg-1 align-self-end col-form-label">
            <button class="btn floaat-bottom btn-danger btn-sm" onclick="reset()"><i class="fa fa-times"
                    aria-hidden="true"></i> Reset</button>
        </div>






    </div>
    <hr>

    <div class="box-putih rounded border" id="dataEvent" style="">
        

    </div>

    <br>





</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('/js/tampilan/listevent1.js')); ?>"></script>


<script>
    $(document).ready(function(){
    $('#dataEvent').load('/dataLoad');
   
})

function cari(){
    $('#dataEvent').load('/dataLoad');
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Program\web\New folder\simpoku\resources\views/main/listevent1.blade.php ENDPATH**/ ?>