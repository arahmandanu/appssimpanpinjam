<?php if (empty($_SESSION['id_user'])) {

    header('Location:'.base_url());

}
else{

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aplikasi | Peminjaman Dokumen</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="<?php echo base_url('vendors/image/x-icon');?>" href="<?php echo base_url('vendors/img/icon_maybank.jpg');?>">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/bootstrap.min.css');?>">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/font-awesome.min.css');?>">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/owl.carousel.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/owl.theme.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/owl.transitions.css')?>">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/animate.css');?>">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/normalize.css');?>">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/meanmenu.min.css');?>">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/main.css');?>">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/educate-custon-icon.css');?>">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/morrisjs/morris.css');?>">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/scrollbar/jquery.mCustomScrollbar.min.css');?>">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/metisMenu/metisMenu.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/metisMenu/metisMenu-vertical.css');?>">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/calendar/fullcalendar.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/calendar/fullcalendar.print.min.css');?>">
    <!-- tabs CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/tabs.css');?>">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/style.css');?>">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/responsive.css');?>">
    <!-- modernizr JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/vendor/modernizr-2.8.3.min.js');?>"></script>
        <!-- jquery -->
    <script src="<?php echo base_url('vendors/js/jquery/jquery-1.12.4.js');?>"></script>
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/css/alerts.css');?>">
    <!-- data-table -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendors/js/datatables/datatables.min.css'); ?>"/>

    <link rel="stylesheet" href="<?php echo base_url('vendors/css/modals.css');?>">

    <style type="text/css">
        .loadingpage{
        text-align:center;
        margin-top:20%;
    }
    
    </style>

</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">

            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="<?php echo base_url('vendors/img/logo/maybank.png');?>" alt="" /></a>
                <strong><a href="index.html"><img src="<?php echo base_url('vendors/img/logo/iconn.png');?>" alt="" /></a></strong>
            </div>

            <br>

            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">

                        <li class="active">
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-apps icon-wrap"></span> <span class="mini-click-non">Transaksi</span></a>
                            <ul class="submenu-angle" aria-expanded="false">

                                <li data="<?php echo base_url('user/main') ?>" ><a href="javascript:void(0)" title="Pinjam Debitur"><span class="mini-sub-pro">Pinjam Debitur</span></a></li>

                                <li data="<?php echo base_url('user/kembalipinjaman')?>"><a title="Kembalikan Pinjaman" href="javascript:void(0)"><span class="mini-sub-pro">Status Pinjaman</span></a></li>

                                

                                <?php if( ($_SESSION['level']=="admin") || ($_SESSION['level']=="superadmin") ) { ?>

                                <hr>

                                <li data="<?php echo base_url('user/masukkandokumen');?>"><a title="Masukkan Dokumen" href="javascript:void(0)"><span class="mini-sub-pro">Masukkan Dokumen</span></a></li>

                                <?php } ?>
                                
                                <hr>

                                <li data="<?php echo base_url('taxasi/main');?>"><a title="Order Taksasi" href="javascript:void(0)"><span class="mini-sub-pro">Order Taksasi</span></a></li>

                                <li data="<?php echo base_url('taxasi/statustaksasi');?>"><a title="Status Taksasi" href="javascript:void(0)"><span class="mini-sub-pro">Status Taksasi</span></a></li>
                             
                            </ul>
                        </li>

                         <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap"></span> <span class="mini-click-non">History</span></a>
                            <ul class="submenu-angle" aria-expanded="false">

                                <li data="<?php echo base_url('user/historypeminjamanku'); ?>"><a title="Peminjaman Saya" href="javascript:void(0)"><span class="mini-sub-pro">Peminjaman Saya</span></a></li>
                                <li data="<?php echo base_url('user/statuspelunasan') ?>"><a title="Peminjaman Saya" href="javascript:void(0)"><span class="mini-sub-pro">Status Pelunasan</span></a></li>

                                <hr>

                                <li data="<?php echo base_url('user/logtaksasi') ?>"><a title="Peminjaman Saya" href="javascript:void(0)"><span class="mini-sub-pro">Log Taksasi</span></a></li>

                            </ul>
                        </li>

                         <?php if(($_SESSION['level'] == "admin") || ($_SESSION['level'] == "superadmin")) { ?>

                        <li >
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span> <span class="mini-click-non">Approval</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li data="<?php echo base_url('approve/main') ?>" ><a href="javascript:void(0)" title="Approve Peminjaman Karyawan"><span class="mini-sub-pro">Approve Transaksi</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Detail</span></a>
                            <ul class="submenu-angle" aria-expanded="false">

                                <li data="<?php echo base_url('debitur/main'); ?>"> <a href="javascript:void(0)" title="Daftar Debitur"><span class="mini-sub-pro">Daftar Debitur</span></a></li>
                                <li data="<?php echo base_url('debitur/listpinjaman'); ?>"> <a href="javascript:void(0)" title="Daftar Peminjaman"><span class="mini-sub-pro">Daftar Peminjaman</span></a></li>

                                <hr>

                                <li data="<?php echo base_url('approve/mainpengembalian') ?>"><a href="javascript:void(0)" title="Peminjaman User"><span class="mini-sub-pro">Peminjaman User</span></a></li>

                                <hr>

                                <li data="<?php echo base_url('taxasi/logtaksasiuser') ?>"><a href="javascript:void(0)" title="Taksasi User"><span class="mini-sub-pro">Taksasi User</span></a></li>

                            </ul>
                        </li>

                        <?php } ?>
    
                        <?php if ($_SESSION['level'] == "superadmin") { ?>                        

                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="mini-click-non"> Setting</span></a>
                            <ul class="submenu-angle" aria-expanded="false">

                                <li data="<?php echo base_url('setting/main'); ?>"> <a href="javascript:void(0)" title="Setting User"><span class="mini-sub-pro">Setting User</span></a></li>
                                <li data="<?php echo base_url('setting/settingnotif'); ?>"> <a href="javascript:void(0)" title="Setting Notifikasi"><span class="mini-sub-pro">Setting Notifikasi</span></a></li>
                                <li data="<?php echo base_url('setting/uploadmasterdata'); ?>"> <a href="javascript:void(0)" title="Upload Data Baru"><span class="mini-sub-pro">Upload Data</span></a></li>

                            </ul>
                        </li>

                       <?php } ?>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->

    <!-- Start Welcome area -->
    <div class="all-content-wrapper" id="loader">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                    </div>
                </div>
            </div>
        </div>

        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">

                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="educate-icon educate-nav"></i>
                                                </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-11 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-right-info">

                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <!-- <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Message</h1>
                                                        </div>
                                                        <ul class="message-menu">
                                                            
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="#">View All Messages</a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li> -->

                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <span class="admin-name"><?php echo $_SESSION['nama_user']; ?></span>
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="<?php echo base_url('login/logout'); ?>"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                        <li><a href="<?php echo base_url('awal/changepass'); ?>"><span class="edu-icon edu-locked author-log-ic"></span>Change Password</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-sales-area mg-tb-30" id="konten" style="padding-bottom: 7%;">

            <!-- Tampilan Semua Data -->

            <?php echo $content; ?>

        
        </div>

        <!-- footer -->
        <div class="footer-copyright-area" style="position: fixed;" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="footer-copy-right">
                            <p>Copyright © 2019. All rights reserved. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end footer -->
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
    <script src="<?php echo base_url('vendors/js/jquery-price-slider.js');?>"></script>
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
    <!-- counterup JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/counterup/jquery.counterup.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/counterup/waypoints.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/counterup/counterup-active.js');?>"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/scrollbar/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/scrollbar/mCustomScrollbar-active.js');?>"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/metisMenu/metisMenu.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/metisMenu/metisMenu-active.js');?>"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/morrisjs/raphael-min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/morrisjs/morris.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/morrisjs/morris-active.js');?>"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/sparkline/jquery.sparkline.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/sparkline/jquery.charts-sparkline.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/sparkline/sparkline-active.js');?>"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/calendar/moment.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/calendar/fullcalendar.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/js/calendar/fullcalendar-active.js');?>"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/plugins.js');?>"></script>
    <!-- main JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/main.js');?>"></script>
    

    <script src="<?php echo base_url('vendors/js/sweetalert/sweetalert.min.js');?>"></script>

    <script type="text/javascript" src="<?php echo base_url('vendors/js/datatables/datatables.min.js');?>"></script>

    <!-- tab JS
        ============================================ -->
    <script src="<?php echo base_url('vendors/js/tab.js');?>"></script>

    <script type="text/javascript">

        var a = document.querySelectorAll('li[data]');

            for(i=0;i < a.length;i++){

                a[i].onclick = function(){

                    $("#konten").html("<div class='loadingpage'><br><img src='<?php echo site_url("vendors/ajax-loader.gif")?>' /><div style='color:#555;'>Please wait . . .</div></div>");

                    // alert(this.getAttribute("data"));

                   var target = this.getAttribute("data");
                   // console.log(target);
            
                    $("#konten").load(target);
                }
                    
            }

    </script>
</body>

</html>

<?php } ?>