<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Peminjaman = strtoupper($_POST['Kd_Peminjaman']);
        $Kd_Anggota = strtoupper($_POST['Kd_Anggota']);
        $Kd_Buku = strtoupper($_POST['Kd_Buku']);
        $Tanggal = strtotime($_POST['Tanggal']);
        $Tanggal_PHP = date( 'Y-m-d', $Tanggal );
        $Denda = $_POST['Denda'];        
        if(empty($Kd_Anggota) || $Tanggal_PHP == '1970-01-01'|| empty($Kd_Buku) ){
            header('location:../Views/Admin/V_Tambah_Pengembalian.php?pesan=MasihKosong');
        }else{
            include '../connection/koneksi.php';
            $query2 = "UPDATE T_Peminjaman SET Tgl_Kembali = '$Tanggal_PHP', 
                        Denda_Keterlambatan = '$Denda', 
                        Status_Peminjaman = 'DIKEMBALIKAN', 
                        EstimasiPengembalian = NULL, 
                        Username='".$_SESSION['username']."'
                        WHERE Kd_Peminjaman = '$Kd_Peminjaman'";
            $cek2 = mysqli_query($koneksi, $query2);
            
            $query3 = "UPDATE T_Buku SET STATUS = 'TERSEDIA', 
                        Estimasi_Pengembalian = NULL 
                        WHERE Kd_Buku = '$Kd_Buku'";
            $cek3 = mysqli_query($koneksi, $query3);
            if($cek2==1 && $cek3 ==1){
                header('location:../Views/Admin/V_Data_Pengembalian.php?pesan=input');
                unset($_SESSION['setKdAnggota']);
                unset($_SESSION['setKdBuku']);
                unset($_SESSION['setJudul']);
                unset($_SESSION['setTelat']);
                unset($_SESSION['setDenda']);
                unset($_SESSION['Jdl_Buku']);
                unset($_SESSION['Nm_Pengarang']);
                unset($_SESSION['Nm_Penerbit']);
                unset($_SESSION['Kategori_Buku']);
                unset($_SESSION['Thn_Terbit']);
                unset($_SESSION['No_Rak']);
                unset($_SESSION['Harga']);
            } else {
                //header('location:../Views/Admin/V_Tambah_Pengembalian.php?pesan=gagal');
                echo$_SESSION['username'];
                echo $query2;
                echo"<br>";
                echo $query3;
            }   
        }
    }
?>