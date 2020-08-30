<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $kd_pegawai = $_POST['kd_pegawai'];
        $Nm_Pegawai = strtoupper($_POST['Nm_Pegawai']);
        $Email = strtoupper($_POST['Email']);
        $Username = $_POST['Username'];
        $foto = $_FILES['foto']; 
        $nFoto = $_FILES["foto"]["name"];
        $_SESSION['Nm_Pegawai'] = $Nm_Pegawai;
        $_SESSION['Email'] = $Email;
        $_SESSION['nFoto'] = $nFoto;
        if(empty($Nm_Pegawai) && empty($Email) && $nFoto ==""){
            header('location:../views/admin/v_tambah_user.php?pesan=MasihKosong');
        }else if(empty($Nm_Pegawai) && empty($Email)){
            header('location:../views/admin/v_tambah_user.php?pesan=NmEmail');
        }else if(empty($Nm_Pegawai) && $nFoto ==""){
            header('location:../views/admin/v_tambah_user.php?pesan=NmFoto');
        }else if(empty($Email) && $nFoto ==""){
            header('location:../views/admin/v_tambah_user.php?pesan=FotoEmail');
        }else if(empty($Nm_Pegawai)){
            header('location:../views/admin/v_tambah_user.php?pesan=NmPegawaiKosong');
        }else if(empty($Email)){
            header('location:../views/admin/v_tambah_user.php?pesan=EmailKosong');
        }else if(($nFoto =="")){
            header('location:../views/admin/v_tambah_user.php?pesan=FotoKosong');
        }else{
            include '../connection/koneksi.php';
            /*unset($_SESSION['Nm_Pegawai']);
            unset($_SESSION['Email']);
            unset($_SESSION['nFoto']);*/
            if(!empty($foto) AND $foto['error'] == 0){
                $path = "../dist/img/";
                $temp = explode(".", $_FILES["foto"]["name"]);
                $namafoto = $Username. '.' .end($temp);
                $upload = move_uploaded_file($foto['tmp_name'], $path . $namafoto);
                if(!$upload){
                    header('location:../views/admin/v_data_pegawai.php?pesan=gagalinput');
                }else{
                    $file = $namafoto;
                    $query1 =  "INSERT INTO t_master VALUES(
                        '$Username',
                        '$Username',
                        'PEGAWAI')";
                    $cek1 = mysqli_query($koneksi, $query1);
                    $query2 = "INSERT INTO t_pegawai VALUES(
                        '$kd_pegawai',
                        '$Nm_Pegawai',
                        '$Username',
                        '$file',
                        '$Email'    
                    )";
                    $cek2 = mysqli_query($koneksi, $query2);
                    if($cek2==1 && $cek1 == 1){
                        header('location:../views/admin/v_data_pegawai.php?pesan=input');
                    } else {
                        //header('location:../views/admin/v_data_pegawai.php?pesan=gagal');
                        echo$query2;
                        echo$query1;
                    }   
                }
                
            }
            
        }
    }
?>