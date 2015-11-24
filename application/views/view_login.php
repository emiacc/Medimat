<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Medimat</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/favicon.ico" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/plugins/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/css/style.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
    <style type="text/css">html{ overflow: hidden;}</style>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image"><img src="<?= base_url(); ?>assets/img/bg-2.jpg" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated flipInX">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <img src="<?= base_url(); ?>assets/img/logo.jpg" width="40" alt="logo"> Medimat
                    <small>Productos de calidad</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form action="<?= base_url(); ?>login/iniciar_sesion_post" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg" placeholder="Email" name="nombre_usuario" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control input-lg" placeholder="Password" name="password" />
                    </div>

                    <?php if($this->session->flashdata('state')==1): ?> 
                    <div id="incorrecto" class="m-t-15 text-center" style="color:rgb(252,107,107);">
                        USUARIO O PASSWORD INCORRECTOS.
                    </div>
                    <?php endif; ?>

                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox" name="mantener" /> Mantener iniciada la sesión
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Ingresar</button>
                    </div>
                    <!--<div class="m-t-20">
                        No tienes cuenta? Click <a href="#">aqui</a> para registrarse.
                    </div>-->
                </form>
            </div>
        </div>
        <!-- end login -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url(); ?>assets/plugins/jquery-1.8.2/jquery-1.8.2.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/bootstrap-3.2.0/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?= base_url(); ?>assets/crossbrowserjs/html5shiv.js"></script>
		<script src="<?= base_url(); ?>assets/crossbrowserjs/respond.min.js"></script>
		<script src="<?= base_url(); ?>assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?= base_url(); ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->	
	<script src="<?= base_url(); ?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

		
	<script>
		$(document).ready(function() {
			App.init();		
			setTimeout(function(){$('#incorrecto').hide('slow');},3000);
		});
	</script>	
</body>
</html>