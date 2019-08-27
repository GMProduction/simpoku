@extends('admin.master')

@section('judul')
Data Produk
@endsection

@section('content')


<!-- Button to Open the Modal -->
<div>
    <button id="tambahModal" style="margin-bottom: 10px; margin-top: 20px" type="button" class="btn btn-primary box-tools pull-right" data-toggle="modal" data-target="#modaltambahProduk">
        Tambah Data Produk
    </button>

</div>

<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<!--Srart Modal -->
<div class="modal fade" id="modaltambahProduk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formSimpanProduk" class="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ID Produk </label>
                                <input type="text" class="form-control" placeholder="ID Produk" id="txtIdProduk" name="txtIdProduk">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" placeholder="Nama Produk" id="txtNamaProduk" name="txtNamaProduk">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" id="cBoxKategori">
                                    <option value="baju">Baju</option>
                                    <option value="celana">Celana</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="number" class="form-control" placeholder="Harga Produk" id="txtHargaProduk" name="txtHargaProduk">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label id="labelKetSnack">Deskripsi Produk </label>
                        <textarea class="form-control" rows="3" id="txtDeskripsiProduk" name="txtDeskripsiProduk"></textarea>
                    </div>

                    <div class="form-group">
                        <label id="labelGambarSnack">Gambar Produk </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileGambarProduk" name="fileGambarProduk">
                            <label class="custom-file-label" for="customFile">Pilih file</label>
                        </div>
                    </div>


                    <div class="text-right">
                        <button id="btnSimpan" class="btn btn-primary"></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- EndModal -->

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css')}}">
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('/js/tampilan/changemodal.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>

@endsection
