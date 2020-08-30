<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $kd_pegawai = $_POST['kd_pegawai'];
        $nama_pegawai = strtoupper($_POST['nama_pegawai']);
        $Email = strtoupper($_POST['Email']);
        $foto = $_FILES['foto']; 
        $nFoto = $_FILES["foto"]["name"];
        $_SESSION['Kd_Pegawai'] = $kd_pegawai;
        $_SESSION['nama_pegawai'] = $nama_pegawai;
        $_SESSION['Email'] = $Email;
        $_SESSION['nFoto'] = $nFoto;
        if(empty($nama_pegawai) || empty($Email)){
            header('location:../views/admin/v_ubahpegawai.php?pesan=MasihKosong');
        }else{
            include '../connection/koneksi.php';
            unset($_SESSION['nama_pegawai']);
            unset($_SESSION['Email']);
            if(!empty($foto) AND $foto['error'] == 0){
                $path = "../dist/img/";
                $temp = explode(".", $_FILES["foto"]["name"]);
                $namafoto = $kd_pegawai. '.' .end($temp);
                if(file_exists('your-filename.ext')) {
                    unlink($namafoto); //remove the file
                }
                $upload = move_uploaded_file($foto['tmp_name'], $path . $namafoto);
                if(!$upload){
                    header('location:../views/admin/v_data_pegawai.php?pesan=gagalinput');
                }
                $file = $namafoto;
                unset($_SESSION['nFoto']);
                $query2 = "UPDATE t_pegawai SET Nama_Pegawai = '$nama_pegawai', Email = '$Email',foto = '$file' WHERE Kd_Pegawai = '$kd_pegawai'";
            }else{
                $query2 = "UPDATE t_pegawai SET Nama_Pegawai = '$nama_pegawai', Email = '$Email' WHERE Kd_Pegawai = '$kd_pegawai'";
            }
            $cek2 = mysqli_query($koneksi, $query2);
            $Password = $_POST['Password'];
            if(!empty($Password)){
                $query1 = "UPDATE t_master SET Password = '$Password' WHERE Username = '$kd_pegawai'";
                $cek1 = mysqli_query($koneksi, $query1);
            }
            if($cek2==1 ){
                header('location:../views/admin/v_data_pegawai.php?pesan=update');
            } else {
                header('location:../views/admin/v_data_pegawai.php?pesan=gagal');
            }   
        }
    }
?>