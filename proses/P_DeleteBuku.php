<?php
    include '../connection/koneksi.php';
    // menyimpan data id kedalam variabel
    $Kd_Buku = $_GET['Kd_Buku'];
    $Data = mysqli_query($koneksi,"SELECT * from t_buku WHERE Kd_Buku = '$Kd_Buku'");
    while($result = mysqli_fetch_array($Data)){
        $Status = $result['Status'];                  
    }
    // query SQL untuk delete data
    $query="DELETE FROM t_buku where Kd_Buku='$Kd_Buku'";
    $cek2 = mysqli_query($koneksi, $query);
    // mengalihkan ke halaman index.php
    if($cek2==1){
        if($Status == 'HILANG' || $Status == 'RUSAK'){
            header('location:../views/admin/v_data_buku_hilang.php?pesan=hapus');
        }else{
            header('location:../views/admin/v_data_buku.php?pesan=hapus');
        }
    }else{
        if($Status == 'HILANG' || $Status == 'RUSAK'){
            header('location:../views/admin/v_data_buku_hilang.php?pesan=gagal');
        }else{
            header('location:../views/admin/v_data_buku.php?pesan=gagal');
        }
    }
?>