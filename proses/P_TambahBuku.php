<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Buku = $_POST['Kd_Buku'];
        $Jdl_Buku = strtoupper($_POST['Jdl_Buku']);
        $Nm_Pengarang = strtoupper($_POST['Nm_Pengarang']);
        $Nm_Penerbit = strtoupper($_POST['Nm_Penerbit']);
        $Kategori_Buku = strtoupper($_POST['Kategori_Buku']);
        $Thn_Terbit = $_POST['Thn_Terbit'];
        $No_Rak = $_POST['No_Rak'];
        $Harga = $_POST['Harga'];
        $_SESSION['Jdl_Buku'] = $Jdl_Buku;
        $_SESSION['Nm_Pengarang'] = $Nm_Pengarang;
        $_SESSION['Nm_Penerbit'] = $Nm_Penerbit;
        $_SESSION['Kategori_Buku'] = $Kategori_Buku;
        $_SESSION['Thn_Terbit'] = $Thn_Terbit;
        $_SESSION['No_Rak'] = $No_Rak;
        $_SESSION['Harga'] = $Harga;
        if(empty($Jdl_Buku) || empty($Nm_Pengarang) || empty($Nm_Penerbit) || empty($Thn_Terbit) || empty($No_Rak) || empty($Harga)){
            header('location:../Views/Admin/V_Tambah_Buku.php?pesan=MasihKosong');
            //echo $_SESSION['Jdl_Buku'];
        }else{
            include '../connection/koneksi.php';
            unset($_SESSION['Jdl_Buku']);
            unset($_SESSION['Nm_Pengarang']);
            unset($_SESSION['Nm_Penerbit']);
            unset($_SESSION['Kategori_Buku']);
            unset($_SESSION['Thn_Terbit']);
            unset($_SESSION['No_Rak']);
            unset($_SESSION['Harga']);
            include "../../connection/koneksi.php";
            $query2 = "INSERT INTO T_Buku (Kd_Buku, Judul_Buku, Nama_Pengarang, Nama_Penerbit, Tahun_Terbit, No_Rak, Kd_Kategori, Status, Harga)VALUES(
                '$Kd_Buku',
                '$Jdl_Buku',
                '$Nm_Pengarang',
                '$Nm_Penerbit',
                '$Thn_Terbit',
                '$No_Rak',
                '$Kategori_Buku',
                'TERSEDIA',
                '$Harga'
            )";
            $cek2 = mysqli_query($koneksi, $query2);
            if($cek2==1){
                header('location:../Views/Admin/V_Data_Buku.php?pesan=input');
            } else {
                header('location:../Views/Admin/V_Tambah_Buku.php?pesan=gagal');
            }   
        }
    }
?>