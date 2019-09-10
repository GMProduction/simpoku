@extends('main.header')

@section('content')

<style>
   
</style>

<link href="{{ asset('/css/login.css') }}" rel="stylesheet" />


<div class="container bawah">

    <div class="row justify-content-center">
        <div class="row col-lg-9 justify-content-center border" style="border-radius: 1rem">
            <div class="col-lg-6">
                <div class="row col-12 justify-content-center">
                    <div class="col-6 mb-5 mt-5">
                        <img src="{{ asset('/assets/gambar/logo2.png') }}" alt="">
                    </div>
                </div>
                <p class="">Only Simpoku member can download pdf information</p>


            </div>
            <div class="col-lg-6">
                <div class="register-box">
                    <div class="">
                        <div class="card-body register-card-body">
                            <h5 class="login-box-msg">Contact Detail</h5>

                        <form action="/postregister/{{$data['provider']}}" method="post">
                            @csrf
                        <input type="hidden" name="fullname" value="{{$data['fullname']}}">
                        <input type="hidden" name="email" value="{{$data['email']}}">
                        <input type="hidden" name="password" value="{{$data['password']}}">
                                <div class="input-group mb-3 border" style="">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-user-md"></span>
                                        </div>
                                    </div>
                                    <select name="job" id="" class="form-control bordertext">
                                        <option value="">- Select Profession -</option>
                                        <option value="Dokter Spesialis">Dokter Spesialis</option>
                                        <option value="Dokter Umum">Dokter Umum</option>
                                        <option value="PPDS">PPDS</option>
                                        <option value="Dokter Muda">Dokter Muda</option>
                                        <option value="Perawat">Perawat</option>
                                        <option value="Apoteker">Apoteker</option>
                                        <option value="Farmasi">Farmasi</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan" style="">
                                            <span class="fa fa-building"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control bordertext " placeholder="Instantion Name">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control bordertext" placeholder="" name="dateofbirth" id="dateofbirth">

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
                                    <input type="number" class="form-control bordertext " placeholder="Phone"
                                        style="" name="phone">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparan">
                                            <span class="fa fa-home"></span>
                                        </div>
                                    </div>
                                    <textarea name="address" id="address" cols="30" rows="3" class="form-control bordertext"
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

                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <a 
                                            class="btn btn-danger btn-block" href="register" style=""> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                    </div>
                                    <div class="offset-3 col-lg-5 col-sm-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Register</button>
                                    </div>
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