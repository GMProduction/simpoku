@extends('admin.master')

@section('judul')
Member Baru
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/member">Master Member</a></li>
                        <li class="breadcrumb-item active">Form Tambah Member</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Member</h3>
                    </div>
                    <form method="post" action="/admin/member/add" enctype="multipart/form-data">
                    <div class="card-body">
                        {{ csrf_field() }}
                         <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Fullname</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        </div>
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" placeholder="Fullname" id="fullname" name="fullname" value="{{ old('fullname')}}">
                                        @error('fullname')
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
                                    <label>Simpoku Email Account</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email')}}" autocomplete="email">
                                        @error('email')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gmail Account</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-google" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="email" class="form-control @error('gmail') is-invalid @enderror" placeholder="GMail Account" id="gmail" name="gmail" value="{{ old('gmail')}}" autocomplete="gmail">
                                        @error('gmail')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                         </div>
                        <div class="row">
                            <div class="col-md-4">
                                    <label>Phone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        </div>
                                        <input id="phone" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" aria-label="phone" aria-describedby="basic-addon1" value="{{ old('phone')}}">
                                        @error('phone')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <label>JOB</label>
                                <div class="input-group mb-3 border" style="border-radius: 5rem;">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-user-md"></span>
                                        </div>
                                    </div>
                                    <select name="job" id="job" class="form-control bordertext">
                                        <option value="">- Pilih Job -</option>
                                        <option value="Dokter Spesialis">Dokter Spesialis</option>
                                        <option value="Dokter Umum">Dokter Umum</option>
                                        <option value="PPDS">PPDS</option>
                                        <option value="Perawat">Perawat</option>
                                        <option value="Apoteker">Apoteker</option>
                                        <option value="Farmasi">Farmasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Date Of Birth</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control bordertext" name="dateofbirth" id="dateofbirth">

                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" rows="3" id="address" name="address">{{ old('address')}}</textarea>
                                @error('address')
                                    <span class="msg invalid-feedback" role="alert">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Password Setidaknya terdiri dari 6 karakter, tidak terdiri dari spasi, spesial karakter ataupun emoji.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="password-confirm">Re-Type Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                        </div>
                                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                        @error('password')
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