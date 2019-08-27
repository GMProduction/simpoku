@extends('admin.master')

@section('judul')
Edit user
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
                <form method="post" action="/admin/event/update" enctype="multipart/form-data">
                <div class="card-body">
                        {{ csrf_field() }}
                    <input type="hidden" name="oldid" value="{{$event->id}}">
                    <div class="form-group">
                        <label>Judul Event</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul Event" id="judul" name="judul" value="{{ old('judul', $event->judul)}}" autocomplete="judul">
                            @error('judul')
                                <span class="msg invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                            <label id="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="3" id="deskripsi" name="deskripsi">{{ old('deskripsi', $event->deskripsi)}}</textarea>
                            @error('deskripsi')
                                <span class="msg invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                    </div>
                    <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Event</label>
                                <input type="text" class="form-control @error('tempat') is-invalid @enderror" placeholder="Tempat Event" id="tempat" name="tempat" value="{{ old('tempat', $event->tempat)}}" autocomplete="tempat">
                                    @error('tempat')
                                        <span class="msg invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Region Event</label>
                                <input type="text" class="form-control @error('region') is-invalid @enderror" placeholder="region Event" id="region" name="region" value="{{ old('region', $event->region)}}" >
                                    @error('region')
                                        <span class="msg invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tglMulai">Tanggal Mulai</label>
                                    <input class="form-control" type="date" name="tglMulai" id="tglMulai" value="{{ old('tglMulai', $event->tglMulai)}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tglAkhir">Tanggal Akhir</label>
                                    <input class="form-control" type="date" name="tglAkhir" id="tglAkhir" value="{{ old('tglAkhir', $event->tglAkhir)}}" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                    <label>Kontak</label>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    </div>
                                    <input id="contact" name="contact" type="number" class="form-control @error('contact') is-invalid @enderror" placeholder="Contact" aria-label="contact" aria-describedby="basic-addon1" value="{{ old('contact', $event->contact)}}">
                                    @error('contact')
                                        <span class="msg invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Spesialis Event</label>
                        <input type="text" class="form-control @error('spec') is-invalid @enderror" placeholder="Spesialis Event" id="spec" name="spec" value="{{ old('spec', $event->spec)}}" autocomplete="spec">
                            @error('spec')
                                <span class="msg invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
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
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="submit" id="btnSimpan" class="btn btn-primary"><i id="iconbtn" class="fa  fa-check-circle" aria-hidden="true"></i>&nbsp;Simpan</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    
@endsection

@section('script')
    
@endsection
