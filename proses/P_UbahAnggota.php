<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Anggota = $_POST['Kd_Anggota'];
        $Nm_Anggota = strtoupper($_POST['Nm_Anggota']);
        $Email = strtoupper($_POST['Email']);
        $foto = $_FILES['foto']; 
        $nFoto = $_FILES["foto"]["name"];
        $_SESSION['Kd_Anggota'] = $Kd_Anggota;
        $_SESSION['Nm_Anggota'] = $Nm_Anggota;
        $_SESSION['Email'] = $Email;
        $_SESSION['nFoto'] = $nFoto;
        if(empty($Nm_Anggota) || empty($Email)){
            header('location:../views/admin/v_ubah_anggota.php?pesan=MasihKosong');
        }else{
            include '../connection/koneksi.php';
            unset($_SESSION['Nm_Anggota']);
            unset($_SESSION['Email']);
            if(!empty($foto) AND $foto['error'] == 0){
                $path = "../dist/img/";
                $temp = explode(".", $_FILES["foto"]["name"]);
                $namafoto = $Kd_Anggota. '.' .end($temp);
                if(file_exists('your-filename.ext')) {
                    unlink($namafoto); //remove the file
                }
                $upload = move_uploaded_file($foto['tmp_name'], $path . $namafoto);
                if(!$upload){
                    header('location:../views/admin/v_data_anggota.php?pesan=gagalinput');
                }
                $file = $namafoto;
                unset($_SESSION['nFoto']);
                $query2 = "UPDATE t_anggota SET Nama_Anggota = '$Nm_Anggota', Email = '$Email', Foto ='$file' WHERE Kd_Anggota = '$Kd_Anggota'";
            }else{
                $query2 = "UPDATE t_anggota SET Nama_Anggota = '$Nm_Anggota', Email = '$Email' WHERE Kd_Anggota = '$Kd_Anggota'";
            }
            $cek2 = mysqli_query($koneksi, $query2);
            if($cek2==1){
                header('location:../views/admin/v_data_anggota.php?pesan=update');
            } else {
                header('location:../views/admin/v_data_anggota.php?pesan=gagal');
            }   
        }
    }
?>