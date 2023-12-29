<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>Distavo 2.0</title>

  <!-- Bootstrap -->
  <link href="<?= base_url('public/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('public/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('public/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?= base_url('public/vendors/animate.css/animate.min.css') ?>" rel="stylesheet">

  <link href="<?= base_url('public/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?= base_url('public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') ?>"
    rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?= base_url('public/vendors/jqvmap/dist/jqvmap.min.css') ?>" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?= base_url('public/vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url('public/build/css/custom.min.css') ?>" rel="stylesheet">

  <!-- data table -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="<?= base_url('public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">

  <!-- jQuery -->
  <script src="<?= base_url('public/vendors/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url('public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script language="javascript">
    var basePath = "<?php echo base_url('dish2o_admin'); ?>";
  </script>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?= base_url('admin/home') ?>" class="site_title"><span style="font-size: 31px;">DISHTAVO
                2.0</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?= base_url('public/images/img.jpg') ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <?= $this->include('admin/leftpanel') ?>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <?php
          /*<div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
         */?>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <?= $this->include('admin/header') ?>
      <!-- /top navigation -->

      <!-- page content -->
      <?= $this->include($viewPage) ?>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          &copy; &nbsp;2023&nbsp;Copyright: Directorate of Higher Education, All rights reserved.
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>


  
  <!-- FastClick -->
  <script src="<?= base_url('public/vendors/fastclick/lib/fastclick.js') ?>"></script>
  <!-- NProgress -->
  <script src="<?= base_url('public/vendors/nprogress/nprogress.js') ?>"></script>
  <!-- Chart.js -->
  <script src="<?= base_url('public/vendors/Chart.js/dist/Chart.min.js') ?>"></script>
  <!-- gauge.js -->
  <script src="<?= base_url('public/vendors/gauge.js/dist/gauge.min.js') ?>"></script>
  <!-- bootstrap-progressbar -->
  <script src="<?= base_url('public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
  <!-- iCheck -->
  <script src="<?= base_url('public/vendors/iCheck/icheck.min.js') ?>"></script>
  <!-- Skycons -->
  <script src="<?= base_url('public/vendors/skycons/skycons.js') ?>"></script>
  <!-- Flot -->
  <script src="<?= base_url('public/vendors/Flot/jquery.flot.js') ?>"></script>
  <script src="<?= base_url('public/vendors/Flot/jquery.flot.pie.js') ?>"></script>
  <script src="<?= base_url('public/vendors/Flot/jquery.flot.time.js') ?>"></script>
  <script src="<?= base_url('public/vendors/Flot/jquery.flot.stack.js') ?>"></script>
  <script src="<?= base_url('public/vendors/Flot/jquery.flot.resize.js') ?>"></script>
  <!-- Flot plugins -->
  <script src="<?= base_url('public/vendors/flot.orderbars/js/jquery.flot.orderBars.js') ?>"></script>
  <script src="<?= base_url('public/vendors/flot-spline/js/jquery.flot.spline.min.js') ?>"></script>
  <script src="<?= base_url('public/vendors/flot.curvedlines/curvedLines.js') ?>"></script>
  <!-- DateJS -->
  <script src="<?= base_url('public/vendors/DateJS/build/date.js') ?>"></script>
  <!-- JQVMap -->
  <script src="<?= base_url('public/vendors/jqvmap/dist/jquery.vmap.js') ?>"></script>
  <script src="<?= base_url('public/vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
  <script src="<?= base_url('public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?= base_url('public/vendors/moment/min/moment.min.js') ?>"></script>
  <script src="<?= base_url('public/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

   <!-- Datatables -->
   <script src="<?= base_url('public/vendors/') ?>datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?= base_url('public/vendors/') ?>datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>jszip/dist/jszip.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>pdfmake/build/pdfmake.min.js"></script>
  <script src="<?= base_url('public/vendors/') ?>pdfmake/build/vfs_fonts.js"></script>

  <!-- Parsley Paresh: here form validations are implemented we need to check -->
<script src="<?= base_url('public/vendors/') ?>parsleyjs/dist/parsley.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?= base_url('public/build/js/custom.min.js') ?>"></script>

</body>

</html>