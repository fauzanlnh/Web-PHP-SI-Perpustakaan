<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $kd_pegawai = strtoupper($_POST['kd_pegawai']);
        $nama_pegawai = strtoupper($_POST['nama_pegawai']);
        $email = strtoupper($_POST['email']);        
        $Password = strtoupper($_POST['Password']);        
        $_SESSION['nama_pegawai'] = $nama_pegawai;
        $_SESSION['email'] = $email;
        $_SESSION['Password'] = $Password;
        if(empty($nama_pegawai) || empty($email)){
            header('location:../views/admin/v_ubah_profile.php?pesan=MasihKosong');
        }else{
            include '../connection/koneksi.php';
            $query1 = "UPDATE t_pegawai SET nama_pegawai ='$nama_pegawai', email = '$email' WHERE kd_pegawai='$kd_pegawai'";
            $cek1 = mysqli_query($koneksi, $query1);
            unset($_SESSION['Kd_Anggota']);
            unset($_SESSION['Kd_Profile']);
            unset($_SESSION['Kd_Buku']);
            if(!empty($Password)){
                $query3 = "UPDATE t_master SET Password = '$Password' WHERE Username = '$kd_pegawai'";
                $cek3 = mysqli_query($koneksi, $query3);
            }else{
                $cek3=1;
            }
            if($cek1==1 && $cek3 ==1){
                header('location:../views/admin/v_ubah_profile.php?pesan=update');
            } else {
                //header('location:../views/admin/v_ubah_profile.php?pesan=gagal');
                echo $query2;
                echo $query3;
            }   
        }
    }
?>