<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Simpoku</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset ('adminlte/plugins/font-awesome/css/font-awesome.min.css')); ?>">
   
    <link rel="stylesheet" href="<?php echo e(asset('/adminlte/css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/genosstyle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/sweetalert2.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="hold-transition sidebar-mini bodypolos">
    <div style="position: absolute; width: 100%; height: initial; background-color: gray; opacity: 0.3; display: none; z-index: 99999" id="loadingimage">
        <img src="<?php echo e(asset('/assets/images/ajaxloader.gif')); ?>" alt="" >
    </div>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link"><?php echo $__env->yieldContent('judul'); ?></a>
                </li>

            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto" style="margin-right: 0">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i>&nbsp;<?php echo e(auth()->guard('web')->user()->username); ?>

                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="/logoutadmin" class="dropdown-item dropdown-footer text-dark">Logout</a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <!-- <img src="<?php echo e(asset ('/adminlte/img/logoiks.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-light">Simpoku Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo e(asset ('/adminlte/img/avatar5.png')); ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info text-light">
                        &nbsp;<?php echo e(auth()->guard('web')->user()->username); ?>

                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-database"></i>
                                <p>
                                    Data Master
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/dashboardadmin/user" class="nav-link ">
                                        <i class="fa fa-user nav-icon"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/dashboardadmin/member" class="nav-link ">
                                        <i class="fa fa-address-book nav-icon"></i>
                                        <p>Members</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/dashboardadmin/specialist" class="nav-link ">
                                        <i class="fa fa-user-md nav-icon"></i>
                                        <p>Specialist</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/dashboardadmin/banner" class="nav-link ">
                                        <i class="fa fa-desktop nav-icon"></i>
                                        <p>Banner</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/dashboardadmin/event" class="nav-link ">
                                        <i class="fa fa-calendar-check-o nav-icon"></i>
                                        <p>Events</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- =============================================== -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid pt-2"">
                    <?php echo $__env->yieldContent('content'); ?>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2019.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    
    <script src=" <?php echo e(asset ('/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('/js/bootstrap-4.3.1/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('/js/bootstrap-4.3.1/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('/adminlte/js/adminlte.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
    <?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH D:\laravel\simpoku\resources\views/admin/master.blade.php ENDPATH**/ ?>