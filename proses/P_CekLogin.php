<?php 
	// mengaktifkan session php
	session_start();
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	// menghubungkan dengan koneksi
	include '../connection/koneksi.php';
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		// menangkap data yang dikirim dari form		
		$username = $_POST['username'];
        $password = $_POST['password']; 
		$data1 = mysqli_query($koneksi,"select * from t_master where username='$username'"); 
		// menghitung jumlah data yang ditemukan
        $cek1 = mysqli_num_rows($data1);
		if($cek1 > 0){
			// menyeleksi data admin dengan username dan password yang sesuai
        	$data = mysqli_query($koneksi,"select * from t_master where username='$username' and password='$password'"); 
			// menghitung jumlah data yang ditemukan
        	$cek = mysqli_num_rows($data);
			if($cek > 0){
				$data = mysqli_fetch_assoc($data);
				$_SESSION['status'] = 'Login';
				/*if($data['Hak_Akses']=="PEGAWAI"){
	            	header("location:../views/Pegawai/dashboard_pegawai.php");
				}else if($data['Hak_Akses']=="ADMIN"){
	                header("location:../views/admin/dashboard_admin.php");
				}*/
				header("location:../views/admin/dashboard_admin.php");
				//LOGIN BERHASIL
			}else{
				header("location:../views/v_login.php?pesan=PasswordSalah");
				//PASSWORD SALAH
			}
		}else{
			//USERNAME TIDAK DITEMUKAN
			header("location:../views/v_login.php?pesan=UsernameTidakAda");
		}
	}else{
		header("location:../views/v_login.php?pesan=MasihKosong");
	}
?>