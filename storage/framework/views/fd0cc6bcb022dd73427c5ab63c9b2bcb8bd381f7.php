<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            background-color: skyblue;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header text-center" style="background-color: #843B69">
            <img class="img-fluid" src="<?php echo e(asset('assets/gambar/logo1.png')); ?>" alt="">
        </div>
        <div class="card-body">
            Hi, <?php echo e($fullname); ?><br>
            Congratulations! Your Register hass been successfully.<br>
            Please Follow This <a href="<?php echo e(url('/verifyaccount/' . $remember_token)); ?>">Link</a> To Verify Your Simpoku Account and Get More Fitur From Simpoku.com. 
            <br>
            Thank You For Joining With Us.
        </div>
        <div class="card-footer text-center" style="background-color: #843B69; color: snow">
            &copy; Simpoku.com
        </div>
    </div>
</div>

    
</body>
</html>


<?php /**PATH D:\Program\web\New folder\simpoku\resources\views/auth/member/verify.blade.php ENDPATH**/ ?>