@extends('admin.master')

@section('judul')
New Specialis
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/specialist">Master Specialis</a></li>
                        <li class="breadcrumb-item active">Form New Specialis</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form New Specialis</h3>
                    </div>
                    <form method="post" action="/admin/specialist/add">
                    <div class="card-body">
                        {{ csrf_field() }}
                         <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Specialist</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                                        </div>
                                    <input type="text" class="form-control @error('spec') is-invalid @enderror" placeholder="Specialist" id="spec" name="spec" value="{{ old('spec')}}">
                                        @error('spec')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
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
            $('#gambar').on('change',function(){
                var fileName = $(this).val().split("\\").pop();
                $(this).next('.custom-file-label').html(fileName);
            });
    </script>
@endsection