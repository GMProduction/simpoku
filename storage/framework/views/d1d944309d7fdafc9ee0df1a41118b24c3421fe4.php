<?php $__env->startSection('content'); ?>
<style>
    .txtEdit1 {
        background-color: white !important
    }

    .divIcon {
        background-color: #E9ECEF
    }
</style>

<script>

</script>
<div class="container bawah">
    <div class="row justify-content-center">
        <div class="row col-lg-7 justify-content-center border pt-3" style="border-radius: 1rem">

            <div class="col-lg-5 pt-2 " style="">
                <div class="" style=" height: 250px;">
                    <div class="row col align-self-center justify-content-center pt-4">
                        <div style="min-height: 200px">
                            <img id="imgAccount" src="" style="" class="rounded-circle" alt="Account" width="200">

                        </div>

                    </div>
                    <form action="updateFoto" id="formFoto" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e(auth()->guard('member')->user()->id); ?>">
                        <div class="pt-2">
                            <input type="file" name="foto" id="poto" class="form-control btn-sm border-0"
                                style="outline: none" onchange="showImgAcount(this)">
                        </div>
                        <div class="pt-2">
                            <button type="submit" id="btnSaveFoto" hidden class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7">
                <form class="" id="formMember" role="form" action="" method="">
                    <?php echo csrf_field(); ?>
                    <div class="row pt-2">
                        <div class="col-lg-12 mb-3 justify-content-end">
                            <a onclick="editProfile()" style="cursor: pointer; color: white" id="edit"
                                class="btn btn-primary btn-sm"><span class="fa fa-pencil" id="iconEdit"></span> <span
                                    id="lbEdit">edit</span> </a>
                            <a onclick="editClear()" hidden style="cursor: pointer; color: white" id="btClose"
                                class="btn btn-primary btn-sm"><span class="fa fa-close" id="iconClose"></span> <span
                                    id="lbClose">Cancel</span> </a>

                        </div>
                        <div class="col-lg-12 mb-3">
                            <input type="hidden" name="id" value="<?php echo e(auth()->guard('member')->user()->id); ?>">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan divIcon" style="">
                                        <span class="fa fa-user"></span>
                                    </div>
                                </div>
                                <input type="text" name="fullname" class="form-control bordertext txtEdit " disabled
                                    placeholder="Full name" value=" <?php echo e(auth()->guard('member')->user()->fullname); ?>">

                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan divIcon" style="">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                </div>
                                <input type="text" name="email" class="form-control bordertext txtEdit " disabled
                                    placeholder="" value=" <?php echo e(auth()->guard('member')->user()->email); ?>">

                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan divIcon" style="">
                                        <span class="fa fa-user-md"></span>
                                    </div>
                                </div>

                                <select name="job" id="job" class="form-control bordertext txtEdit" disabled>
                                    <option value="">- Select Profession -</option>
                                    <option value="Dokter Spesialis">Dokter Spesialis</option>
                                    <option value="Dokter Umum">Dokter Umum</option>
                                    <option value="PPDS">PPDS</option>
                                    <option value="Dokter Muda">Dokter Muda</option>
                                    <option value="Perawat">Perawat</option>
                                    <option value="Apoteker">Apoteker</option>
                                    <option value="Farmasi">Farmasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan divIcon" style="">
                                        <span class="fa fa-building"></span>
                                    </div>
                                </div>
                                <input type="text" name="instansi" class="form-control bordertext txtEdit " disabled
                                    placeholder="instansi" value=" <?php echo e(auth()->guard('member')->user()->institute); ?>">

                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan divIcon" style="">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                </div>
                                <input type="text" name="phone" class="form-control bordertext txtEdit " disabled
                                    placeholder="phone" value=" <?php echo e(auth()->guard('member')->user()->phone); ?>">

                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan divIcon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                                <input type="date" name="tgl" class="form-control bordertext txtEdit" disabled style=""
                                    placeholder=""
                                    value="<?php echo e(date('Y-m-d', strtotime(auth()->guard('member')->user()->dateofbirth))); ?>">

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan divIcon">
                                        <span class="fa fa-home"></span>
                                    </div>
                                </div>
                                <textarea name="alamat" id="" cols="30" rows="3" disabled
                                    class="form-control bordertext txtEdit"
                                    placeholder="Address"> <?php echo e(auth()->guard('member')->user()->address); ?></textarea>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>



</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script>
    $(document).ready(function () {
        var a =  '<?php echo e(Auth::guard('member')->user()->job); ?>';
        
        if ('<?php echo e(Auth::guard('member')->user()->avatar); ?>' == null || '<?php echo e(Auth::guard('member')->user()->avatar); ?>'
                        == 'default') {
            $('#imgAccount').attr('src','<?php echo e(asset ("/assets/account/default.png")); ?>')
        } else {
            var fo = '<?php echo e(Auth::guard('member')->user()->avatar); ?>';
            $('#imgAccount').attr('src','<?php echo e(asset ("/assets/account")); ?>/<?php echo e(Auth::guard('member')->user()->avatar); ?>');
            
        }
            $('#job').val(a);
        });

        
</script>
<script src="<?php echo e(asset('/js/tampilan/member.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Program\web\New folder\simpoku\resources\views/main/dashboard.blade.php ENDPATH**/ ?>