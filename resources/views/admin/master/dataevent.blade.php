@extends('admin.master')

@section('content')
    <div>
        <a id="btnTambah" type="button" class="btn btn-primary btn-sm box-tools pull-left" href="/event/tambah">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </a>
    </div>

    <div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Satuan</th>
                <th>Diskon</th>
                <th>Harga</th>
                <th>Promo</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection