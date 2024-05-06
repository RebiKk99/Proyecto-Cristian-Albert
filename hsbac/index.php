<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSBAC</title>

  <link rel="stylesheet" href="style.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.min.css">

<?php
  session_start();
  $action=$_REQUEST['action']??'';
  if($action=='close'){
    session_destroy();
    header("Refresh:0");
  }
?>

</head>
<body>
<?php 
include_once "admin/db_hsbac.php";
$con = mysqli_connect($host, $user, $pass, $db);
?>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php
        include_once "menu.php";
        $module=$_REQUEST['module']??'';
        if($module=="products" || $module=="" ){
          include_once "products.php";
        }
        if($module=="productdetail" ){
          include_once "productDetail.php";
        }
        if($module=="cart" ){
          include_once "cart.php";
        }
        ?>
      </div>
    </div>
  </div>
  
  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- daterangepicker -->
  <script src="admin/plugins/moment/moment.min.js"></script>
  <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- AdminLTE App -->
  <script src="admin/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="admin/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="admin/dist/js/pages/dashboard.js"></script>

  <script src="admin/js/hsbac.js"></script>
</body>
</html>