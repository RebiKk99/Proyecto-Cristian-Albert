<!DOCTYPE html>
<html lang="en">

  <?php
    session_start();
    session_regenerate_id(true);
    if( isset($_REQUEST['session']) && $_REQUEST['session']=="close" ){
      session_destroy();
      header("location: index.php");
    }
    if( isset($_SESSION['id'])==false ){
      header("location: index.php");
    }
    $module=$_REQUEST['module']??'';
  ?>
 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HSBAC | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <!--<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">-->
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
<!--
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
  <link rel="stylesheet" href="css/editor.dataTables.min.css">-->

  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.0/css/select.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css">
  <link rel="stylesheet" href="css/editor.dataTables.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

        <a class="nav-link" href="panel.php?module=editUser&id=<?php echo $_SESSION['id']; ?>">
          <i class="far fa-user"></i>
        </a>
        <a class="nav-link" href="panel.php?module=&session=close" title="Log out">
          <i class="fas fa-door-closed text-danger"></i>
        </a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">HSBAC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-shopping-cart nav-icon"></i>
              <p>
                HSBAC
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="panel.php?module=statistics" class="nav-link <?php echo ($module=="statistics" || $module=="")?" active":" "; ?>">
                  <i class="far fa-chart-bar nav-icon"></i>
                  <p>Statistics</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="panel.php?module=users" class="nav-link <?php echo ($module=="users" || $module=="createUser" || $module=="editUser")?" active":" "; ?> ">
                  <i class="far fa-user nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="panel.php?module=products" class="nav-link <?php echo ($module=="products")?" active":" "; ?> ">
                  <i class="fa fa-shopping-bag nav-icon" aria-hidden="true"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="panel.php?module=sales" class="nav-link <?php echo ($module=="sales")?" active":" "; ?> ">
                  <i class="fa fa-table nav-icon" aria-hidden="true"></i>
                  <p>Sales</p>
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
  <?php
    if( isset($_REQUEST['message'])){
  ?>
    <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <?php echo $_REQUEST['message'] ?>
    </div>
  <?php
    }
    if($module=="statistics" || $module==""){
      include_once "statistics.php";
    }
    if($module=="users"){
      include_once "users.php";
    }
    if($module=="products"){
      include_once "products.php";
    }
    if($module=="sales"){
      include_once "sales.php";
    }
    if($module=="createUser"){
      include_once "createUser.php";
    }
    if($module=="editUser"){
      include_once "editUser.php";
    }
    if($module=="products"){
      include_once "products.php";
    }
  ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
-->
<!--
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="js/dataTables.editor.min.js"></script>-->


  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
  <script src="https://cdn.datatables.net/select/2.0.0/js/dataTables.select.js"></script>
  <script src="https://cdn.datatables.net/select/2.0.0/js/select.dataTables.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>
  <script src="js/dataTables.editor.min.js"></script>
  <script src="js/editor.dataTables.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lenghtChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    const editor = new DataTable.Editor({
    ajax: 'controllers/products.php',
    fields: [
        {
            label: 'Name:',
            name: 'name'
        },
        {
            label: 'Price:',
            name: 'price'
        },
        {
            label: 'Stock:',
            name: 'stock'
        },
        {
            label: 'Images:',
            name: 'files[].id',
            type: 'uploadMany',
            display: (fileId, counter) =>
                `<img src="${editor.file('files', fileId).web_path}"/>`,
            noFileText: 'No images'
        },
        {
            label: 'Description',
            name: 'description'
        }
    ],
    table: '#productsTable'
});
 
new DataTable('#productsTable', {
    dom: "Bfrtip",
    ajax: 'controllers/products.php',
    columns: [
        { data: 'name' },
        { data: 'price', render: DataTable.render.number(",", ".", 0, '€') },
        { data: 'stock'},
        {
            data: 'files',
            render: (d) => (d.length ? `${d.length} image(s)` : 'No image'),
            title: 'Image'
        }
    ],
    select: true,
    buttons: [
        { extend: 'create', editor: editor },
        { extend: 'edit', editor: editor },
        { extend: 'remove', editor: editor }
    ]
});
  });
</script>

<script>
  $(document).ready(function () {
    $(".delete").click(function (e) {
      e.preventDefault();
      var res=confirm("Do you really want to delete this user?");
      if (res==true){
        var link=$(this).attr("href");
        window.location=link;
      }
    });
  });
</script>
</body>
</html>
