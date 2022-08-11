<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Yamaha</title>
    
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="<?=base_url('assets')?>/vendor_components/bootstrap/dist/css/bootstrap.css">
    
    <!-- daterange picker --> 
    <link rel="stylesheet" href="<?=base_url('assets')?>/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="<?=base_url('assets')?>/css/bootstrap-extend.css">
    
    <!-- theme style -->
    <link rel="stylesheet" href="<?=base_url('assets')?>/css/master_style.css">
    
    <!--  skins -->
    <link rel="stylesheet" href="<?=base_url('assets')?>/css/skins/_all-skins.css">
    
    <!--  main-nav -->
      <link href="<?=base_url('assets')?>/css/main-nav.css" rel="stylesheet" />
    
    <!-- Morris charts -->
    <link rel="stylesheet" href="<?=base_url('assets')?>/vendor_components/morris.js/morris.css">

    <!-- Data Table-->
    <link href="<?=base_url('assets')?>/js/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/vendor_components/datatable/datatables.min.css"/> -->
   
    <!-- Vector CSS -->
    <link href="<?=base_url('assets')?>/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <!--alerts CSS -->
    <link href="<?=base_url('assets')?>/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    
    <!-- toast CSS -->
    <link href="<?=base_url('assets')?>/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">

    <!-- bootstrap datepicker --> 
    <link rel="stylesheet" href="<?=base_url('assets')?>/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- bootstrap select --> 
    <link rel="stylesheet" href="<?=base_url('assets')?>/vendor_components/select2/dist/css/select2.min.css">
    
    <!-- jQuery 3 -->
    <script src="<?=base_url('assets')?>/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?=base_url('assets')?>/vendor_plugins/timepicker/bootstrap-timepicker.min.css">

    <?php 
    date_default_timezone_get('Asia/Jakarta');
     ?>

     <!-- JQuery Month Picker --->
    <link rel="stylesheet" href="<?=base_url('assets')?>/vendor_plugins/JQueryMonthPicker/MonthPicker.css">

  </head>

<?php 
  $userlogin = get_adminlogin();
?>
<body class="skin-info light-sidebar layout-top-nav" data-user="<?=$userlogin['ID_user']?>">


<div class="wrapper" style="background-color: #f2f3f8;">
  <div class="modal fade" id="modalFormUser" tabindex="-1" role="dialog" aria-labelledby="modalFormUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFormUserLabel">Form Ganti Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?=site_url('login/changepwd')?>" method="POST">
          <div class="modal-body">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password Lama" name="old_pwd" required>
                <span class="ion ion-locked form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password Baru" name="pwd" required>
                <span class="ion ion-locked form-control-feedback"></span>
              </div>
          </div>
          <div class="modal-footer text-right" style="width: 100%;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- bg-blp-gradient-animate -->
  <header class="main-header bg-blp-gradient-animate">
    <div class="inside-header">
    <!-- Logo -->
    <a href="<?=site_url('/')?>" class="logo">
      <!-- logo-->
      <div class="logo-lg">
        <span class="light-logo"><img src="<?=base_url('assets')?>/images/logo_putih.png" alt="logo" width="50"></span>
      </div>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div></div>

      <div class="navbar-custom-menu r-side">
      <ul class="nav navbar-nav">     
        <!-- User Account-->
        <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span>
            <?=$userlogin['nama']?>
            <i class="fa fa-user-circle"></i></span>
        </a>
        <ul class="dropdown-menu animated flipInX">
          <!-- Menu Body -->
          <li class="user-body">
            <a class="dropdown-item" data-toggle="modal" data-target="#modalFormUser" href="javascript:void(0)"><i class="fa fa-user"></i> Change Password</a>
          </li>
          <li class="user-body">
            <a class="dropdown-item" href="<?=site_url('login/logout')?>"><i class="ion-log-out"></i> Logout</a>
          </li>
        </ul>
        </li> 
      </ul>
      </div>
    </nav>    
    </div>
  </header>
  
  <nav class="main-nav" role="navigation">

    <!-- Mobile menu toggle button (hamburger/x icon) -->
      <input id="main-menu-state" type="checkbox" />
      <label class="main-menu-btn" for="main-menu-state">
      <span class="main-menu-btn-icon"></span> Toggle main menu visibility
      </label>

    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-blue">
      <li><a href="<?=site_url('laporan')?>" class="<?=($this->uri->segment(1) == 'laporan' ? 'current' : '')?>">LAPORAN</a></li>
      <li><a href="<?=site_url('jadwal')?>" class="<?=($this->uri->segment(1) == 'jadwal' ? 'current' : '')?>">JADWAL</a></li>
      <li><a href="<?=site_url('menu')?>" class="<?=($this->uri->segment(1) == 'menu' ? 'current' : '')?>">MENU</a></li>
      <li><a href="<?=site_url('tampilan')?>" class="<?=($this->uri->segment(1) == 'tampilan' ? 'current' : '')?>">TAMPILAN</a></li>
      <li><a href="<?=site_url('pengguna')?>" class="<?=($this->uri->segment(1) == 'pengguna' ? 'current' : '')?>">PENGGUNA</a></li>
    </ul>
  </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->   
      <div class="content-header">
        <div class="d-flex align-items-center" style="justify-content: space-between;">
          <h3 class="page-title" style="border:none;"><?=(!empty($title) ? $title : 'DASHBOARD')?></h3>
          <div class="d-inline-flex align-items-center">
            <nav>
              <?=get_breadcrumb()?>
            </nav>
          </div>
        </div>
      </div>

      <?php
        if (!empty($content)) {
            echo '<section class="content pt-10">';
            echo '<div class="row">';
            $this->load->view($content);
            echo '</div>';
            echo '</section>';
        } else {
            $this->load->view('dashboard');
        }
      ?>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
       
    
  
    
  <!-- popper -->
  <script src="<?=base_url('assets')?>/vendor_components/popper/dist/popper.min.js"></script>

  
  <!-- Bootstrap 4.0-->
  <script src="<?=base_url('assets')?>/vendor_components/bootstrap/dist/js/bootstrap.js"></script>  
  
  <!-- date-range-picker -->
  <script src="<?=base_url('assets')?>/vendor_components/moment/min/moment.min.js"></script>
  <script src="<?=base_url('assets')?>/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  <!-- Slimscroll -->
  <script src="<?=base_url('assets')?>/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
  
  <!-- FastClick -->
  <script src="<?=base_url('assets')?>/vendor_components/fastclick/lib/fastclick.js"></script>
  
  <!-- Morris.js charts -->
  <script src="<?=base_url('assets')?>/vendor_components/raphael/raphael.min.js"></script>
  <script src="<?=base_url('assets')?>/vendor_components/morris.js/morris.min.js"></script>

  <!-- Vector map JavaScript -->
  <script src="<?=base_url('assets')?>/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="<?=base_url('assets')?>/vendor_components/jvectormap/lib2/jquery-jvectormap-world-mill-en.js"></script>
  
  <!-- Sparkline -->
  <script src="<?=base_url('assets')?>/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>

  <!-- Select 2 -->
  <script src="<?=base_url('assets')?>/vendor_components/select2/dist/js/select2.full.js"></script>
  
  <!--  App -->  
  <script src="<?=base_url('assets')?>/js/jquery.smartmenus.js"></script>
  <script src="<?=base_url('assets')?>/js/menus.js"></script>
  <script src="<?=base_url('assets')?>/js/template.js"></script>

  <!-- This is data table -->
  <script type="text/javascript">
    window.siteUrl          = '<?=site_url('/')?>';
    window.user_id          = '<?=(!empty($userlogin['ID_user']) ? $userlogin['ID_user'] : '')?>';
  </script>
  
  <!-- Sweet-Alert  -->
  <script src="<?=base_url('assets')?>/vendor_components/sweetalert/sweetalert.min.js"></script>
  
  <!-- JQuery Month Picker -->
  <script src="<?=base_url('assets')?>/vendor_plugins/JQueryUI/jquery-ui.min.js"></script>
  <script src="<?=base_url('assets')?>/vendor_plugins/JQueryMonthPicker/MonthPicker.js"></script>

  <!-- Currency Format -->
  <script src="<?=base_url('assets')?>/js/jquery.number.js"></script>  
  <script src="<?=base_url('assets')?>/js/pages/data-table.js"></script>
  <!-- <script src="<?=base_url('assets')?>/vendor_components/datatable/datatables.min.js"></script> -->

  <script src="<?=base_url('assets')?>/js/jquery-datatable/jquery.dataTables.js"></script>
  <script src="<?=base_url('assets')?>/js/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

  <!-- Underscore js -->
  <script src="<?=base_url('assets')?>/js/underscore-min.js"></script>

  
  <!-- <script src="https://cdn.datatables.net/plug-ins/1.10.21/pagination/input.js"></script> -->
  <script src="<?=base_url('assets')?>/js/custom.js"></script>

  <!-- toast -->
  <script src="<?=base_url('assets')?>/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
  
  <!-- bootstrap datepicker -->
  <script src="<?=base_url('assets')?>/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  
  <!-- Autocomplete -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/vendor_plugins/autocomplete/jquery-ui.css">
  <script src="<?=base_url('assets')?>/vendor_plugins/autocomplete/jquery-ui.js"></script>
  
  <!-- bootstrap time picker -->
  <script src="<?=base_url('assets')?>/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>

  <!--  dashboard demo (This is only for demo purposes) -->
  <script src="<?=base_url('assets')?>/js/pages/dashboard.js"></script>

  
  <script type="text/javascript">
    $(document).ready(function() {
        var notif     = '<?=get_notif()?>';
        var get_report = '<?=get_report()?>';

        if (notif != '') {
            notif = notif.split('#');
            switch (notif[0]) {
                case 'info':
                    buildNotif('warning', notif[1]);
                    break;
                case 'success':
                    buildNotif('success', notif[1]);
                    break;
                case 'error':
                    buildNotif('error', notif[1]);
                    break;
            }
        }

        function buildNotif(colorName, text) {
          $.toast({
              heading: 'Notifications',
              text: text,
              position: 'top-right',
              loaderBg: '#ff6849',
              icon: colorName,
              hideAfter: 3500,
              stack: 6
          });
        }

        if(get_report != '') {
          window.open(get_report,'_blank'); 
        }
    });
  </script>
  
  <!-- Custom Script -->
  <?php
    if (!empty($script)) {
        $this->load->view($script);
    }
  ?>
</body>
</html>
