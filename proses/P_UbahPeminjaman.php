<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $Kd_Peminjaman = strtoupper($_POST['Kd_Peminjaman']);
        $Kd_Anggota = strtoupper($_POST['Kd_Anggota']);
        $Kd_Buku_Baru = strtoupper($_POST['Kd_Buku']);        
        $_SESSION['Kd_Peminjaman'] = $Kd_Peminjaman;
        $_SESSION['Kd_Anggota'] = $Kd_Anggota;
        $_SESSION['Kd_Buku_Baru'] = $Kd_Buku_Baru;
        if(empty($Kd_Anggota)){
            header('location:../views/admin/v_ubah_peminjaman.php?pesan=MasihKosong');
        }else{
            include '../connection/koneksi.php';
            $Data = mysqli_query($koneksi,"SELECT * FROM t_anggota WHERE Kd_Anggota = '$Kd_Anggota'");
            $cek = mysqli_num_rows($Data);
            if($cek < 1){
                header('location:../views/admin/v_ubah_peminjaman.php?pesan=KdTidakAda');
            }else{
                $Data = mysqli_query($koneksi,"SELECT * FROM t_peminjaman WHERE Kd_Peminjaman = '$Kd_Peminjaman'");
                if($result = mysqli_fetch_array($Data)){
                    $Kd_Buku_Lama = $result['Kd_Buku'];
                    $Tgl_Pinjam = $result['Tgl_Pinjam'];
                }
                $query1 = "UPDATE t_buku SET Status ='TERSEDIA', ESTIMASI_PENGEMBALIAN = NULL WHERE Kd_Buku='$Kd_Buku_Lama'";
                $cek1 = mysqli_query($koneksi, $query1);
                unset($_SESSION['Kd_Anggota']);
                unset($_SESSION['Kd_Peminjaman']);
                unset($_SESSION['Kd_Buku']);
                $query2 = "UPDATE t_peminjaman SET Kd_Buku = '$Kd_Buku_Baru', 
                Kd_Anggota ='$Kd_Anggota' WHERE Kd_Peminjaman = '$Kd_Peminjaman'";
                $cek2 = mysqli_query($koneksi, $query2);
                $query3 = "UPDATE t_buku SET STATUS = 'DIPINJAM', Estimasi_Pengembalian = ('$Tgl_Pinjam' + INTERVAL 7 DAY) WHERE Kd_Buku = '$Kd_Buku_Baru'";
                $cek3 = mysqli_query($koneksi, $query3);
                if($cek1 == 1&&$cek2==1 && $cek3 ==1){
                    header('location:../views/admin/v_data_peminjaman.php?pesan=update');
                } else {
                    //header('location:../views/admin/v_ubah_peminjaman.php?pesan=gagal');
                    echo $query2;
                    echo $query3;
                }   
            }
        }
    }
?>