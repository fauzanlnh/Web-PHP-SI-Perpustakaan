<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Peminjaman = strtoupper($_POST['Kd_Peminjaman']);
        $Kd_Anggota = strtoupper($_POST['Kd_Anggota']);
        $Kd_Buku = strtoupper($_POST['Kd_Buku']);
        $Tanggal = strtotime($_POST['Tanggal']);
        $Tanggal_PHP = date( 'Y-m-d', $Tanggal );
        $Denda = $_POST['Denda'];
        $CaraPengembalian = $_POST['Pengembalian'];
        if(empty($Kd_Anggota) || $Tanggal_PHP == '1970-01-01'|| empty($Kd_Buku) ){
            $_SESSION['CaraPengembalian'] = $CaraPengembalian;
            header('location:../views/admin/v_tambah_pengembalian.php?pesan=MasihKosong');
        }else{
            include '../connection/koneksi.php';
            if($CaraPengembalian == "Buku Dikembalikan"){
                $query2 = "UPDATE t_peminjaman SET Tgl_Kembali = '$Tanggal_PHP', 
                    Denda_Keterlambatan = '$Denda', 
                    Status_Peminjaman = 'DIKEMBALIKAN', 
                    EstimasiPengembalian = NULL, 
                    Username='".$_SESSION['username']."'
                    WHERE Kd_Peminjaman = '$Kd_Peminjaman'";
                $cek2 = mysqli_query($koneksi, $query2);
                $query3 = "UPDATE t_buku SET STATUS = 'TERSEDIA', 
                    Estimasi_Pengembalian = NULL 
                    WHERE Kd_Buku = '$Kd_Buku'";
                $cek3 = mysqli_query($koneksi, $query3);
                if($cek2==1 && $cek3 ==1){
                    header('location:../views/admin/v_data_pengembalian.php?pesan=input');
                } else {
                    //header('location:../views/admin/v_tambah_pengembalian.php?pesan=gagal');
                    echo$_SESSION['username'];
                    echo $query2;
                    echo"<br>";
                    echo $query3;
                }           
            }else if($CaraPengembalian == "Hilang - Ganti Dengan Buku Baru"){
                $Kd_Buku_Baru = $_POST['Kd_Buku_Baru'];
                $Jdl_Buku_Baru = strtoupper($_POST['Jdl_Buku_Baru']);
                $Nm_Pengarang_Baru = strtoupper($_POST['Nm_Pengarang_Baru']);
                $Nm_Penerbit_Baru = strtoupper($_POST['Nm_Penerbit_Baru']);
                $Kategori_Buku_Baru = strtoupper($_POST['Kategori_Buku_Baru']);
                $Thn_Terbit_Baru = $_POST['Thn_Terbit_Baru'];
                $No_Rak_Baru = $_POST['No_Rak_Baru'];
                $Harga_Baru = $_POST['Harga_Baru'];
                $_SESSION['Jdl_Buku'] = $Jdl_Buku_Baru;
                $_SESSION['Nm_Pengarang'] = $Nm_Pengarang_Baru;
                $_SESSION['Nm_Penerbit'] = $Nm_Penerbit_Baru;
                $_SESSION['Kategori_Buku'] = $Kategori_Buku_Baru;
                $_SESSION['Thn_Terbit'] = $Thn_Terbit_Baru;
                $_SESSION['No_Rak'] = $No_Rak_Baru;
                $_SESSION['Harga'] = $Harga_Baru;
                if(empty($Jdl_Buku_Baru) || empty($Nm_Pengarang_Baru) || empty($Nm_Penerbit_Baru) || empty($Thn_Terbit_Baru) || empty($No_Rak_Baru) || empty($Harga_Baru) ){
                    $_SESSION['CaraPengembalian'] = $CaraPengembalian;
                    header('location:../views/admin/v_tambah_pengembalian.php?pesan=MasihKosong2');
                }else{
                    $query1 = "INSERT INTO t_buku (Kd_Buku, Judul_Buku, Nama_Pengarang, Nama_Penerbit, Tahun_Terbit, No_Rak, Kd_Kategori, Status, Harga)VALUES(
                        '$Kd_Buku_Baru',
                        '$Jdl_Buku_Baru',
                        '$Nm_Pengarang_Baru',
                        '$Nm_Penerbit_Baru',
                        '$Thn_Terbit_Baru',
                        '$No_Rak_Baru',
                        '$Kategori_Buku_Baru',
                        'TERSEDIA',
                        '$Harga_Baru'                
                    )";                
                    $cek1 = mysqli_query($koneksi, $query1);
                    $query2 = "UPDATE t_peminjaman SET Tgl_Kembali = '$Tanggal_PHP', 
                        Denda_Keterlambatan = '$Denda', 
                        Status_Peminjaman = 'HILANG', 
                        EstimasiPengembalian = NULL, 
                        Username='".$_SESSION['username']."'
                        WHERE Kd_Peminjaman = '$Kd_Peminjaman'";
                    $cek2 = mysqli_query($koneksi, $query2);
                    $query3 = "UPDATE t_buku SET STATUS = 'HILANG', 
                        Estimasi_Pengembalian = NULL 
                        WHERE Kd_Buku = '$Kd_Buku'";
                    $cek3 = mysqli_query($koneksi, $query3);
                    $query4 = "INSERT INTO t_pengembalian_ganti (Tanggal_Ganti, Kd_Buku_Ganti, Kd_Peminjaman) VALUES (
                        '$Tanggal_PHP',
                        '$Kd_Buku_Baru',
                        '$Kd_Peminjaman'
                        )";
                    $cek4 = mysqli_query($koneksi, $query4);
                }
                if($cek1 ==1 && $cek2==1 && $cek3 ==1 && $cek4 ==1){
                    header('location:../views/admin/v_data_Pengembalian_gantibuku.php?pesan=input');
                } else {
                    //header('location:../views/admin/v_tambah_pengembalian.php?pesan=gagal');
                    echo $query1;
                    echo"<br>";
                    echo $query2;
                    echo"<br>";
                    echo $query3;
                    echo"<br>";
                    echo $query4;
                }
            }else if($CaraPengembalian == "Hilang - Ganti Dengan Uang"){
                $Harga_Ganti = $_POST['Harga_Buku'];
                $query1 = "INSERT INTO t_pengembalian_Bayar (Tanggal_Ganti, Harga_Ganti, Kd_Peminjaman) VALUES (
                    '$Tanggal_PHP',
                    '$Harga_Ganti',
                    '$Kd_Peminjaman'
                    )";
                $cek1 = mysqli_query($koneksi, $query1);
                $query2 = "UPDATE t_peminjaman SET Tgl_Kembali = '$Tanggal_PHP', 
                    Denda_Keterlambatan = '$Denda', 
                    Status_Peminjaman = 'HILANG', 
                    EstimasiPengembalian = NULL, 
                    Username='".$_SESSION['username']."'
                    WHERE Kd_Peminjaman = '$Kd_Peminjaman'";
                $cek2 = mysqli_query($koneksi, $query2);
                $query3 = "UPDATE t_buku SET STATUS = 'HILANG', 
                    Estimasi_Pengembalian = NULL 
                    WHERE Kd_Buku = '$Kd_Buku'";
                $cek3 = mysqli_query($koneksi, $query3);
                if($cek1 ==1 && $cek2==1 && $cek3 ==1){
                    header('location:../views/admin/v_data_pengembalian_denda.php?pesan=input');
                } else {
                    //header('location:../views/admin/v_tambah_pengembalian.php?pesan=gagal');
                    echo$_SESSION['username'];
                    echo $query2;
                    echo"<br>";
                    echo $query3;
                }
            }        
            
        }
    }
?>