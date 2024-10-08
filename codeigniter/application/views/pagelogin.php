<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>AquaReadPro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>xeria/light/dist/assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url(); ?>xeria/light/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>xeria/light/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>xeria/light/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/logo7.png" alt="" height="108"></span>
                                    </a>
                                    <!-- <p class="text-muted mb-4 mt-3">Ingrese sus credenciales de autentificación.</p> -->
                                </div>
                                <br>
                                <h5 class="auth-title">Iniciar Sesión</h5>

                                <?php
                                    echo form_open_multipart("usuario/validarusuario");
                                ?>
                                    <div class="form-group mb-3">
                                        <label for="nickName">Nickname</label>
                                        <input class="form-control" type="text" id="nickName" name="nickname" placeholder="Nickname" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Password" autocomplete="new-password" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit"> Acceder </button>
                                    </div>

                                <?php
                                    echo form_close();
                                ?>

                                <!-- <div class="text-center">
                                    <h5 class="mt-3 text-muted">Iniciar sesión</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div> -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Olvidaste tu password?</a></p>
                                <p class="text-muted">Aún no tienes una cuenta? <a href="pages-register.html" class="text-muted ml-1"><b class="font-weight-semibold">Registrarse</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2024 &copy; Aqua Read Pro by <a href="login" class="text-muted"> Games Coorp.</a> 
        </footer>

        <!-- Vendor js -->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/js/app.min.js"></script>
        
    </body>
</html>