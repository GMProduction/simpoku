@extends('admin.master')

@section('judul')
Data Member
@endsection

@section('content')
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Member</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                         <div class="float-sm-left">
                            <h3 class="card-title">Data Member</h3>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table id="tb-member" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th>Job</th>
                                        <th>Phone</th>
                                        <th>Date Of Birth</th>
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
<script src="{{ asset('js/handlebars.js') }}"></script>
<script id="details-template" type="text/x-handlebars-templatel">
@verbatim
<div class="row">
        <div id="detail" class="col-md-10 offset-2">
        <table class="table table-light">
            <tbody>
                <tr>
                    <td>Simpoku Account</td>
                    <td>:</td>
                    <td>{{ 'email' }}</td>
                </tr>
                <tr>
                    <td>Gmail Account</td>
                    <td>:</td>
                    <td>{{ 'gmail' }}</td>
                </tr>
                <tr>
                    <td>Institute</td>
                    <td>:</td>
                    <td>{{ 'institute' }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>{{ 'address' }}</td>
                </tr>
            </tbody>
        </table>
        </div>

</div>

@endverbatim
</script>
<script>
var table;
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var template = Handlebars.compile($("#details-template").html());
    table = $('#tb-member').DataTable({
        lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
        autowidth: true,
        serverSide: true,
        processing: false,
        ajax: '/admin/member/view',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
            { data: 'fullname', name: 'fullname' },
            { data: 'job', name: 'job' },
            { data: 'phone', name: 'phone' },
            { data: 'dateofbirth', name: 'dateofbirth' },
            { data: 'action', name: 'action', searchable: false, orderable: false }
        ],
        columnDefs: [
            { targets: [0], width:'5%', orderable: false},
            { targets: [1], width:'30%'},
            { targets: [2], width:'20%'},
            { targets: [3], width:'15%'},
            { targets: [4], width:'15%'},
            { targets: [5], width:'15%', orderable: false},
            {
                targets: [0, 1, 3, 4, 5],
                className: 'text-center'
            },
            {
                targets: [2],
                className: 'text-left'
            },
        ],
    });

    $('#tb-member tbody').on('click', 'td a.details-control', function (e) {

            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                row.child(
                    template(row.data())
                ).show();
                tr.addClass('shown');
            }
            e.preventDefault();
    });

});

function destroy(id) {
    $.ajax({
        type: 'POST',
        url: '/admin/member/destroy',
        data: {
            _method: 'DELETE',
            _token: $('input[name=_token]').val(),
            id: id
        },
        success: function (response) {
            console.log(response);
            if (response.sqlResponse) {
                swalSukses('Anda Berhasil Menghapus Data');
                table.draw();
            } else {
                swal('Ooops','Anda Gagal Menghapus Data\n'+response.data, 'error');
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