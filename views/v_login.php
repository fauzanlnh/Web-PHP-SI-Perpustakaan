<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPAS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="../dist/img/AdminLTELogo.png" rel="shortcut icon">
</head>

<body class="hold-transition login-page">
    <?php
    if($_SERVER['REMOTE_ADDR']=="5.189.147.47"){
        ?>
        <div>
        Username : PGWI-001<br>
        Password : ADMIN
        </div>
        <?php
        }
        ?>
        <?php
        if($_SERVER['REMOTE_ADDR'] =="139.228.116.12"){
        ?>
        <div>
        Username : PGWI-001<br>
        Password : ADMIN
        </div>
        <?php
        }
        ?>
        <?php
        if($_SERVER['REMOTE_ADDR'] =="139.228.116.12"){
        ?>
        <div>
        Username : PGWI-001<br>
        Password : ADMIN
        </div>
        <?php
        }
        ?>
        
    <div class="login-box">
        <div class="login-logo">
            </a><b>Sistem Informasi</b> Perpustakaan
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="../proses/P_CekLogin.php" method="post">
                    <div class="input-group mb-3">
                        <?php
                            session_start();
                            if(isset($_GET['pesan'])){
                                $pesan = $_GET['pesan'];
                                if($pesan == 'MasihKosong' || $pesan=='PasswordSalah' || $pesan== 'HarusLogin' ){
                                    if(empty($_SESSION['username'])){
                                        echo"<input type='text' class='form-control is-invalid' placeholder='Masukkan Username' name='username'>
                                        <div class='input-group-append'>
                                            <div class='input-group-text'>
                                                <span class='fas fa-envelope'></span>
                                            </div>
                                        </div>";
                                    }else{
                                        echo"<input type='text' class='form-control' placeholder='Masukkan Username' name='username' value='".$_SESSION['username']."'>
                                        <div class='input-group-append'>
                                            <div class='input-group-text'>
                                                <span class='fas fa-envelope'></span>
                                            </div>
                                        </div>";
                                    }
                                }else if($pesan=='UsernameTidakAda'){
                                    echo"<input type='text' class='form-control is-invalid' placeholder='Masukkan Username' name='username' value='".$_SESSION['username']."'>
                                    <div class='input-group-append'>
                                        <div class='input-group-text'>
                                            <span class='fas fa-envelope'></span>
                                        </div>
                                    </div>";
                                }
                            }else{
                        ?>
                        <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="input-group mb-3">
                        <?php
                            if(isset($_GET['pesan'])){
                                $pesan = $_GET['pesan'];
                                if($pesan == 'MasihKosong' || $pesan== 'HarusLogin'){
                                    if(empty($_SESSION['password'])){
                                        echo"<input type='password' class='form-control is-invalid' placeholder='Masukkan Password' name='password'>
                                        <div class='input-group-append'>
                                            <div class='input-group-text'>
                                                <span class='fas fa-lock'></span>
                                            </div>
                                        </div>";
                                    }else{
                                        echo"<input type='password' class='form-control is-invalid' placeholder='Masukkan Password' name='password' value ='".$_SESSION['password']."'>
                                        <div class='input-group-append'>
                                            <div class='input-group-text'>
                                                <span class='fas fa-lock'></span>
                                            </div>
                                        </div>";
                                    }
                                }else if($pesan=='PasswordSalah'){
                                    echo"<input type='password' class='form-control is-invalid' placeholder='Masukkan Password' name='password'>
                                    <div class='input-group-append'>
                                        <div class='input-group-text'>
                                            <span class='fas fa-lock'></span>
                                        </div>
                                    </div>";
                                }else if($pesan=='UsernameTidakAda'){
                                    echo"<input type='password' class='form-control' placeholder='Masukkan Password' name='password'>
                                    <div class='input-group-append'>
                                        <div class='input-group-text'>
                                            <span class='fas fa-lock'></span>
                                        </div>
                                    </div>";
                                }
                            }else{
                        ?>
                        <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <?php
                            }
                         ?>
                    </div>
                    <?php 
                  if(isset($_GET['pesan'])){
                    $pesan = $_GET['pesan'];
                    if($pesan == "MasihKosong"){
                      echo "<div class='alert alert-danger' role='alert'>Username atau passsword masih kosong.</div>";
                    }else if($pesan == "UsernameTidakAda"){
                            echo "<div class='alert alert-danger' role='alert'>Username yang dimasukkan salah.</div>";
                    }else if($pesan == "PasswordSalah"){
                            echo "<div class='alert alert-danger' role='alert'>Password yang dimasukkan  Salah.</div>";
                    }else if($pesan == "HarusLogin"){
                            echo "<div class='alert alert-danger' role='alert'>Session Login Telah Di Reset<br>Harap Login Terlebih Dahulu</div>";
                    }
                  }
              ?>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            <input type="button" class="btn btn-danger btn-block" onclick="Kembali()" value="Cancel">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <script>
        function Kembali() {
            location.href = "../Index.php";
        }
    </script>
</body>

</html>