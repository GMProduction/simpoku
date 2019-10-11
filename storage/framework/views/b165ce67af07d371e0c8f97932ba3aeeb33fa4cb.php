<?php $__env->startSection('judul'); ?>
Data Banner
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboardadmin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Banner</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                         <div class="float-sm-left">
                            <h3 class="card-title">Data Banner</h3>
                        </div>
                        <div class="float-sm-right">
                            <a class="btn btn-primary btn-sm box-tools" href="/dashboardadmin/banner/new">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;New Banner
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table id="tb-member" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Banner Image</th>
                                        <th>Banner Type</th>
                                        <th>Visibility</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
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
var table;
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    table = $('#tb-member').DataTable({
        lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
        autowidth: true,
        serverSide: true,
        processing: false,
        ajax: '/dashboardadmin/banner/view',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
            { data: 'judul', name: 'judul' },
            { data: 'gambar', name: 'gambar' },
            { data: 'jenis', name: 'jenis' },
            { data: 'terlihat', name: 'terlihat' },
            { data: 'action', name: 'action', searchable: false, orderable: false }
        ],
        columnDefs: [
            { targets: [0], width:'10%', orderable: false},
            { targets: [1], width:'20%'},
            { targets: [2], width:'20%'},
            { targets: [3], width:'15%'},
            { targets: [4], width:'15%'},
            { targets: [5], width:'20%', orderable: false},
            {
                targets: [0, 1, 2],
                className: 'text-center'
            }
        ],
    });

});

function destroy(id) {
    $.ajax({
        type: 'POST',
        url: '/dashboardadmin/banner/destroy',
        data: {
            _method: 'DELETE',
            _token: $('input[name=_token]').val(),
            id: id
        },
        success: function (response) {
            console.log(response);
            if (response.sqlResponse) {
                swalSukses('Success Deleteing Data');
                table.draw();
            } else {
                swal('Ooops','Failed To Delete Data\n'+response.data, 'error');
            }
        },
        error: function (response) {
            alert(response.responseText);
        }

    });
}

function swalSukses(text){
    swal({
        icon: 'success',
        title: 'Berhasil',
        text: text,
        buttons: false,
        timer: 2000,
    });
}

function hapus(id, e) {
    e.preventDefault();
    swal({
    dangerMode: true,
    icon: 'warning',
    title: 'Konfirmasi',
    text: 'Are You Sure to Delete this Data '+id+' ?',
    buttons: {
        cancel: 'Cancel',
            confirm: 'Delete'
    },
    }).then(function(isConfirm){
        if (isConfirm) {
            destroy(id);
        }
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\simpoku\resources\views/admin/master/banner/page.blade.php ENDPATH**/ ?>