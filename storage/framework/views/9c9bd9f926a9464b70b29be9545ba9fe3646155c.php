<?php $__env->startSection('judul'); ?>
Edit Banner
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboardadmin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboardadmin/banner">Master Banner</a></li>
                        <li class="breadcrumb-item active">Form Edit Banner</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form New Banner</h3>
                    </div>
                    <form method="post" action="/dashboardadmin/banner/updatedata" enctype="multipart/form-data">

                    <div class="card-body">
                        <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="oldid" value="<?php echo e($banner->id); ?>">
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jenis">Banner Type</label>
                                    <select id="jenis" class="form-control" name="jenis">
                                        <option value="event" <?php echo e($banner->jenis == 'event' ? 'selected' : ''); ?>>Event</option>
                                        <option value="iklan" <?php echo e($banner->jenis == 'iklan' ? 'selected' : ''); ?>>Iklan</option>
                                    </select>
                                </div>
                                    <div class="form-group">
                                            <label>Event ID</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                                                </div>
                                            <input type="text" class="form-control <?php if ($errors->has('idEvent')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('idEvent'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Event ID" id="idEvent" name="idEvent" value="<?php echo e(old('judul', $banner->idEvent)); ?>" readonly onclick="openModal()">
                                            </div>
                                    </div>
                                 <div class="form-group">
                                    <label>Banner Title</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                                        </div>
                                    <input type="text" class="form-control <?php if ($errors->has('judul')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('judul'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Banner Title" id="judul" name="judul" value="<?php echo e(old('judul', $banner->judul)); ?>">
                                        <?php if ($errors->has('judul')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('judul'); ?>
                                            <span class="msg invalid-feedback" role="alert">
                                                <?php echo e($message); ?>

                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label id="gambar">Banner Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                                            <label class="custom-file-label" for="gambar">Choose file</label>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label>Visibility</label>
                                    <select id="terlihat" class="form-control" name="terlihat">
                                        <option value="ya" <?php echo e($banner->terlihat == 'ya' ? 'selected' : ''); ?>>Visible</option>
                                        <option value="tidak" <?php echo e($banner->terlihat == 'tidak' ? 'selected' : ''); ?>>Invisible</option>
                                    </select>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button type="submit" id="btnSimpan" class="btn btn-primary"><i id="iconbtn" class="fa  fa-check-circle" aria-hidden="true"></i>&nbsp;Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEvent">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Daftar Event</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive-lg">
                        <table id="tb-event" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Event</th>
                                    <th>Nama Event</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/css/dataTables.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/dataTablesBootstrap4.js')); ?>"></script>
<script>

function openModal() {
    $('#modalEvent').modal('show');
}
    var tbevent;
    $(document).ready(function () {
        tbevent = $('#tb-event').DataTable({
        lengthMenu: [[15, 30, 50, -1], [15, 30, 50, "All"]],
        autowidth: true,
        serverSide: true,
        processing: false,
        ajax: '/dashboardadmin/banner/viewevent',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
            { data: 'id', name: 'id' },
            { data: 'judul', name: 'judul' },
            { data: 'deskripsi', name: 'deskripsi' },
            { data: 'action', name: 'action', searchable: false, orderable: false }
        ],
        columnDefs: [
            { targets: [0], width:'5%', orderable: false},
            { targets: [1], width:'20%'},
            { targets: [2], width:'25%'},
            { targets: [3], width:'10%'},
            { targets: [4], width:'15%', orderable: false},
            {
                targets: [0, 1, 3, 4],
                className: 'text-center'
            },
            {
                targets: [2],
                className: 'text-left'
            },
        ],
    });
    });

function pilih(id, e){
    e.preventDefault();
    $('#idEvent').val(id);
    $('#modalEvent').modal('hide');
}

</script>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\simpoku\resources\views/admin/master/banner/update.blade.php ENDPATH**/ ?>