<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPAS | Form Ubah Data Buku</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
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
                  <a href="v_data_buku" class="nav-link">
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
                  <a href="v_ubah_profile.php" class="nav-link">
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
              <h1 class="m-0 text-dark">Ubah Data Buku</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard_admin.php">Home</a></li>
                <li class="breadcrumb-item active">Buku / Data Buku / Form Ubah Buku</li>
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
            <h3 class="card-title">Form Ubah buku</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <form role="form" method="post" action="../../proses/P_UbahBuku.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <?php
                    if(empty($_GET['pesan'])){
                      include "../../connection/koneksi.php";
                        $Kd_Buku = $_GET['Kd_Buku'];
                        $Query = "SELECT * FROM t_buku JOIN t_kategori_buku USING(Kd_Kategori) WHERE Kd_Buku ='$Kd_Buku'";
                        $Data = mysqli_query($koneksi, $Query);
                        if($result = mysqli_fetch_array($Data)){
                          $Kd_Buku = $result['Kd_Buku'];
                          $Jdl_Buku = $result['Judul_Buku'];
                          $Nm_Pengarang = $result['Nama_Pengarang'];
                          $Nm_Penerbit = $result['Nama_Penerbit'];
                          $Status = $result['Status'];
                          $Estimasi = strtotime($result['Estimasi_Pengembalian']);
                          $EstimasiPHP = date( 'Y-m-d', $Estimasi);
                          if($EstimasiPHP == '1970-01-01'){
                            $EstimasiPHP = null;
                          }
                          $Kd_Kategori = $result['Kd_Kategori'];
                          $Tahun_Terbit = $result['Tahun_Terbit'];
                          $No_Rak = $result['No_Rak'];
                          $Harga= $result['Harga'];
                        }
                      }else{
                        $Kd_Buku = "".$_SESSION['Kd_Buku'];
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
                        }
                      }else{
                        echo"<label for='exampleInputPassword1'>Judul Buku</label>
                        <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Judul Buku' name='Jdl_Buku' value= '".$Jdl_Buku."'>";
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
                            <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Pengarang' name='Nm_Pengarang'value= '".$_SESSION['Nm_Pengarang']."'>";
                          }
                        }
                      }else{
                        echo"<label for='exampleInputEmail'>Nama Pengarang</label>
                        <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Pengarang' name='Nm_Pengarang' value='".$Nm_Pengarang."'>";
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
                            <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Penerbit' name='Nm_Penerbit'value= '".$_SESSION['Nm_Penerbit']."'>";
                          }
                        }
                      }else{
                        echo"<label for='exampleInputEmail'>Nama Penerbit</label>
                        <input type='text' class='form-control' id='exampleInputEmail' placeholder='Masukkan Nama Penerbit' name='Nm_Penerbit' value='".$Nm_Penerbit."'>";
                      }
                    ?>
                  </div>
                  <?php
                    if(isset($_GET['pesan'])){
                      $Status = $_SESSION['Status'];
                    }
                    if($Status == 'DIPINJAM'){
                      echo"<div class='form-group' style='display:none'>
                      <input type='text' name='Status' value='DIPINJAM'>";
                    }else{
                      echo"<div class='form-group'>
                      <input type='text' name='Status' value='aa' hidden>";
                    }
                  ?>
                    <label>Status Buku</label>
                    <select class="form-control select2" style="width: 100%;" name="Status_Buku">
                      <?php
                          if(isset($_GET['pesan'])){                   
                            $pesan = $_GET['pesan'];
                            if($pesan == "MasihKosong"){
                              if($Status == "TERSEDIA"){
                                echo"<option selected>TERSEDIA</option>";
                              }else{
                                echo"<option>TERSEDIA</option>";
                              }
                              if($_SESSION['Status_Buku'] == "HILANG"){
                                echo"<option selected>HILANG</option>";
                              }else{
                                echo"<option>HILANG</option>";
                              }
                              if($_SESSION['Status_Buku'] == "RUSAK"){
                                echo"<option selected>RUSAK</option>";
                              }else{
                                echo"<option>RUSAK</option>";
                              }
                            }
                          }else{
                              if($Status == "TERSEDIA"){
                                echo"<option selected>TERSEDIA</option>";
                              }else{
                                echo"<option>TERSEDIA</option>";
                              }
                              if($Status == "HILANG"){
                                echo"<option selected>HILANG</option>";
                              }else{
                                echo"<option>HILANG</option>";
                              }
                              if($Status == "RUSAK"){
                                echo"<option selected>RUSAK</option>";
                              }else{
                                echo"<option>RUSAK</option>";
                              }
                          }
                          ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Estimasi Pengembalian</label>
                      <?php
                          if(isset($_GET['pesan'])){                   
                            $pesan = $_GET['pesan'];
                            if($pesan == "MasihKosong"){
                              if(empty($_SESSION['Estimasi'])){
                                echo"<div class='input-group date'>
                                <input type='date' class='form-control datetimepicker-input' name='Estimasi'>
                              </div>";
                              }else{
                                echo"<div class='input-group date'>
                              <input type='date' class='form-control datetimepicker-input' name='Estimasi' value='".$_SESSION['Estimasi']."'>
                            </div>";
                              }
                              
                            }
                          }else{
                            echo"<div class='input-group date'>
                              <input type='date' class='form-control datetimepicker-input' name='Estimasi' value='".$EstimasiPHP."'>
                            </div>";
                          }
                          ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kategori Buku</label>
                    <select class="form-control select2" style="width: 100%;" name="Kategori_Buku">
                      <?php
                        include '../connection/koneksi.php';
                        $Data = mysqli_query($koneksi, "SELECT * FROM t_kategori_buku");
                        while($result2 = mysqli_fetch_array($Data)){
                          if(isset($_GET['pesan'])){                   
                            $pesan = $_GET['pesan'];
                            if($pesan == "MasihKosong"){
                                if($_SESSION['Kategori_Buku'] == $result2['Kd_Kategori']){
                                  $select="selected";
                                }else{
                                  $select="";
                                }
                                echo"<option $select value='".$result2['Kd_Kategori']."'>";
                                  echo $result2['Nama_Kategori'];
                                  echo"</option>";
                            }
                          }else{
                            if($Kd_Kategori == $result2['Kd_Kategori']){
                              $select = "selected";
                            }else{
                              $select="";
                            }
                            echo"<option $select value='".$result2['Kd_Kategori']."'>";
                            echo $result2['Nama_Kategori'];
                            echo"</option>"; 
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
                            <input type='number'class='form-control' id='exampleInputEmail' placeholder='Masukkan Tahun Terbit' name='Thn_Terbit' value='".$_SESSION['Thn_Terbit']."' min='1900' max='2100' >";
                          }
                        }
                      }else{
                        echo"<label for='exampleInputEmail'>Tahun Terbit</label>
                        <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan Tahun Terbit' name='Thn_Terbit'min = '1900' max='2100' value = '".$Tahun_Terbit."'>";
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
                            <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan No Rak' name='No_Rak'value='".$_SESSION['No_Rak']."' min='1' max='30' >";
                          }
                        } 
                      }else{
                        echo"<label for='exampleInputEmail'>No Rak</label>
                        <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan No Rak' name='No_Rak' min='1' max='30' value = '".$No_Rak."'>";
                      }
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                      if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "MasihKosong"){
                          if(empty($_SESSION['Harga'])){
                            echo"<label for='inputError2'>Harga</label>
                            <input type='number' class='form-control is-invalid' id='inputError2' placeholder='Masukkan Harga' name='Harga'>";
                          }else{
                            echo"<label for='exampleInputEmail'>Harga</label>
                            <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan Harga' name='Harga'value='".$_SESSION['Harga']."'>";
                          }
                        }
                      }else{
                        echo"<label for='exampleInputEmail'>Harga</label>
                        <input type='number' class='form-control' id='exampleInputEmail' placeholder='Masukkan Harga' name='Harga'value = '".$Harga."'>";
                      }
                    ?>
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
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
