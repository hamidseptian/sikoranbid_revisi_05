<?php 
session_start();
include "../../assets/koneksi.php";
if ($_SESSION['login']!=true) {
  header("location:../../");
}else{
$iduser = $_SESSION['id_user'];

  $quser = mysqli_query($conn, "SELECT * from user u left join bidang b on u.id_bidang = b.id_bidang where u.id_user='$iduser'")or die(mysqli_error());
  $duser = mysqli_fetch_array($quser);
  $namauser=$duser['nama_user'];
  $level = $duser['nama_bidang'];
  $bidang = $_SESSION['bidang'];

  $gambar = "../../assets/user.jpg";



 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">

    <!-- fullCalendar -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  
<script src="../../assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/adminlte/dist/css/AdminLTE.min.css">

 <script type="text/javascript" src="../../assets/adminlte/js/jquery.js"></script>

 


 
 
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../assets/adminlte/dist/css/skins/_all-skins.min.css">






  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../assets/adminlte/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SIKAB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIKORANBID</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo  $gambar ?>" class="user-image" alt="<?php echo  $gambar ?>">
              <span class="hidden-xs"><?php echo $namauser; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- <?php echo   $gambar ?> -->
              <li class="user-header">
                <img src="<?php echo  $gambar ?>" class="img" alt="<?php echo   $gambar ?>">

                <p>
                  <?php echo $namauser; ?>  <br> <?php echo $level; ?> 
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?a=edit-akun" class="btn btn-default btn-flat">Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo  $gambar ?>" class="img" alt="<?php echo   $gambar ?>">
        </div>
        <div class="pull-left info">
          <p><?php echo $namauser; ?></p>
          <a href="#"><?php echo $level ?> </a>
        </div>
      </div>
      <!-- search form -->
     

      <ul class="sidebar-menu" data-widget="tree">
       
        
        <?php if ($bidang==1) { ?>
          
         <li class="header">Menu Bidang Ketua Panitia</li>
         <li class="treeview">
          <a href="#" style="color:aqua">
            <i class="fa fa-bars"></i>
            <span>Data Program Kerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=proker&jenis=Diusulkan" style="color:aqua"><i class="fa fa-book"></i>Diusulkan Bidang</a></li>
            <li><a href="?a=proker&jenis=Ditentukan" style="color:aqua"><i class="fa fa-book"></i>Tugaskan Ke Bidang</a></li>
          </ul>
        </li>
        <li><a href="?a=user" style="color:aqua"><i class="fa fa-book"></i>Struktural (Data User)</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Chat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=chat_personal"><i class="fa fa-book"></i>Personal</a></li>
            <li><a href="?a=chat_group"><i class="fa fa-book"></i>Group</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=laporan_pengumpulan&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan pengumpulan</a></li>
            <li><a href="?a=laporan_pengeluaran&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan Pengeluaran</a></li>
            <li><a href="?a=laporan_proker&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan Proker</a></li>
          </ul>
        </li>

      <?php }
      else if ($bidang==2) { ?>?>
        <li class="header">Menu Bidang Pengumpulan</li>
        <li><a href="#"><i class="fa fa-book"></i>Dashboard</a></li>
        <li><a href="?a=pengumpulan"  style="color:aqua"><i class="fa fa-book"></i>Data Pengumpulan</a></li>
        <li><a href="?a=petugas_pengumpul" style="color:aqua"><i class="fa fa-book"></i>Data Petugas Pengumpul</a></li>
        <li><a href="?a=muzaki" style="color:aqua"><i class="fa fa-book"></i>Data Muzaki</a></li>
        <li><a href="?a=kotak_infaq"  style="color:aqua"><i class="fa fa-book"></i>Data Kotak Infaq</a></li>
        <li><a href="?a=notifikasi"><i class="fa fa-book"></i>Notifikasi</a></li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Chat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=chat_personal"><i class="fa fa-book"></i>Personal</a></li>
            <li><a href="?a=chat_group"><i class="fa fa-book"></i>Group</a></li>
          </ul>
        </li>
        <li><a href="?a=proker"><i class="fa fa-book"></i>Proker Bidang</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=laporan_pengumpulan&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan pengumpulan</a></li>
          </ul>
        </li>
      <?php }
      else if($bidang==3){
       ?>
        <li class="header">Menu Bendahara</li>
        <li><a href="?a=pengumpulan"  style="color:aqua"><i class="fa fa-book"></i>Data Pengumpulan</a></li>
        <li><a href="?a=keuangan"><i class="fa fa-book"></i>Keuangan (Berasal dari data pengumpul)</a></li>
        <!-- <li><a href="#"><i class="fa fa-book"></i>Uang Keluar</a></li> -->
        <li><a href="?a=notifikasi"><i class="fa fa-book"></i>Notifikasi</a></li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Chat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=chat_personal"><i class="fa fa-book"></i>Personal</a></li>
            <li><a href="?a=chat_group"><i class="fa fa-book"></i>Group</a></li>
          </ul>
        </li>
        <li><a href="?a=proker"><i class="fa fa-book"></i>Proker Bidang</a></li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=laporan_pengumpulan&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan Pemasukan</a></li>
            <li><a href="?a=laporan_pengeluaran&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan Pengeluaran</a></li>
            <!-- <li><a href="?a=laporan_keuangan&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan Keuangan</a></li> -->
          </ul>
        </li>
      <?php }
      else if($bidang==4){ ?>
        <li class="header">Menu Bidang Pendayagunaan</li>
        <li class="treeview">
          <a href="#" style="color:aqua">
            <i class="fa fa-bars"></i>
            <span>Data Program Kerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=proker&jenis=Diusulkan" style="color:aqua"><i class="fa fa-book"></i>Diusulkan Bidang</a></li>
            <li><a href="?a=proker&jenis=Ditentukan" style="color:aqua"><i class="fa fa-book"></i>Tugaskan Ke Bidang</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Chat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=chat_personal"><i class="fa fa-book"></i>Personal</a></li>
            <li><a href="?a=chat_group"><i class="fa fa-book"></i>Group</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=laporan_proker&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan Proker</a></li>
          </ul>
        </li>
      <?php }
      else if($bidang==5){ ?>
        <li class="header">Menu Bidang Pendistribusian</li>
        <li class="treeview">
          <a href="#" style="color:aqua">
            <i class="fa fa-bars"></i>
            <span>Data Program Kerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=proker&jenis=Diusulkan" style="color:aqua"><i class="fa fa-book"></i>Diusulkan Bidang</a></li>
            <li><a href="?a=proker&jenis=Ditentukan" style="color:aqua"><i class="fa fa-book"></i>Tugaskan Ke Bidang</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=laporan_pendistribusian&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan Proker</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Chat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=chat_personal"><i class="fa fa-book"></i>Personal</a></li>
            <li><a href="?a=chat_group"><i class="fa fa-book"></i>Group</a></li>
          </ul>
        </li>

      <?php }
      else if($bidang==6){ ?>
        <li class="header">Menu Bidang Sarana Prasarana</li>
        <li><a href="?a=sarana_prasarana" style="color:aqua"><i class="fa fa-book"></i>Sarana Prasarana</a></li>
        <li><a href="?a=notifikasi"><i class="fa fa-book"></i>Notifikasi</a></li>
        <li><a href="?a=proker"><i class="fa fa-book"></i>Proker Bidang</a></li>
        <li><a href="?a=peminjaman"><i class="fa fa-book"></i>Peminjaman</a></li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=laporan_peminjaman&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i>Laporan Peminjaman</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Chat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=chat_personal"><i class="fa fa-book"></i>Personal</a></li>
            <li><a href="?a=chat_group"><i class="fa fa-book"></i>Group</a></li>
          </ul>
        </li>
      <?php } ?>
        <li><a href="?a=pengadaan"><i class="fa fa-book"></i>Pengadaan</a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title" id="judul_konten">Wellcome To Administrator Page</h3>
              <h3 class="box-title" id="btn_tambah" style="float:right;"></h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body" >
             <?php 
             include "konten.php" ;
             ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/adminlte/dist/js/demo.js"></script>
<!-- page script -->






<!-- fullCalendar -->
<script src="../../assets/adminlte/bower_components/moment/moment.js"></script>
<script src="../../assets/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>






<script>
  $(function () {
    $('#example1').DataTable();
    $('#example2').DataTable();
    $('#example3').DataTable();
    $('#tabelscrol').DataTable( {
    "scrollX": true
    } );
   
  })
</script>
</body>
</html>

<?php } ?>