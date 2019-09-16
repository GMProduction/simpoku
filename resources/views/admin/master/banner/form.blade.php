@extends('admin.master')

@section('judul')
New Banner
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/banner">Master Banner</a></li>
                        <li class="breadcrumb-item active">Form New Banner</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form New Banner</h3>
                    </div>
                    <form method="post" action="/admin/banner/add" enctype="multipart/form-data">
                    <div class="card-body">
                        {{ csrf_field() }}
                         <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Banner Title</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                                        </div>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Banner Title" id="judul" name="judul" value="{{ old('judul')}}">
                                        @error('judul')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
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
                                        <option value="ya">Visible</option>
                                        <option value="tidak">Invisible</option>
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
@endsection

@section('css')
    
@endsection

@section('script')
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection