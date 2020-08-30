<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPAS | Form Ubah Profile</title>
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
  <link href="../../dist/img/AdminLTELogo.png" rel="shortcut icon">
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
          <a href="dashboard_admin.php" class="nav-link">Home</a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">Sistem Informasi Perpustakaan</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Perpustakaan</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php
            session_start();
            if($_SESSION['status'] != 'Login'){
              header("location:../v_login.php?pesan=HarusLogin");
            }
            include '../../connection/koneksi.php';
            $data = mysqli_query($koneksi,"select * from t_pegawai where username = '".$_SESSION['username']."'"); 
            $cek = mysqli_num_rows($data);
            if($cek > 0){
            $data = mysqli_fetch_assoc($data);
          ?>
          <div class="image">
            <img src="../../dist/img/<?php echo $data['foto'] ?>" class="img-circle elevation-2" alt="User Image" width="128" heigh="128">  
          </div>
          <div class="info">
            <a href="v_ubah_profile.php" class="d-block"><?php echo $data['nama_pegawai']?></a>
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
              <a href="dashboard_admin.php" class="nav-link">
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
                  <a href="v_tambah_anggota.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Anggota</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_data_anggota.php" class="nav-link">
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
                  <a href="v_tambah_buku.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Buku</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_tambah_kategori.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_data_buku.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Buku</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_data_buku_hilang.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Buku Hilang/Rusak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_data_kategori.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kategori</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-plus-circle"></i>
                <p>
                  Transaksi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="v_tambah_peminjaman.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Peminjaman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_tambah_pengembalian.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Pengembalian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_data_peminjaman.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Peminjaman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_data_pengembalian.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pengembalian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_data_pengembalian_denda.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pengembalian Bayar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_data_pengembalian_gantibuku.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengembalian Ganti Buku</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Setting
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="v_ubah_profile.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ubah Profile</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_tambah_user.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Pegawai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="v_data_pegawai.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pegawai</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
            <a href="../../proses/P_Logout.php"  class="nav-link" onclick="return confirm('Anda Akan Logout')">
                <i class="nav-icon fas fa-lock"></i>
                  <p>
                  Logout
                </p>
              </a>
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
              <h1 class="m-0 text-dark">Form Ubah Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard_admin.php">Home</a></li>
                <li class="breadcrumb-item active">Setting / Ubah Profile</li>
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
            <h3 class="card-title">Ubah Profile</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php 
                  if(isset($_GET['pesan'])){
                    $pesan = $_GET['pesan'];
                    if($pesan == "update"){
                            echo "<div class='alert alert-primary' role='alert'>Data berhasil di ubah.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button></div>";
                    }else if($pesan == "fotoubah"){
                      echo "<div class='alert alert-primary' role='alert'>Foto berhasil di ubah.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                      </button></div>";
                    }else if($pesan == "gagalfotoubah"){
                      echo "<div class='alert alert-primary' role='alert'>Foto gagal di ubah.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                      </button></div>";
                    }
                  }
                ?>
            <div class="row">
              <div class="col-md-6">
              <form role="form" method="post" action="../../proses/P_UbahProfile.php" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group" style="text-align:center">
                    <div>
                      <img src="../../dist/img/<?php echo $data['foto'] ?>" alt="User Image" >  
                    </div>
                    <div>
                      <a href="v_ubahfoto.php?kd_pegawai=<?php echo$data['kd_pegawai']?>">Ubah Foto</a>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for='exampleInputEmail'>Kode Pegawai - Username</label>
                    <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Kategori' name='kd_pegawai' value ='<?php echo $data['kd_pegawai'] ?>'readonly>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan =="fotoubah"){
                          echo"<label for='exampleInputEmail'>Nama Pegawai</label>";
                          echo"<input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Kategori' name='nama_pegawai' value ='".$data['nama_pegawai']."' pattern='[A-Za-z ]+'title='Hanya Boleh Memasukkan Huruf'>";
                        }else if(empty($_SESSION['nama_pegawai'])){
                          echo"<label for='exampleInputEmail'>Nama Pegawai</label>";
                          echo"<input type='text' class='form-control is-invalid' id='exampleInputEmail' placeholder='Masukkan Nama Kategori' name='nama_pegawai' value ='".$_SESSION['nama_pegawai']."' pattern='[A-Za-z ]+'title='Hanya Boleh Memasukkan Huruf'>";
                        }else{
                          echo"<label for='exampleInputEmail'>Nama Pegawai</label>";
                          echo"<input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Kategori' name='nama_pegawai' value ='".$data['nama_pegawai']."' pattern='[A-Za-z ]+'title='Hanya Boleh Memasukkan Huruf'>";
                        }
                      }else{
                      
                    ?>
                    <label for='exampleInputEmail'>Nama Pegawai</label>
                    <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Kategori' name='nama_pegawai' value ='<?php echo $data['nama_pegawai'] ?>' pattern='[A-Za-z ]+'title='Hanya Boleh Memasukkan Huruf'>
                    <?php
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan =="fotoubah"){
                          echo"<label for='exampleInputEmail'>Nama Pegawai</label>";
                          echo"<input type='text' class='form-control ' id='exampleInputEmail' placeholder='Masukkan Nama Email' name='nama_pegawai' value ='".$data['email']."'>";
                        }else if(empty($_SESSION['nama_pegawai'])){
                          echo"<label for='exampleInputEmail'>Email</label>";
                          echo"<input type='text' class='form-control is-invalid' id='exampleInputEmail' placeholder='Masukkan Email' name='email' value ='".$_SESSION['email']."'>";
                        }else{
                          echo"<label for='exampleInputEmail'>Email</label>";
                          echo"<input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Email' name='email' value ='".$data['email']."'>";
                        }
                      }else{
                      
                    ?>
                    <label for='exampleInputEmail'>Email</label>
                    <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Email' name='email' value ='<?php echo $data['email'] ?>'>
                    <?php
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for='exampleInputEmail'>Password</label>
                    <input type='password' class='form-control' id='exampleInputEmail' placeholder='Masukkan Password Jika Akan Merubah Password' name='Password'>
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
    $.widget.bridge('uibutton', $.ui.button)
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