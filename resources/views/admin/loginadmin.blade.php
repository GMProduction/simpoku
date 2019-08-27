<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
 <link href="{{ asset('/css/genosstyle.css') }}" rel="stylesheet" />
 <link href="{{ asset('/css/animate.css') }}" rel="stylesheet" />
     <link href="{{ asset('/css/login.css') }}" rel="stylesheet" />

    <title>Document</title>
</head>
<body>
    <div class="container bawah">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin">
            <div class="card-body">
              <h5 class="card-title text-center">Sign In</h5>
              <form class="form-signin" method="post" action="/postloginadmin">
                {{csrf_field()}}
                <div class="form-label-group">
                  <input type="text" id="username" name="username" class="form-control" placeholder="Username or Email" required autofocus>
                  <label for="username">Username or Email</label>
                </div>
  
                <div class="form-label-group">
                  <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                  <label for="password">Password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>
</body>
</html>
   

 
    