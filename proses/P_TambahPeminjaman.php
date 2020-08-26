<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Peminjaman = strtoupper($_POST['Kd_Peminjaman']);
        $Kd_Anggota = strtoupper($_POST['Kd_Anggota']);
        $Kd_Buku = strtoupper($_POST['Kd_Buku']);
        $Tanggal = strtotime($_POST['Tanggal']);
        $Tanggal_PHP = date( 'Y-m-d', $Tanggal );
        $_SESSION['Kd_Anggota'] = $Kd_Anggota;
        $_SESSION['Tanggal'] = $Tanggal_PHP;
        $_SESSION['Kd_Buku'] = $Kd_Buku;
        if(empty($Kd_Anggota) || $Tanggal_PHP == '1970-01-01'){
            header('location:../Views/Admin/V_Tambah_Peminjaman.php?pesan=MasihKosong');
        }else{
            include '../connection/koneksi.php';
            $Data = mysqli_query($koneksi,"SELECT * FROM T_Anggota WHERE Kd_Anggota = '$Kd_Anggota'");
            $cek = mysqli_num_rows($Data);
            if($cek < 1){
                header('location:../Views/Admin/V_Tambah_Peminjaman.php?pesan=KdTidakAda');
            }else{
                unset($_SESSION['Kd_Anggota']);
                unset($_SESSION['Kd_Peminjaman']);
                unset($_SESSION['Kd_Buku']);
                $query2 = "INSERT INTO T_Peminjaman (Kd_Peminjaman, Kd_Buku, Kd_Anggota, Tgl_Pinjam, EstimasiPengembalian, Status_Peminjaman) VALUES(
                    '$Kd_Peminjaman',
                    '$Kd_Buku',
                    '$Kd_Anggota',
                    '$Tanggal_PHP',
                    ('$Tanggal_PHP' + INTERVAL 7 DAY),
                    'DIPINJAM'
                )";
                $cek2 = mysqli_query($koneksi, $query2);
                $query3 = "UPDATE T_Buku SET STATUS = 'DIPINJAM', Estimasi_Pengembalian = ('$Tanggal_PHP' + INTERVAL 7 DAY) WHERE Kd_Buku = '$Kd_Buku'";
                $cek3 = mysqli_query($koneksi, $query3);
                if($cek2==1 && $cek3 ==1){
                    header('location:../Views/Admin/V_Data_Peminjaman.php?pesan=input');
                } else {
                    //header('location:../Views/Admin/V_Tambah_Peminjaman.php?pesan=gagal');
                    echo $query2;
                    echo $query3;
                }   
            }
        }
    }
?>