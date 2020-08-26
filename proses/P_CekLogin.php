<?php 
	// mengaktifkan session php
	session_start();
	// menghubungkan dengan koneksi
	include '../connection/koneksi.php';
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		// menangkap data yang dikirim dari form		
		$username = $_POST['username'];
        $password = $_POST['password']; 
		// menyeleksi data admin dengan username dan password yang sesuai
        $data = mysqli_query($koneksi,"select * from T_Master where username='$username' and password='$password'"); 
		// menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);
		if($cek > 0){
			$data = mysqli_fetch_assoc($data);
			$_SESSION['username'] = $username;
			if($data['Hak_Akses']=="CS"){
                header("location:../views/Customer Service/V_CS_Dashboard.html");
			}else if($data['Hak_Akses']=="PEGAWAI"){
                header("location:../views/Admin/Dashboard_Admin.php");
			}
		}else{
            header("location:../Views/V_Login.html");
            //PESAN PASSWORD SALAh
		}
	}else{
        header("location:../Views/V_Login.html");
        //PESAN PASSWORD ATAU USERNAME KOSONG
	}
?>