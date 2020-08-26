<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Kategori = strtoupper($_POST['Kd_Kategori']);
        $Nm_Kategori = strtoupper($_POST['Nm_Kategori']);
        $_SESSION['Kd_Kategori'] = $Kd_Kategori;
        $_SESSION['Nm_Kategori'] = $Nm_Kategori;
        if(empty($Kd_Kategori) || empty($Nm_Kategori)){
            header('location:../Views/Admin/V_Tambah_Kategori.php?pesan=MasihKosong');
            //echo $_SESSION['Kd_Kategori'];
        }else{
            $Data = mysqli_query($koneksi,"SELECT * FROM T_Kategori_Buku WHERE Kd_Kategori = '$Kd_Kategori'");
            $cek = mysqli_num_rows($Data);
            if($cek == 0){
                header('location:../Views/Admin/V_Tambah_Kategori.php?pesan=KdAda');
            }else{
                include '../connection/koneksi.php';
                unset($_SESSION['Kd_Kategori']);
                unset($_SESSION['Nm_Kategori']);
                include "../../connection/koneksi.php";
                $query2 = "INSERT INTO T_Kategori_Buku VALUES(                
                    '$Kd_Kategori',
                    '$Nm_Kategori'
                )";
                $cek2 = mysqli_query($koneksi, $query2);
                if($cek2==1){
                    header('location:../Views/Admin/V_Data_Kategori.php?pesan=input');
                } else {
                    header('location:../Views/Admin/V_Tambah_Kategori.php?pesan=gagal');
                }   
            }
        }
    }
?>