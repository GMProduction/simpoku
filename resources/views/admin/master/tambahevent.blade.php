@extends('admin.master')

@section('content')
    <h4>Data Event</h4>
    <hr>
    <div class="container">
        
        <div class="form-group">
            <label for="my-input">Judul Event</label>
            <input id="my-input" class="form-control" type="text" name="judul" id="judul">
        </div>
        <div class="form-group">
            <label for="my-input">Deskripsi Event</label>
            <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <div class="form-group">
            <label for="my-input">Tempat Event</label>
            <input id="my-input" class="form-control" type="text" name="tempat" id="tempat">
        </div>
        <div class="form-group">
            <label for="my-input">Region</label>
            <input id="my-input" class="form-control" type="text" name="region" id="region">
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="my-input">Tanggal Mulai</label>
                <input id="tglmulai" type="date" value="" class="form-control" name="tglmulai" required autocomplete="tglmulai" autofocus>
            </div>
            <div class="col-md-6">
                <label for="my-input">Tanggal Akhir</label>
                <input id="tglakhir" type="date" value="" class="form-control" name="tglakhir" required autocomplete="tglakhir" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="my-input">Contact</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                </div>
                    <input id="phone" name="phone" type="number" class="form-control" placeholder="Phone" aria-label="phone" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="form-group">
            <label for="my-input">Spec</label>
            <input id="my-input" class="form-control" type="text" name="spec" id="spec">
        </div>
        <div class="form-group">
            <label id="labelGambarSnack">Gambar Event </label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                <label class="custom-file-label" for="customFile">Pilih file</label>
            </div>
        </div>
        <div class="form-group">
            <label id="labelGambarSnack">File Pdf </label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="pdf" name="pdf">
                <label class="custom-file-label" for="customFile">Pilih file</label>
            </div>
        </div>
        <div class="text-right">
                        <button id="btnSimpan" class="btn btn-primary"><i id="iconbtn" class="fa fa-floppy-o" aria-hidden="true"></i>Simpan</button>
        </div>
    </div>
@endsection