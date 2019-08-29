@extends('main.header')

@section('content')

<style>
    .transparan {
        background-color: transparent;
        border-right: 0;
        width: 40px;
    }

    .transparan1 {
        background-color: transparent;
        border-left: 0;
    }

    .bordertext {
        border-left: 0;
        outline: 0 none !important;
    }


    .form-control:focus {        
        outline-offset: 0px !important;
        outline: none !important;
    }
</style>

<link href="{{ asset('/css/login.css') }}" rel="stylesheet" />

<div class="container bawah">

    <div class="row justify-content-center">
        <div class="row col-lg-9 justify-content-center border">
            <div class="col-lg-6">
                <div class="register-box">
                    <div class="">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg">General Information</p>

                            <form action="../../index.html" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan" style="">
                                            <span class="fa fa-user"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control bordertext " placeholder="Full name">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan" style="">
                                            <span class="fa fa-envelope"></span>
                                        </div>
                                    </div>
                                    <input type="email" class="form-control bordertext" placeholder="Email"
                                        style="border-right: 0">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan1">
                                            <span class="">@gmail.com</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan" style="">
                                            <span class="fa fa-lock"></span>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control bordertext" id="password1"
                                        placeholder="Password">

                                    <div class="input-group-append">
                                        <div class="input-group-text border-0" style="background-color: transparent">
                                            <a style="cursor: pointer" onclick="showPass('1')"><span
                                                    class="fa fa-eye-slash" id="ico1"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-lock"></span>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control bordertext" id="password2"
                                        placeholder="Retype password">

                                    <div class="input-group-append">
                                        <div class="input-group-text border-0" style="background-color: transparent">
                                            <a style="cursor: pointer" onclick="showPass('2')"><span
                                                    class="fa fa-eye-slash" id="ico2"></span></a>
                                        </div>
                                    </div>
                                </div>

                            </form>


                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                </div>

            </div>

            <div class="col-lg-6">
                <div class="register-box">
                    <div class="">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg">Contact Detail</p>

                            <form action="../../index.html" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-user-md"></span>
                                        </div>
                                    </div>
                                    <select name="" id="" class="form-control bordertext">
                                        <option value="">asd</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control bordertext" placeholder="">

                                </div>
                                <div class="input-group mb-3">

                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                    </div>
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan" style="border-left: 0">
                                            <span class="">+62</span>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control bordertext " placeholder="Phone">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-home"></span>
                                        </div>
                                    </div>
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="form-control bordertext" placeholder="Address"></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                            <label for="agreeTerms">
                                                I agree to the <a href="#">terms</a>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Register</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                            <div class="social-auth-links text-center">
                                <p>- OR -</p>
                                
                                <a href="#" class="btn btn-block btn-danger">
                                    <i class="fa fa-google mr-2"></i>
                                    Sign up using Google
                                </a>
                            </div>
                            <div class="text-center mt-3">
                                <a href="login" class="text-center text-primary bold">I already have a membership Simpoku</a>
                            </div>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                </div>

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