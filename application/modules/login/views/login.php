<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Aplikasi - Peminjaman</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="vendors/image/x-icon" href="<?php echo base_url('vendors/img/icon_maybank.jpg');?>">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/bootstrap.min.css');?>">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/font-awesome.min.css'); ?>">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/owl.theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/owl.transitions.css');?>">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/animate.css'); ?>">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/normalize.css'); ?>">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/main.css'); ?>">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/morrisjs/morris.css');?>">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/scrollbar/jquery.mCustomScrollbar.min.css') ?>">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/metisMenu/metisMenu.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/metisMenu/metisMenu-vertical.css'); ?>">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/calendar/fullcalendar.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/calendar/fullcalendar.print.min.css');?>">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/form/all-type-forms.css');?>">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/style.css');?>">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/responsive.css');?>">
<!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/alerts.css');?>">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/vendor/modernizr-2.8.3.min.js');?>"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>PLEASE LOGIN TO SYSTEM</h3>
				
			</div>

            <?php if($this->session->flashdata('gagal_login') == TRUE){ ?>

            <div class="alert alert-warning alert-success-style3 alert-st-bg2">
                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                    </button>
                <i class="fa fa-exclamation-triangle edu-warning-danger admin-check-pro admin-check-pro-clr2" aria-hidden="true"></i>
                <p><strong>Warning!</strong> <?php echo $this->session->flashdata('gagal_login'); ?></p>
            </div>

            <?php } ?>

			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="login/masuk" id="loginForm" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>
    <!-- jquery
		============================================ -->
    <script src="<?php echo base_url('vendors/js/vendor/jquery-1.12.4.min.js');?>"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/bootstrap.min.js');?>"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/wow.min.js');?>"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/jquery-price-slider.js'); ?>"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/jquery.meanmenu.js');?>"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/owl.carousel.min.js');?>"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/jquery.sticky.js');?>"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/jquery.scrollUp.min.js');?>"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/scrollbar/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/scrollbar/mCustomScrollbar-active.js');?>"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/metisMenu/metisMenu.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/metisMenu/metisMenu-active.js');?>"></script>
    <!-- tab JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/tab.js');?>"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/icheck/icheck.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/icheck/icheck-active.js');?>"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/plugins.js');?>"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url('vendors/js/main.js');?>"></script>
</body>

</html>