<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $foto = $_FILES['foto']; 
        $nFoto = $_FILES["foto"]["name"];
        $_SESSION['nFoto'] = $nFoto;
        $_SESSION['kd_pegawai'] = $_POST['kd_pegawai'];
        $kd_pegawai = $_SESSION['kd_pegawai'];
        if(($nFoto =="")){
            header('location:../views/admin/v_ubahfoto.php?pesan=FotoKosong');
        }else{
            if(!empty($foto) AND $foto['error'] == 0){
                $path = "../dist/img/";
                $temp = explode(".", $_FILES["foto"]["name"]);
                $namafoto = $kd_pegawai. '.' .end($temp);
                $file = $namafoto;
                if(file_exists($path."".$file)) {
                    unlink($file); //remove the file
                }
                $upload = move_uploaded_file($foto['tmp_name'], $path . $namafoto);
                if(!$upload){
                    header('location:../views/admin/v_ubahfoto.php?pesan=gagalfotoubah');
                    //echo$namafoto;
                }else{
                    include '../connection/koneksi.php';
                    $query = "UPDATE t_pegawai SET Foto = '$file' WHERE kd_pegawai ='$kd_pegawai'";
                    $cek = mysqli_query($koneksi, $query);
                    header('location:../views/admin/v_ubah_profile.php?pesan=fotoubah');
                }
                unset($_SESSION['nFoto']);
            }   
        }     
    }
?>