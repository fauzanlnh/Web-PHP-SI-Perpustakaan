<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="Dashboard_Admin.php" class="nav-link">Home</a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../proses/P_Logout.php" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Perpustakaan</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php
            session_start();
            include '../../connection/koneksi.php';
            $data = mysqli_query($koneksi,"select * from t_pegawai where username = '".$_SESSION['username']."'"); 
            $cek = mysqli_num_rows($data);
            if($cek > 0){
            $data = mysqli_fetch_assoc($data);
          ?>
          
          <div class="image">
            <img src="../../dist/img/<?php echo $data['foto'] ?>" class="img-circle elevation-2" alt="User Image">  
          </div>
          <div class="info">
            <a href="V_Ubah_Profile.php" class="d-block"><?php echo $data['nama_pegawai']?></a>
          </div>
          <?php
            }
          ?>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="Dashboard_Admin.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Anggota
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="V_Tambah_Anggota.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Anggota</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="V_Data_anggota.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Anggota</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Buku
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="V_Tambah_Buku.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Buku</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="V_Data_Buku.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Buku</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-plus-circle"></i>
                <p>
                  Transaksi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Peminjaman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="V_Tambah_Pengembalian.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Pengembalian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="V_Data_Peminjaman.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Peminjaman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="V_Data_Pengembalian.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pengembalian</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Setting
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="V_Ubah_Profile.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ubah Profile</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="V_Tambah_User.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="V_Ganti_Password.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ganti Password</p>
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard_Admin.php">Home</a></li>
                <li class="breadcrumb-item active">Form Peminjaman</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
      <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Form tambah peminjaman</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <form role="form" method="post" action="../../proses/P_TambahPeminjaman.php">
                <div class="card-body">
                  <div class="form-group">
                    <?php
                      include "../../connection/koneksi.php";
                      $Data = mysqli_query($koneksi,"SELECT YEAR(NOW()) AS 'TAHUN', MONTH(NOW()) AS 'BULAN'");
                      if($result = mysqli_fetch_array($Data)){
                        $Tahun = $result['TAHUN'];
                        $Bulan = $result['BULAN'];
                      }
                      $getTanggal = $Tahun."".$Bulan;
                      $Data2 = mysqli_query($koneksi,"SELECT (Kd_Peminjaman) FROM T_Peminjaman WHERE Kd_Peminjaman LIKE '%$getTanggal%' ORDER BY Kd_Peminjaman DESC LIMIT 1");
                      if($result2 = mysqli_fetch_array($Data2)){
                        $Kd_Peminjaman= $result2['Kd_Peminjaman'];
                      }else{
                        $Kd_Peminjaman = $getTanggal .".000";
                      }
                      $pisah = explode("-",$Kd_Peminjaman);
                      $bagian2 = end($pisah) + 1;
                      if(strlen($bagian2) == 1){
                        $setKdPeminjaman = $getTanggal ."-00". $bagian2;
                      }else if(strlen($bagian2) == 2){
                        $setKdPeminjaman = $getTanggal ."-0". $bagian2;
                      }else if(strlen($bagian2) == 3){
                        $setKdPeminjaman = $getTanggal ."-". $bagian2;
                      }
                      
                    ?>
                    <label for="exampleInputKd">Kode Peminjaman</label>
                    <input type="text" class="form-control" id="exampleInputKd" value="<?php echo $setKdPeminjaman?>" name="Kd_Peminjaman" readonly>
                  </div>
                  <!-- Date -->
                  <div class="form-group">
                  <?php
                      if(isset($_GET['pesan'])){
                        $Tanggal = strtotime($_SESSION['Tanggal']);
                        $Tanggal_PHP = date( 'Y-m-d', $Tanggal );
                        $pesan = $_GET['pesan'];
                        if($pesan == "MasihKosong" || $pesan == "KdTidakAda"){
                          if(($_SESSION['Tanggal']) == '1970-01-01'){
                            echo"<label>Tanggal Pinjam</label>
                            <div class='input-group date'>
                              <input type='date' class='form-control is-invalid datetimepicker-input' name='Tanggal'>
                            </div>";
                          }else{
                            echo"<label>Tanggal Pinjam:</label>
                                <div class='input-group date'>
                                <input type='date' class='form-control datetimepicker-input' name='Tanggal' value='".$Tanggal_PHP."'>
                                </div>";
                          }
                        }
                      }else{
                        $Data = mysqli_query($koneksi, "SELECT NOW() AS 'HariIni'");
                          if($result = mysqli_fetch_array($Data)){
                            $Tanggal = strtotime($result['HariIni']);
                            $Tanggal_PHP = date( 'Y-m-d', $Tanggal );
                            echo"<label>Tanggal Pinjam:</label>
                              <div class='input-group date'>
                              <input type='date' class='form-control datetimepicker-input' name='Tanggal' value='".$Tanggal_PHP."'>
                              </div>";
                            }
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "MasihKosong"){
                          if(empty($_SESSION['Kd_Anggota'])){
                            echo"<label for='inputError1'>Kode Anggota</label>
                            <input type='text' class='form-control is-invalid' id='inputError1' placeholder='Masukkan Kode Anggota' name='Kd_Anggota'>";
                          }else{
                            echo"<label for='exampleInputPassword1'>Kode Anggota</label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Kode Anggota' name='Kd_Anggota' value= '".$_SESSION['Kd_Anggota']."''>";
                          }
                        }else if($pesan == "KdTidakAda"){
                          echo"<label for='inputError1'>Kode Anggota</label><br>
                          Kode Anggota Salah
                          <input type='text' class='form-control is-invalid' id='inputError1' placeholder='Masukkan Kode Anggota' name='Kd_Anggota'>";
                        }
                      }else{
                        echo"<label for='exampleInputPassword1'>Kode Anggota</label>
                        <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Kode Anggota' name='Kd_Anggota'>";
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <label>Kode Buku</label>
                    <?php
                      if(isset($_GET['pesan'])){                                             
                        echo"Pilih kembali Kode Buku buku";
                      }
                    ?>
                    <select class="form-control select2" style="width: 100%;" name="Kd_Buku">
                      <?php
                        include '../connection/koneksi.php';
                        $Data = mysqli_query($koneksi, "SELECT * FROM T_Buku WHERE  Status = 'TERSEDIA'");
                        while($result = mysqli_fetch_array($Data)){
                      ?>
                      <option value="<?php echo $result['Kd_Buku'];?>"> <?php echo $result['Kd_Buku'] ." - ". $result['Judul_Buku'];?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <strong>Copyright &copy; Fauzan Lukmanul Hakim | Template AdminLTE V3.0.5 By <a
          href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
    //Date range picker
  </script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../plugins/moment/moment.min.js"></script>
  <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../../dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
</body>

</html>