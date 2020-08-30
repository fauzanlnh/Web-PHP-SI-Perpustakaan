<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Buku = $_POST['Kd_Buku'];
        $Jdl_Buku = strtoupper($_POST['Jdl_Buku']);
        $Nm_Pengarang = strtoupper($_POST['Nm_Pengarang']);
        $Nm_Penerbit = strtoupper($_POST['Nm_Penerbit']);
        $Status_Buku = strtoupper($_POST['Status_Buku']);
        $Estimasi = strtotime($_POST['Estimasi']);
        $EstimasiPHP = date( 'Y-m-d', $Estimasi);
        if($EstimasiPHP == "1970-01-01"){
            $EstimasiPHP = null;
        }
        $Kategori_Buku = strtoupper($_POST['Kategori_Buku']);
        $Thn_Terbit = $_POST['Thn_Terbit'];
        $No_Rak = $_POST['No_Rak'];
        $Harga = $_POST['Harga'];
        $_SESSION['Kd_Buku'] = $Kd_Buku;
        $_SESSION['Jdl_Buku'] = $Jdl_Buku;
        $_SESSION['Nm_Pengarang'] = $Nm_Pengarang;
        $_SESSION['Nm_Penerbit'] = $Nm_Penerbit;
        $_SESSION['Status_Buku'] = $Status_Buku;
        $_SESSION['Estimasi'] = $EstimasiPHP;
        $_SESSION['Kategori_Buku'] = $Kategori_Buku;
        $_SESSION['Thn_Terbit'] = $Thn_Terbit;
        $_SESSION['No_Rak'] = $No_Rak;
        $_SESSION['Harga'] = $Harga;
        $_SESSION['Status'] =  $_POST['Status'];
        if(empty($Jdl_Buku) || empty($Nm_Pengarang) || empty($Nm_Penerbit) || empty($Thn_Terbit) || empty($No_Rak) || empty($Harga)){
            header('location:../views/admin/v_ubah_buku.php?pesan=MasihKosong');
        }else{
            include '../connection/koneksi.php';
            /*unset($_SESSION['Jdl_Buku']);
            unset($_SESSION['Nm_Pengarang']);
            unset($_SESSION['Nm_Penerbit']);
            unset($_SESSION['Kategori_Buku']);
            unset($_SESSION['Thn_Terbit']);
            unset($_SESSION['No_Rak']);
            unset($_SESSION['Harga']);*/
            if(empty($_POST['Status'])){
                $query2 = "UPDATE t_buku Set Judul_Buku = '$Jdl_Buku',
                Nama_Pengarang ='$Nm_Pengarang',
                Nama_Penerbit = '$Nm_Penerbit',
                Kd_Kategori = '$Kategori_Buku',
                Tahun_Terbit = '$Thn_Terbit',
                No_Rak = '$No_Rak',
                Harga = '$Harga'
                WHERE Kd_Buku = '$Kd_Buku'";
                echo $query2;
                $cek2 = mysqli_query($koneksi, $query2);
                if($cek2==1){
                    header('location:../views/admin/v_data_buku.php?pesan=update');
                } else {
                    header('location:../views/admin/v_ubah_buku.php?pesan=gagal');
                }
            }else{
                if($EstimasiPHP == null){
                    $query2 = "UPDATE t_buku Set Judul_Buku = '$Jdl_Buku',
                    Nama_Pengarang ='$Nm_Pengarang',
                    Nama_Penerbit = '$Nm_Penerbit',
                    Status = '$Status_Buku',
                    Estimasi_Pengembalian = null,
                    Kd_Kategori = '$Kategori_Buku',
                    Tahun_Terbit = '$Thn_Terbit',
                    No_Rak = '$No_Rak',
                    Harga = '$Harga'
                    WHERE Kd_Buku = '$Kd_Buku'";
                }else{
                    $query2 = "UPDATE t_buku Set Judul_Buku = '$Jdl_Buku',
                    Nama_Pengarang ='$Nm_Pengarang',
                    Nama_Penerbit = '$Nm_Penerbit',
                    Estimasi_Pengembalian = '$EstimasiPHP',
                    Kd_Kategori = '$Kategori_Buku',
                    Tahun_Terbit = '$Thn_Terbit',
                    No_Rak = '$No_Rak',
                    Harga = '$Harga'
                    WHERE Kd_Buku = '$Kd_Buku'";
                }
                echo $query2;
                $cek2 = mysqli_query($koneksi, $query2);
                if($cek2==1){
                    if($Status_Buku == 'TERSEDIA'){
                        header('location:../views/admin/v_data_buku.php?pesan=update');
                    }else{
                        header('location:../views/admin/v_data_buku_hilang.php?pesan=update');
                    }
                } else {
                    //header('location:../views/admin/v_ubah_buku.php?pesan=gagal');
                    echo$EstimasiPHP;
                }
            }
            
        }
    }
?>