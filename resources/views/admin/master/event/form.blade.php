@extends('admin.master')

@section('judul')
Event Baru
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/event">Master Event</a></li>
                        <li class="breadcrumb-item active">Form Event User</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Event</h3>
                    </div>
                    <form method="post" action="/admin/event/add" enctype="multipart/form-data">
                    <div class="card-body">
                         {{ csrf_field() }}
                        <div class="form-group">
                            <label>Judul Event</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul Event" id="judul" name="judul" value="{{ old('judul')}}" autocomplete="judul">
                                @error('judul')
                                    <span class="msg invalid-feedback" role="alert">
                                        {{$message}}
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                                <label id="deskripsi">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="3" id="deskripsi" name="deskripsi" value="{{ old('deskripsi')}}"></textarea>
                                @error('deskripsi')
                                    <span class="msg invalid-feedback" role="alert">
                                        {{$message}}
                                    </span>
                                @enderror
                        </div>
                        <div class="row">
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tempat Event</label>
                                    <input type="text" class="form-control @error('tempat') is-invalid @enderror" placeholder="Tempat Event" id="tempat" name="tempat" value="{{ old('tempat')}}" autocomplete="tempat">
                                        @error('tempat')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                </div>
                             </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                     <label>Contact Person</label>
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        </div>
                                        <input id="namaContact" name="namaContact" type="text" class="form-control @error('namaContact') is-invalid @enderror" placeholder="Contact Person" aria-label="namaContact" aria-describedby="basic-addon1" value="{{ old('namaContact')}}">
                                        @error('namaContact')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                     <label>Contact Phone</label>
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        </div>
                                        <input id="noContact" name="noContact" type="number" class="form-control @error('noContact') is-invalid @enderror" placeholder="Contact Phone" aria-label="noContact" aria-describedby="basic-addon1" value="{{ old('noContact')}}">
                                        @error('noContact')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                             
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Region</label>
                                    <select id="region" class="form-control" name="region">
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="DIY">DIY Jogjakarta</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                    </select>
                                </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                    <label>City</label>
                                    <select id="city" class="form-control" name="city">
                                        <option value="Surakarta">Surakarta</option>
                                        <option value="Sukoharjo">Sukoharjo</option>
                                        <option value="Klaten">Klaten</option>
                                        <option value="karanganyar">karanganyar</option>
                                        <option value="Surabaya">Surabaya</option>
                                        <option value="Madiun">Madiun</option>
                                        <option value="Malang">Malang</option>
                                        <option value="Banten">Banten</option>
                                        <option value="Cirebon">Cirebon</option>
                                        <option value="Bandung">Bandung</option>
                                    </select>
                                </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tglMulai">Tanggal Mulai</label>
                                        <input class="form-control" type="date" name="tglMulai" id="tglMulai" required>
                                    </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                        <label for="tglAkhir">Tanggal Akhir</label>
                                        <input class="form-control" type="date" name="tglAkhir" id="tglAkhir" required>
                                </div>
                             </div>
                         </div>
                         <div class="form-group">
                            <label>Specialis</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                        style="width: 100%;" name="spec[]" id="spec">
                                        @foreach ($spec as $item)
                                            <option value={{$item->gelar}}>{{$item->spec}}</option>
                                        @endforeach
                                </select>
                        </div>
                         <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="gambar">Gambar Event</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                                            <label class="custom-file-label" for="gambar">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="filepdf">File Pdf</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filepdf" name="filepdf" accept=".pdf">
                                            <label class="custom-file-label" for="filepdf">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                         </div>
                         <div class="form-group">
                                
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
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2/select2-bootstrap4.min.css')}}">
@endsection
@section('script')
<script src="{{ asset('/adminlte/plugins/select2/select2.min.js') }}"></script>
<script>

$(document).ready(function () {
    $('.select2').select2({
        theme: 'bootstrap4'
    });

    $('#btnCoba').on('click', function () {
        alert($('.select2').val());
    });
});
</script>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection