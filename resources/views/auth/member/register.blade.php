@extends('main.header')

@section('content')

<style>

</style>

<link href="{{ asset('/css/login.css') }}" rel="stylesheet" />

<div class="container bawah">

    <div class="row justify-content-center">
        <div class="row col-lg-9 justify-content-center  card-signin" style="border-radius: 1rem">
            <div class="col-lg-6">
                <div class="register-box">
                    <div class="">
                        <div class="card-body register-card-body">
                            <h4 class="login-box-msg">Create your Simpoku Account</h4>
                            <p class="login-box-msg">General Information</p>
                            <form action="/detailregister" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan" style="">
                                            <span class="fa fa-user"></span>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control bordertext @error('fullname') is-invalid @enderror"
                                        placeholder="Full name" name="fullname" id="fullname"
                                        value="{{old('fulname')}}">
                                    @error('fullname')
                                    <span class="msg invalid-feedback" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan" style="">
                                            <span class="fa fa-envelope"></span>
                                        </div>
                                    </div>
                                    <input type="email"
                                        class="form-control bordertext @error('email') is-invalid @enderror"
                                        placeholder="Email" name="email" id="email" value="{{old('email')}}" style="">
                                    @error('email')
                                    <span class="msg invalid-feedback" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan" style="">
                                            <span class="fa fa-lock"></span>
                                        </div>
                                    </div>
                                    <input type="password"
                                        class="form-control bordertext @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password">

                                    <div class="input-group-append">
                                        <div class="input-group-text border-0" style="background-color: transparent">
                                            <a style="cursor: pointer" onclick="showPass('1')"><span
                                                    class="fa fa-eye-slash" id="ico1"></span></a>
                                        </div>
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Your password at least 6 characters, must not contain spaces, special
                                        characters, or emoji.
                                    </small>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-lock"></span>
                                        </div>
                                    </div>
                                    <input type="password"
                                        class="form-control bordertext @error('password') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="Retype password">

                                    <div class="input-group-append">
                                        <div class="input-group-text border-0" style="background-color: transparent">
                                            <a style="cursor: pointer" onclick="showPass('2')"><span
                                                    class="fa fa-eye-slash" id="ico2"></span></a>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="msg invalid-feedback" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="row">

                                    <!-- /.col -->
                                    <div class="col-8">
                                        <a href="/gauth" class="btn btn-google btn-block btn-flat"><span class="fa fa-google" ></span> Sign in with Google</a>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Next</button>
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </form>
                            <div class="text-center mt-3">
                                <a href="login" class="text-center text-primary bold">I already have a membership
                                    Simpoku</a>
                            </div>

                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                </div>

            </div>

            <div class="col-lg-6">
                <div class="row col-12 justify-content-center">
                    <div class="col-6 mb-5 mt-5">
                        <img src="{{ asset('/assets/gambar/logo2.png') }}" alt="">
                    </div>
                </div>
                <p align="center">Only Simpoku members can download announcement</p>


            </div>
        </div>
    </div>
</div>

<script>
    function showPass(a){
        
    if($('#ico'+a).hasClass("fa-eye")){        
        $('#ico'+a).removeClass("fa-eye");
        $('#ico'+a).addClass("fa-eye-slash");
        document.getElementById('password'+a).type = 'password';
    }else{
        $('#ico'+a).removeClass("fa-eye-slash");
        $('#ico'+a).addClass("fa-eye");
        document.getElementById('password'+a).type = 'text';
    }
}
</script>

@endsection