<?php
    include '../connection/koneksi.php';
    // menyimpan data id kedalam variabel
    $Kd_Anggota = $_GET['Kd_Anggota'];
    // query SQL untuk delete data
    $query="DELETE FROM t_anggota where Kd_Anggota='$Kd_Anggota'";
    $cek2 = mysqli_query($koneksi, $query);
    // mengalihkan ke halaman index.php
    if($cek2==1){
        header('location:../views/admin/v_data_anggota.php?pesan=hapus');
    }else{
        header('location:../views/admin/v_data_anggota.php?pesan=gagal');
    }
    
?>