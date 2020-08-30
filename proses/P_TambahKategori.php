<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Kategori = strtoupper($_POST['Kd_Kategori']);
        $Nm_Kategori = strtoupper($_POST['Nm_Kategori']);
        $_SESSION['Kd_Kategori'] = $Kd_Kategori;
        $_SESSION['Nm_Kategori'] = $Nm_Kategori;
        if(empty($Kd_Kategori) || empty($Nm_Kategori)){
            header('location:../views/admin/b_tambah_kategori.php?pesan=MasihKosong');
            //echo $_SESSION['Kd_Kategori'];
        }else{
            include '../connection/koneksi.php';
            $Data = mysqli_query($koneksi,"SELECT * FROM t_kategori_buku WHERE Kd_Kategori = '$Kd_Kategori'");
            $cek = mysqli_num_rows($Data);
            if($cek == 1){
                header('location:../views/admin/v_tambah_kategori.php?pesan=KdAda');
            }else{
                unset($_SESSION['Kd_Kategori']);
                unset($_SESSION['Nm_Kategori']);
                $query2 = "INSERT INTO t_kategori_buku VALUES(                
                    '$Kd_Kategori',
                    '$Nm_Kategori'
                )";
                $cek2 = mysqli_query($koneksi, $query2);
                if($cek2==1){
                    header('location:../views/admin/v_data_kategori.php?pesan=input');
                } else {
                    header('location:../views/admin/v_tambah_kategori.php?pesan=gagal');
                }   
            }
        }
    }
?>