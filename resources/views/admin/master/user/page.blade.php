@extends('admin.master')

@section('judul')
    Data User
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboardadmin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item active">Data user</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <div class="float-sm-left">
                            <h3 class="card-title">Data user</h3>
                        </div>
                        <div class="float-sm-right">
                            <a class="btn btn-primary btn-sm box-tools" href="/dashboardadmin/user/new">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;User Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table id="tb-user" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>No. Telp</th>
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
@endsection

@section('css')
   <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('script')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>
<script>
var table;
$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    table = $('#tb-user').DataTable({
        lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
        autowidth: true,
        serverSide: true,
        processing: false,
        ajax: '/dashboardadmin/user/view',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
            { data: 'username', name: 'username' },
            { data: 'email', name: 'email' },
            { data: 'no_telp', name: 'no_telp' },
            { data: 'action', name: 'action', searchable: false, orderable: false }
        ],
        columnDefs: [
            { targets: [0], width:'5%', orderable: false},
            { targets: [1], width:'10%'},
            { targets: [2], width:'35%'},
            { targets: [3], width:'10%'},
            { targets: [4], width:'10%', orderable: false},
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

function destroy(id) {
$.ajax({
    type: 'POST',
    url: '/dashboardadmin/user/destroy',
    data: {
        _method: 'DELETE',
        _token: $('input[name=_token]').val(),
        id: id
    },
    success: function (response) {
        console.log(response);
        if (response.sqlResponse) {
            callSwal();
            table.draw();
        } else {
            swal('Ooops','Anda Gagal Menghapus Data\n'+response.data, 'success');
        }
    },
    error: function (response) {
        alert(response.responseText);
    }

});
}

function callSwal(){
    swal({
        icon: 'success',
        title: 'Berhasil',
        text: 'Anda Berhasil Menghapus Data',
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
    text: 'Apa Anda Yakin ingin Menghapus Data '+id+' ?',
    buttons: {
        cancel: 'Batal',
            confirm: 'Hapus'
    },
    }).then(function(isConfirm){
        if (isConfirm) {
            destroy(id);
        }
    });
}

</script>
@endsection

