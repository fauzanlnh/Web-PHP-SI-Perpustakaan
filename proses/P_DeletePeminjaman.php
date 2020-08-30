<?php
    include '../connection/koneksi.php';
    // menyimpan data id kedalam variabel
    $Kd_Peminjaman = $_GET['Kd_Peminjaman'];
    $Data = mysqli_query($koneksi,"SELECT * from t_peminjaman WHERE Kd_Peminjaman = '$Kd_Peminjaman'");
    while($result = mysqli_fetch_array($Data)){
        $Kd_Buku = $result['Kd_Buku'];                  
    }
    // query SQL untuk delete data
    $query="DELETE FROM t_peminjaman where Kd_Peminjaman='$Kd_Peminjaman'";
    $cek2 = mysqli_query($koneksi, $query);
    $query1 = "UPDATE t_buku SET Status ='TERSEDIA', ESTIMASI_PENGEMBALIAN = NULL WHERE Kd_Buku='$Kd_Buku'";
    $cek1 = mysqli_query($koneksi, $query1);
    // mengalihkan ke halaman index.php
    if($cek2==1 && $cek1 ==1){
            header('location:../views/admin/v_data_peminjaman.php?pesan=hapus');
    }else{
            header('location:../views/admin/v_data_peminjaman.php?pesan=gagal');
    }
?>