<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <title>Registration Form</title>
    <style>
        body{
            background-color: #8D021F;
        }
        .box-register{
            border-radius: 8px;
            margin-top: 70px;
            
        }
        .box-left{
            padding: 20px 30px;
            background-color: white;
            color: #8D021F;
            border-radius: 5px 0px 0px 5px;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
            
        }
        .box-right{
            padding: 20px 30px;
            background-color: white;
            color: #8D021F;
            border-radius: 0px 5px 5px 0px;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        .msg{
            color:#8D021F;
            font-size: 10px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 box-register">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 box-left">
                        <div class="box-title">General Information</div>
                        <form method="post" action="/postRegister">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input id="username" class="form-control @error('username') is-invalid @enderror" type="text" placeholder="username" name="username" value="{{ old('username')}}">
                            @error('username')
                                <span class="msg invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="firstname" class="form-control @error('firstname') is-invalid @enderror" type="text" placeholder="First Name" name="firstname" value="{{ old('firstname')}}">
                                    @error('firstname')
                                        <span class="msg invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="lastname" class="form-control @error('firstname') is-invalid @enderror" type="text" placeholder="Last name" name="lastname" value="{{ old('lastname')}}">
                                    @error('lastname')
                                        <span class="msg invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input id="email" class="form-control @error('firstname') is-invalid @enderror" type="email" placeholder="Email Address" name="email" value="{{ old('email')}}">
                            @error('email')
                                <span class="msg invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Password" name="password">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                            Your password at least 6 characters, must not contain spaces, special characters, or emoji.
                            </small>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password_confirmation" class="form-control @error('password') is-invalid @enderror" aria-describedby="passwordHelpBlock" placeholder="Password Confrimation" name="password_confirmation">
                            @error('password')
                                <span class="msg invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-5 box-right">
                        <div class="box-title">Contact Details</div>
                        <div class="form-group">
                            <select name="job" id="job" class="form-control @error('job') is-invalid @enderror">
                                <option value=""> -- Select Job --</option>
                                <option value="Dokter Splesialis">Dokter Splesialis</option>
                                <option value="Dokter Umum">Dokter Umum</option>
                                <option value="PPDS">PPDS</option>
                                <option value="Mahasiswa Kedokteran">Mahasiswa Kedokteran</option>
                                <option value="Perawat">Perawat</option>
                                <option value="Apoteker">Apoteker</option>
                                <option value="Formasi">Formasi</option>
                                <option value="Others">Others</option>
                            </select>
                            @error('job')
                                <span class="msg invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="dateofbirth" type="date" value="" class="form-control @error('dateofbirth') is-invalid @enderror" name="dateofbirth" value="{{ old('dateofbirth') }}" required autocomplete="dateofbirth" autofocus>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                </div>
                                <input id="phone" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" aria-label="phone" aria-describedby="basic-addon1" value="{{ old('phone')}}">
                                @error('phone')
                                <span class="msg invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('address') is-invalid @enderror" rows="3" id="address" name="address" placeholder="Address" value="{{ old('address')}}"></textarea>
                            @error('address')
                                <span class="msg invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="width: 100%">
                                    CREATE ACCOUNT
                                </button>
                            </div>
                            <div class="text-center">
                            <small>
                                By Creating an account. I accept Simpoku's  <a href="#" style="font-weight: bold">Terms of Use and Privacy Policy</a>
                            </small>
                            </div>
                        </div>
                    </form>
                       <div class="form-group">
                           <div class="text-center" style="font-weight: bold">
                                <a href="/login">Already Have a Simpoku Account ?</a>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>



