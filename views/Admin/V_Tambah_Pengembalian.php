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

<body class="hold-transition sidebar-mini layout-fixed" onload="setTampilan()">
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
                  <a href="V_Tambah_Peminjaman.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Peminjaman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
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
                <li class="breadcrumb-item active">Form Pengembalian</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Pengembalian Buku</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="../../proses/P_TambahPengembalian.php">
                <div class="card-body">
                  <div class="form-group">
                <div class="card-body">
                  <label>Kode Peminjaman</label>
                  <?php
                    if(isset($_GET['pesan'])){
                      $pesan = $_GET['pesan'];
                      if($pesan =="MasihKosong"){
                        echo"Pilih Kode Peminjaman, Lalu klik tombol pilih";
                      }
                    }
                  ?>  
                  <div class="form-group input-group">
                    <select class="form-control select2" style="width: 100%;" name="Kd_Peminjaman">
                      <?php
                        include '../connection/koneksi.php';
                        $Data = mysqli_query($koneksi, "SELECT * FROM T_Peminjaman WHERE Status_Peminjaman = 'DIPINJAM'");
                        while($result = mysqli_fetch_array($Data)){
                      ?>
                      <option value="<?php echo $result['Kd_Peminjaman'];?>"> <?php echo $result['Kd_Peminjaman'] .""?></option>
                      <?php
                        }
                      ?>
                    </select>
                    <span class="input-group-append">
                      <input type="submit" class="btn btn-primary" value="Pilih" name="pilih" formaction="../../Proses/P_Pilih_KdPeminjaman.php">
                    </span>  
                  </div>
                  <div class="form-group">
                  <label>Cara Pengembalian</label>
                    <select class="form-control select2" style="width: 100%;" name="Pengembalian" onchange="setTampilan()"  id="CaraPengembalian">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan=="PilihKdPeminjaman"){
                          if($_SESSION['CaraPengembalian'] == 'Buku Dikembalikan'){
                            echo"<option selected>Buku Dikembalikan</option>  
                            <option>Hilang - Ganti Dengan Buku Baru</option>
                            <option>Hilang - Ganti Dengan Uang</option>";
                          }else if($_SESSION['CaraPengembalian'] == 'Hilang - Ganti Dengan Buku Baru'){
                            echo"<option>Buku Dikembalikan</option>  
                            <option selected>Hilang - Ganti Dengan Buku Baru</option>
                            <option>Hilang - Ganti Dengan Uang</option>";
                          }else if($_SESSION['CaraPengembalian'] == 'Hilang - Ganti Dengan Uang'){
                            echo"<option>Buku Dikembalikan</option>  
                            <option>Hilang - Ganti Dengan Buku Baru</option>
                            <option selected>Hilang - Ganti Dengan Uang</option>";
                          }
                        }else if($pesan=="MasihKosong"){
                          if($_SESSION['CaraPengembalian'] == 'Buku Dikembalikan'){
                            echo"<option selected>Buku Dikembalikan</option>  
                            <option>Hilang - Ganti Dengan Buku Baru</option>
                            <option>Hilang - Ganti Dengan Uang</option>";
                          }else if($_SESSION['CaraPengembalian'] == 'Hilang - Ganti Dengan Buku Baru'){
                            echo"<option>Buku Dikembalikan</option>  
                            <option selected>Hilang - Ganti Dengan Buku Baru</option>
                            <option>Hilang - Ganti Dengan Uang</option>";
                          }else if($_SESSION['CaraPengembalian'] == 'Hilang - Ganti Dengan Uang'){
                            echo"<option>Buku Dikembalikan</option>  
                            <option>Hilang - Ganti Dengan Buku Baru</option>
                            <option selected>Hilang - Ganti Dengan Uang</option>";
                          }
                        }
                      }else{
                        echo"<option selected>Buku Dikembalikan</option>  
                            <option>Hilang - Ganti Dengan Buku Baru</option>
                            <option>Hilang - Ganti Dengan Uang</option>";
                      }
                    ?>
                    </select>
                  </div>
                  <!-- Date -->
                  <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <div class='input-group date'>
                      <?php
                        $Data = mysqli_query($koneksi, "SELECT NOW() AS 'HariIni'");
                        if($result = mysqli_fetch_array($Data)){
                          $Tanggal = strtotime($result['HariIni']);
                          $Tanggal_PHP = date( 'Y-m-d', $Tanggal );
                          echo"<input type='date' class='form-control datetimepicker-input' name='Tanggal' value='".$Tanggal_PHP."' readonly>";
                        }
                      ?>
                      </div>
                  </div>
                  <div class='form-group'>
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan=="PilihKdPeminjaman"){
                          echo"<label for='exampleInputPassword1'>Kode Anggota</label>
                              <input type='text' class='form-control' id='exampleInputPassword1' name='Kd_Anggota' value='".$_SESSION['setKdAnggota']."' readonly>";
                        }else{
                          echo"<label for='exampleInputPassword1'>Kode Anggota</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Kode Anggota' name='Kd_Anggota' readonly>";
                        }
                      }else{
                        echo"<label for='exampleInputPassword1'>Kode Anggota</label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Kode Anggota' name='Kd_Anggota' readonly>";
                      }
                    ?>
                  </div>
                  <div class='form-group'>
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan=="PilihKdPeminjaman"){
                          echo"<label for='exampleInputPassword1'>Kode Buku</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' name='Kd_Buku' value='".$_SESSION['setKdBuku']."' readonly>";
                        }else{
                          echo"<label for='exampleInputPassword1'>Kode Buku</label>
                              <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Kode Buku' name='Kd_Buku' readonly>";
                        } 
                      }else{
                        echo"<label for='exampleInputPassword1'>Kode Buku</label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Kode Buku' name='Kd_Buku' readonly>";
                      }
                    ?>
                  </div>
                  <div class='form-group'>
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan=="PilihKdPeminjaman"){
                          echo"<label for='exampleInputPassword1'>Judul Buku</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' name='Jdl_Buku' value='".$_SESSION['setJudul']."' readonly>";
                        }else{
                          echo"<label for='exampleInputPassword1'>Judul Buku</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Judul Buku' name='Jdl_Buku' readonly>";
                        }
                      }else{
                        echo"<label for='exampleInputPassword1'>Judul Buku</label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Judul Buku' name='Jdl_Buku' readonly>";
                      }
                    ?>
                  </div>
                  <div class='form-group' id="HargaBuku" style="display :none">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan=="PilihKdPeminjaman"){
                          echo"<label for='exampleInputPassword1'>Harga Buku</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' name='Harga_Buku' value='".$_SESSION['setHarga']."' readonly>";
                        }else{
                          echo"<label for='exampleInputPassword1'>Harga Buku</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Harga Buku' name='Harga_Buku' readonly>";
                        }
                      }else{
                        echo"<label for='exampleInputPassword1'>Harga Buku</label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Harga Buku' name='Harga_Buku' readonly>";
                      }
                    ?>
                  </div>
                  <div class='form-group'>
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan=="PilihKdPeminjaman"){
                          echo"<label for='exampleInputPassword1'>Telat Pengembalian</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' name='Telat' value='".$_SESSION['setTelat']."' readonly>";
                        }else{
                          echo"<label for='exampleInputPassword1'>Telat Pengembalian</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Keterlambatan Pengembalian' name='Telat' readonly>";
                        }
                      }else{
                        echo"<label for='exampleInputPassword1'>Telat Pengembalian</label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Keterlambatan Pengembalian' name='Telat' readonly>";
                      }
                    ?>
                  </div>
                  <div class='form-group'>
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan=="PilihKdPeminjaman"){
                          echo"<label for='exampleInputPassword1'>Denda</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' name='Denda' value='".$_SESSION['setDenda']."' readonly>";
                        }else{
                          echo"<label for='exampleInputPassword1'>Denda</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Denda Keterlambatan' name='Denda' readonly>";
                        }
                      }else{
                        echo"<label for='exampleInputPassword1'>Denda</label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Denda Keterlambatan' name='Denda' readonly>";
                      }
                    ?>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- /.row -->

            <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="Simpan">Submit</button>
          </div>
          </form>
          </div>
          <!-- /.card-body -->          
        </div>
        <div class="col-md-6" id="GantiBuku" style="display:none;">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Buku Baru</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                    <?php
                      include "../../connection/koneksi.php";
                      $Data = mysqli_query($koneksi,"SELECT (Kd_Buku) FROM T_Buku ORDER BY Kd_Buku DESC LIMIT 1");
                      if($result = mysqli_fetch_array($Data)){
                        $Kd_Buku= $result['Kd_Buku'] +1;
                      }
                    ?>
                    <label for="exampleInputKd">Kode Buku</label>
                    <input type="text" class="form-control" id="exampleInputKd" value="<?php echo $Kd_Buku?>" name="Kd_Buku" readonly>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "MasihKosong"){
                          if(empty($_SESSION['Jdl_Buku'])){
                            echo"<label for='inputError1'>Judul Buku</label>
                            <input type='text' class='form-control is-invalid' id='inputError1' placeholder='Masukkan Judul Buku' name='Jdl_Buku'>";
                          }else{
                            echo"<label for='exampleInputPassword1'>Judul Buku</label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Judul Buku1' name='Jdl_Buku' value = '".$_SESSION['Jdl_Buku']."''>";  
                          }
                        }else if($pesan == 'PilihKdPeminjaman'){
                          echo"<label for='exampleInputPassword1'>Judul Buku</label>
                          <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Judul Buku1' name='Jdl_Buku' value = '".$_SESSION['Jdl_Buku']."''>";
                        }
                      }else{
                        echo"<label for='exampleInputPassword1'>Judul Buku</label>
                        <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Judul Buku' name='Jdl_Buku'>";
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "MasihKosong"){
                          if(empty($_SESSION['Nm_Pengarang'])){
                            echo"<label for='inputError2'>Nama Pengarang</label>
                            <input type='text' class='form-control is-invalid' id='inputError2' placeholder='Masukkan Nama Pengarang' name='Nm_Pengarang'>";
                          }else{
                            echo"<label for='exampleInputEmail'>Nama Pengarang</label>
                            <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Pengarang' name='Nm_Pengarang'value=".$_SESSION['Nm_Pengarang'].">";
                          }
                        }else if($pesan == 'PilihKdPeminjaman'){
                          echo"<label for='exampleInputEmail'>Nama Pengarang</label>
                            <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Pengarang' name='Nm_Pengarang'value=".$_SESSION['Nm_Pengarang'].">";
                        }
                      }else{
                        echo"<label for='exampleInputEmail'>Nama Pengarang</label>
                        <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Pengarang' name='Nm_Pengarang'>";
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "MasihKosong"){
                          if(empty($_SESSION['Nm_Penerbit'])){
                            echo"<label for='inputError2'>Nama Penerbit</label>
                            <input type='text' class='form-control is-invalid' id='inputError2' placeholder='Masukkan Nama Penerbit' name='Nm_Penerbit'>";
                          }else{
                            echo"<label for='exampleInputEmail'>Nama Penerbit</label>
                            <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Penerbit' name='Nm_Penerbit'value=".$_SESSION['Nm_Penerbit'].">";
                          }
                        }else if($pesan == 'PilihKdPeminjaman'){
                          echo"<label for='exampleInputEmail'>Nama Penerbit</label>
                            <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Penerbit' name='Nm_Penerbit'value=".$_SESSION['Nm_Penerbit'].">";
                        }
                      }else{
                        echo"<label for='exampleInputEmail'>Nama Penerbit</label>
                        <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Penerbit' name='Nm_Penerbit'>";
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <label>Kategori Buku</label>
                    <select class="form-control select2" style="width: 100%;" name="Kategori_Buku">
                      <?php
                        include '../connection/koneksi.php';
                        $Data = mysqli_query($koneksi, "SELECT * FROM T_Kategori_buku");
                        while($result = mysqli_fetch_array($Data)){
                          if(isset($_GET['pesan'])){                   
                            $pesan = $_GET['pesan'];
                            if($pesan == "MasihKosong"){
                              if(empty($_SESSION['Kategori_Buku'])){
                                echo"<option value='".$result['Kd_Kategori']."'>";
                                echo $result['Nama_Kategori'];
                                echo"</option>";
                              }else{
                                if($_SESSION['Kategori_Buku'] ==$result['Kd_Kategori']){
                                  $select="selected";
                                }else{
                                  $select="";
                                }
                                echo"<option $select value='".$result['Kd_Kategori']."'>";
                                  echo $result['Nama_Kategori'];
                                  echo"</option>";
                              }
                            }else{
                              if($_SESSION['Kategori_Buku'] ==$result['Kd_Kategori']){
                                $select="selected";
                              }else{
                                $select="";
                              }
                              echo"<option $select value='".$result['Kd_Kategori']."'>";
                                echo $result['Nama_Kategori'];
                                echo"</option>";
                            }
                          }else{
                                ?>
                                <option value="<?php echo $result['Kd_Kategori'];?>"> <?php echo $result['Nama_Kategori'];?></option>
                                <?php
                              }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "MasihKosong"){
                          if(empty($_SESSION['Thn_Terbit'])){
                            echo"<label for='inputError2'>Tahun Terbit</label>
                            <input type='number' class='form-control is-invalid' id='inputError2' placeholder='Masukkan Tahun Terbit' name='Thn_Terbit' min='1900' max='2100' >";
                          }else{
                            echo"<label for='exampleInputEmail'>Tahun Terbit</label>
                            <input type='number'class='form-control' id='exampleInputEmail' placeholder='Masukkan Tahun Terbit' name='Thn_Terbit' value=".$_SESSION['Thn_Terbit']." min='1900' max='2100' >";
                          }
                        }else if($pesan == 'PilihKdPeminjaman'){
                          echo"<label for='exampleInputEmail'>Tahun Terbit</label>
                            <input type='number'class='form-control' id='exampleInputEmail' placeholder='Masukkan Tahun Terbit' name='Thn_Terbit' value=".$_SESSION['Thn_Terbit']." min='1900' max='2100' >";
                        }
                      }else{
                        echo"<label for='exampleInputEmail'>Tahun Terbit</label>
                        <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan Tahun Terbit' name='Thn_Terbit'min = '1900' max='2100'>";
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "MasihKosong"){
                          if(empty($_SESSION['No_Rak'])){
                            echo"<label for='inputError2'>No Rak</label>
                            <input type='number' class='form-control is-invalid' id='inputError2' placeholder='Masukkan No Rak' name='No_Rak' min='1' max='30' >";
                          }else{
                            echo"<label for='exampleInputEmail'>No Rak</label>
                            <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan No Rak' name='No_Rak'value=".$_SESSION['No_Rak']." min='1' max='30' >";
                          }
                        }else if($pesan == 'PilihKdPeminjaman'){
                          echo"<label for='exampleInputEmail'>No Rak</label>
                            <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan No Rak' name='No_Rak'value=".$_SESSION['No_Rak']." min='1' max='30' >";
                        }
                      }else{
                        echo"<label for='exampleInputEmail'>No Rak</label>
                        <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan No Rak' name='No_Rak' min='1' max='30' >";
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "MasihKosong"){
                          if(empty($_SESSION['No_Rak'])){
                            echo"<label for='inputError2'>Harga</label>
                            <input type='number' class='form-control is-invalid' id='inputError2' placeholder='Masukkan Harga' name='Harga'>";
                          }else{
                            echo"<label for='exampleInputEmail'>Harga</label>
                            <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan Harga' name='Harga'value=".$_SESSION['Harga'].">";
                          }
                        }else if($pesan == 'PilihKdPeminjaman'){
                          echo"<label for='exampleInputEmail'>Harga</label>
                            <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan Harga' name='Harga'value=".$_SESSION['Harga'].">";
                        }
                      }else{
                        echo"<label for='exampleInputEmail'>Harga</label>
                        <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan Harga' name='Harga'>";
                      }
                    ?>
                  </div>
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
  <script>
  function setTampilan() {
    var x = document.getElementById("CaraPengembalian").value;
    if(x == 'Hilang - Ganti Dengan Uang'){
      document.getElementById("HargaBuku").style.display = "block";
      document.getElementById("GantiBuku").style.display = "none";
    }else if(x == "Hilang - Ganti Dengan Buku Baru"){
      document.getElementById("GantiBuku").style.display = "block";
      document.getElementById("HargaBuku").style.display = "none";
    }else{
      document.getElementById("HargaBuku").style.display = "none";
      document.getElementById("GantiBuku").style.display = "none";
    }
}
  </script>
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