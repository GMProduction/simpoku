@extends('admin.master')

@section('judul')
User Baru
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboardadmin"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboardadmin/user">Master User</a></li>
                        <li class="breadcrumb-item active">Form Tambah User</li>
                    </ol>
                </div>

                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah User</h3>
                    </div>
                    <form method="post" action="/dashboardadmin/user/add">
                    <div class="card-body">
                         {{ csrf_field() }}
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" id="username" name="username" value="{{ old('username')}}" autocomplete="username">
                                        @error('username')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email')}}" autocomplete="email">
                                        @error('email')
                                            <span class="msg invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label>No. Hp</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        </div>
                                        <input id="no_telp" name="no_telp" type="number" class="form-control @error('no_telp') is-invalid @enderror" placeholder="No. Hp" aria-label="no_telp" aria-describedby="basic-addon1" value="{{ old('no_telp')}}" autocomplete="no_telp">
                                        @error('no_telp')
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
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" autocomplete="password">
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Your password at least 6 characters, must not contain spaces, special characters, or emoji.
                                        </small>
                                    </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="password-confirm">{{ __('Konfirmasi Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation">
                                    @error('password')
                                        <span class="msg invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                    @enderror
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

@section('script')
    
@endsection