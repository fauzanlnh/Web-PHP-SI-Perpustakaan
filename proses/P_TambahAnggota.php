<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Anggota = $_POST['Kd_Anggota'];
        $Nm_Anggota = strtoupper($_POST['Nm_Anggota']);
        $Email = strtoupper($_POST['Email']);
        $foto = $_FILES['foto']; 
        $nFoto = $_FILES["foto"]["name"];
        $_SESSION['Nm_Anggota'] = $Nm_Anggota;
        $_SESSION['Email'] = $Email;
        $_SESSION['nFoto'] = $nFoto;
        if(empty($Nm_Anggota) && empty($Email) && $nFoto ==""){
            header('location:../views/admin/v_tambah_anggota.php?pesan=MasihKosong');
        }else if(empty($Nm_Anggota) && empty($Email)){
            header('location:../views/admin/v_tambah_anggota.php?pesan=NmEmail');
        }else if(empty($Nm_Anggota) && $nFoto ==""){
            header('location:../views/admin/v_tambah_anggota.php?pesan=NmFoto');
        }else if(empty($Email) && $nFoto ==""){
            header('location:../views/admin/v_tambah_anggota.php?pesan=FotoEmail');
        }else if(empty($Nm_Anggota)){
            header('location:../views/admin/v_tambah_anggota.php?pesan=NmAnggotaKosong');
        }else if(empty($Email)){
            header('location:../views/admin/v_tambah_anggota.php?pesan=EmailKosong');
        }else if(($nFoto =="")){
            header('location:../views/admin/v_tambah_anggota.php?pesan=FotoKosong');
        }else{
            include '../connection/koneksi.php';
            unset($_SESSION['Nm_Anggota']);
            unset($_SESSION['Email']);
            unset($_SESSION['nFoto']);
            if(!empty($foto) AND $foto['error'] == 0){
                $path = "../dist/img/";
                $temp = explode(".", $_FILES["foto"]["name"]);
                $namafoto = $Kd_Anggota. '.' .end($temp);
                $upload = move_uploaded_file($foto['tmp_name'], $path . $namafoto);
                $file = $namafoto;
                if(!$upload){
                    header('location:../views/admin/v_data_anggota.php?pesan=gagalinput');
                }else{
                    $query2 = "INSERT INTO t_anggota VALUES(
                        '$Kd_Anggota',
                        '$Nm_Anggota',
                        '$Email',
                        '$file'
                    )";
                    $cek2 = mysqli_query($koneksi, $query2);
                    if($cek2==1){
                        header('location:../views/admin/v_data_anggota.php?pesan=input');
                    } else {
                        //header('location:../views/admin/v_data_anggota.php?pesan=gagal');
                        echo$query2;
                    }   
                }
                
            }
            
        }
    }
?>