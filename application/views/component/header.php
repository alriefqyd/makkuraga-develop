<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

  <title>Makkuraga Apps</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link  href="<?php echo base_url() ?>assets/vendors/datepicker/datepicker.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">

  <!-- Datatables -->
  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/js/jquery-ui.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css"/>



</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url() ?>" class="site_title"><i class="fa fa-paw"></i> <span>Makkuraga Operation Apps</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo base_url() ?>assets/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $this->session->userdata('nama') ?></h2>
              <?php echo $this->session->userdata('lokasi')?>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Menu</h3>
              <ul class="nav side-menu">

                <li><a><i class="fa fa-calendar"></i> Equipment History<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <li><a href="<?php echo base_url() ?>equipment/backlog">Backlog</a></li>
                    <li><a href="<?php echo base_url() ?>equipment/progress">On Progress</a></li>
                    <li><a href="<?php echo base_url() ?>equipment/done">Service Log</a></li>

                  </ul>
                </li>
                <li><a href="<?php echo base_url() ?>pm"><i class="fa fa-cogs"></i> PM Monitoring </a></li>
                <li><a href="<?php echo base_url() ?>mechanic"><i class="fa fa-male"></i> Mechanic </a></li>
                <li><a href="<?php echo base_url() ?>register/add"><i class="fa fa-user"></i> Tambah Admin </a>

               </li>

             </div>

           </div>
           <!-- /sidebar menu -->

           <!-- /menu footer buttons -->
         </div>
       </div>

       <!-- top navigation -->
       <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="" alt=""><?php echo $this->session->userdata('level')?>

                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo base_url() ?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
            </nav>
          </div>
        </div>
