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
<link href="{{ asset('/css/flipkart.css') }}" rel="stylesheet" />

<div class="container bawah">

    <div class="row justify-content-center">
        <div class="row col-lg-6 justify-content-center border" style="border-radius: 1rem">

            <div class="col-lg-10">
                <div class="register-box">
                    <div class="">
                        <div class="card-body register-card-body">
                            <h5 class="login-box-msg">Contact Detail</h5>

                            <form action="../../index.html" method="post">
                                <div class="input-group mb-3 border" style="border-radius: 5rem;">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-user-md"></span>
                                        </div>
                                    </div>
                                    <select name="" id="" class="form-control bordertext">
                                        <option value="">- Pilih Job -</option>
                                        <option value="">Dokter Spesialis</option>
                                        <option value="">Dokter Umum</option>
                                        <option value="">PPDS</option>
                                        <option value="">Perawat</option>
                                        <option value="">Apoteker</option>
                                        <option value="">Farmasi</option>
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
                                    <input type="password" class="form-control bordertext " placeholder="Phone" style="">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-home"></span>
                                        </div>
                                    </div>
                                    <textarea name="" id="" cols="30" rows="3" class="form-control bordertext"
                                        placeholder="Address"></textarea>

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