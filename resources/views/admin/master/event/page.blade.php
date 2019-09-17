@extends('admin.master')

@section('judul')
    Data Event
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Event</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <div class="float-sm-left">
                            <h3 class="card-title">Data Event</h3>
                        </div>
                        <div class="float-sm-right">
                            <a class="btn btn-primary btn-sm box-tools" href="/admin/event/new">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;New Event
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table id="tb-event" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul Event</th>
                                        <th>Tempat</th>
                                        <th>Mulai</th>
                                        <th>Akhir</th>
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
                    <td>Gambar Event</td>
                    <td>:</td>
                    <td><a href="/foto/{{ 'gambar' }}" target="_blank">Gambar Event</a></td>
                </tr>
                <tr>
                    <td>PDF</td>
                    <td>:</td>
                    <td><a href="/pdf/{{'filepdf'}}" target="_blank">Download</a></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td>{{ 'deskripsi' }}</td>
                </tr>
                <tr>
                    <td>Spesialis</td>
                    <td>:</td>
                    <td>{{ 'spec' }}</td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td>:</td>
                    <td>{{ 'region' }}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>:</td>
                    <td>{{ 'city' }}</td>
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
    table = $('#tb-event').DataTable({
        lengthMenu: [[15, 30, 50, -1], [15, 30, 50, "All"]],
        autowidth: true,
        serverSide: true,
        processing: false,
        ajax: '/admin/event/view',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
            { data: 'judul', name: 'judul' },
            { data: 'tempat', name: 'tempat' },
            { data: 'tglMulai', name: 'tglMulai' },
            { data: 'tglAkhir', name: 'tglAkhir' },
            { data: 'action', name: 'action', searchable: false, orderable: false }
        ],
        columnDefs: [
            { targets: [0], width:'5%', orderable: false},
            { targets: [1], width:'20%'},
            { targets: [2], width:'25%'},
            { targets: [3], width:'10%'},
            { targets: [4], width:'10%'},
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

    $('#tb-event tbody').on('click', 'td a.details-control', function (e) {

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
    url: '/admin/event/destroy',
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

