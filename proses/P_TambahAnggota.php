<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Anggota = $_POST['Kd_Anggota'];
        $Nm_Anggota = strtoupper($_POST['Nm_Anggota']);
        $Email = strtoupper($_POST['Email']);
        $Username = $_POST['Username'];
        $foto = $_FILES['foto']; 
        $nFoto = $_FILES["foto"]["name"];
        $_SESSION['Nm_Anggota'] = $Nm_Anggota;
        $_SESSION['Email'] = $Email;
        $_SESSION['nFoto'] = $nFoto;
        if(empty($Nm_Anggota) && empty($Email) && $nFoto ==""){
            header('location:../Views/Admin/V_Tambah_Anggota.php?pesan=MasihKosong');
        }else if(empty($Nm_Anggota) && empty($Email)){
            header('location:../Views/Admin/V_Tambah_Anggota.php?pesan=NmEmail');
        }else if(empty($Nm_Anggota) && $nFoto ==""){
            header('location:../Views/Admin/V_Tambah_Anggota.php?pesan=NmFoto');
        }else if(empty($Email) && $nFoto ==""){
            header('location:../Views/Admin/V_Tambah_Anggota.php?pesan=FotoEmail');
        }else if(empty($Nm_Anggota)){
            header('location:../Views/Admin/V_Tambah_Anggota.php?pesan=NmAnggotaKosong');
        }else if(empty($Email)){
            header('location:../Views/Admin/V_Tambah_Anggota.php?pesan=EmailKosong');
        }else if(($nFoto =="")){
            header('location:../Views/Admin/V_Tambah_Anggota.php?pesan=FotoKosong');
        }else{
            include '../connection/koneksi.php';
            unset($_SESSION['Nm_Anggota']);
            unset($_SESSION['Email']);
            unset($_SESSION['nFoto']);
            if(!empty($foto) AND $foto['error'] == 0){
                $path = "../dist/img/";
                $temp = explode(".", $_FILES["foto"]["name"]);
                $namafoto = $Username. '.' .end($temp);
                $upload = move_uploaded_file($foto['tmp_name'], $path . $namafoto);
                if(!$upload){
                    header('location:../Views/Admin/V_Data_Anggota.php?pesan=gagalinput');
                }
                $file = $namafoto;
            }
            $query1 =  "INSERT INTO T_Master VALUES(
                '$Username',
                '$Username',
                'ANGGOTA')";
            $cek1 = mysqli_query($koneksi, $query1);
            $query2 = "INSERT INTO t_anggota VALUES(
                '$Kd_Anggota',
                '$Nm_Anggota',
                '$Email',
                '$Username',
                '$file'
            )";
            $cek2 = mysqli_query($koneksi, $query2);
            if($cek2==1 && $cek1 == 1){
                header('location:../Views/Admin/V_Data_Anggota.php?pesan=input');
            } else {
                header('location:../Views/Admin/V_Data_Anggota.php?pesan=gagal');
            }   
        }
    }
?>