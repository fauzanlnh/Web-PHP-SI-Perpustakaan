<?php
    include '../connection/koneksi.php';
    // menyimpan data id kedalam variabel
    $kd_pegawai = $_GET['kd_pegawai'];
    // query SQL untuk delete data
    $query="DELETE FROM t_pegawai where kd_pegawai='$kd_pegawai'";
    $cek2 = mysqli_query($koneksi, $query);
    $query1="DELETE FROM t_master where username='$kd_pegawai'";
    $cek1 = mysqli_query($koneksi, $query1);
    // mengalihkan ke halaman index.php
    if($cek2==1 && $cek1==1){
        header('location:../views/admin/v_data_pegawai.php?pesan=hapus');
    }else{
        header('location:../views/admin/v_data_pegawai.php?pesan=gagal');
    }
    
?>