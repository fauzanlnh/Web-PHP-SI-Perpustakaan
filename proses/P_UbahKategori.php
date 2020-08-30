<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_KategoriLama = $_SESSION['Kd_Kategori_Lama'];
        $Kd_Kategori = strtoupper($_POST['Kd_Kategori']);
        $Nm_Kategori = strtoupper($_POST['Nm_Kategori']);
        $_SESSION['Kd_Kategori'] = $Kd_Kategori;
        $_SESSION['Nm_Kategori'] = $Nm_Kategori;
        if(empty($Kd_Kategori) || empty($Nm_Kategori)){
            header('location:../views/admin/v_ubah_kategori.php?pesan=MasihKosong');
            //echo $_SESSION['Kd_Kategori'];
        }else{
            include '../connection/koneksi.php';
            if($Kd_Kategori == $Kd_KategoriLama){
                /*unset($_SESSION['Kd_Kategori_Lama']);
                unset($_SESSION['Kd_Kategori']);
                unset($_SESSION['Nm_Kategori']);*/
                $query2 = "UPDATE t_kategori_buku SET Kd_Kategori ='$Kd_Kategori', Nama_Kategori = '$Nm_Kategori' WHERE Kd_Kategori = '$Kd_KategoriLama';";
                $cek2 = mysqli_query($koneksi, $query2);
                if($cek2==1){
                    header('location:../views/admin/v_data_kategori.php?pesan=update');
                } else {
                    header('location:../views/admin/v_ubah_kategori.php?pesan=gagal');
                } 
            }else{
                $Data = mysqli_query($koneksi,"SELECT * FROM t_kategori_buku WHERE Kd_Kategori = '$Kd_Kategori'");
                $cek = mysqli_num_rows($Data);
                if($cek == 1){
                    header('location:../views/admin/v_ubah_kategori.php?pesan=KdAda&Kd_Kategori='.$Kd_KategoriLama.' ');
                } else{
                    unset($_SESSION['Kd_Kategori_Lama']);
                    unset($_SESSION['Kd_Kategori']);
                    unset($_SESSION['Nm_Kategori']);
                    $query2 = "UPDATE t_kategori_buku SET Kd_Kategori ='$Kd_Kategori', Nama_Kategori = '$Nm_Kategori' WHERE Kd_Kategori = '$Kd_KategoriLama';";
                    $cek2 = mysqli_query($koneksi, $query2);
                    if($cek2==1){
                        header('location:../views/admin/v_data_kategori.php?pesan=update');
                    } else {
                        header('location:../views/admin/v_ubah_kategori.php?pesan=gagal');
                    } 
                }
            }
        }
    }
?>