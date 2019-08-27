<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset ('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
    <title>Login Form</title>
    <style>
    body{
            background-color: #9C5D66;
        }
        .box-login{
            margin-top: 70px;
            padding: 20px 30px;
            background-color: white;
            border-radius: 0px 3px 3px 0px;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        .box-left{
            margin-top: 70px;
            padding: 20px 30px;
            background-color: #8D021F;
            color: white;
            border-radius: 3px 0px 0px 3px;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 box-left">
                Welcome To Simpoku
            </div>
            <div class="col-md-4 box-login">
                <div class="title text-center">
                    Login Form
                </div>
                <br>
                <br>
                <form method="post" action="/postlogin">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username or Email Address" aria-label="Username" aria-describedby="basic-addon1" name="username" id="username">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="password" aria-label="Password" aria-describedby="basic-addon1" name="password" id="password">
                </div>
                <div >
                    <button type="submit" class="btn btn-primary" style="width: 100%">
                        Login
                    </button>
                </div>
                <br>
                <div class="form-group">
                    <div class="text-center">
                        Not A Member ? <a href="/register" style="font-weight: bold">Create Account</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>