<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">

        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <div class="brand-logo">
                                  <img src="<?php echo base_url(); ?>assets/images/clubtec.png">
<!--                                    <label>logo o nombrede la empresa</label>-->
                                </div>
                                <h4>Hola! Empecemos</h4>
                                <h6 class="font-weight-light">Inicia sessión para continuar.</h6>
                                <form class="pt-3" action="<?php echo site_url('inicio'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Contrasena">
                                    </div>
                                    <div class="mt-3">
                                        <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="<?php echo site_url('inicio'); ?>">INICIAR SESIÓN</a>
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <a href="#" class="auth-link text-black">¿Olvidaste tu contraseña?, solicitar ayuda.</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
        <!-- endinject -->
    </body>
</html>
