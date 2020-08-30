<!DOCTYPE html>
<html>
<head>
	<title>SIPAS | Export Data Buku</title>
</head>
<body>
	<style type="text/css">
	    table{
		    margin: 20px auto;
		    border-collapse: collapse;
	    }
	    table th,
	    table td{
    		border: 1px solid #3c3c3c;
	    	padding: 3px 8px;
	    }
        table th, .Tengah{
            text-align:center;
        }
        .Kiri{
            text-align:left;
        }
	    a{
    		background: blue;
		    color: #fff;
		    padding: 8px 10px;
		    text-decoration: none;
		    border-radius: 2px;
	    }
	</style>
    <?php
    include "../connection/koneksi.php";
    $query = "SELECT date(NOW()) as 'Hari'";
    $data2 = mysqli_query($koneksi, $query);
    if($result2 = mysqli_fetch_array($data2)){
        $tanggal = $result2['Hari'];
    }
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Peminjaman_$tanggal.xls");
	?>
 
	<center>
		<h3>Data Peminjaman Buku</h3>
	</center>
 
	<table border="1px">
		<tr>
			<th>No</th>
			<th>Kode Peminjaman</th>
            <th>Nama Peminjaman</th>
            <th>Kode Koleksi</th>
            <th>Nama Koleksi</th>
            <th>Status</th>
            <th>Estimasi Pengembalian</th>
		</tr>
		<?php 
		// koneksi database
        $Data = mysqli_query($koneksi,"SELECT * from t_anggota JOIN t_peminjaman USING(Kd_Anggota) JOIN t_buku USING(Kd_Buku)");
		$no = 1;
		while($result = mysqli_fetch_array($Data)){
            $Kd_Peminjaman = $result['Kd_Peminjaman'];                  
            $Nama_Anggota = $result['Nama_Anggota'];
            $Kd_Buku = $result['Kd_Buku'];
            $Judul_Buku = $result['Judul_Buku'];
            $Status = $result['Status_Peminjaman'];
            $EstimasiP = $result['EstimasiPengembalian'];
		?>
		<tr>
            <td class="Tengah"><?php echo$no++?></td>;            
            <td class="Tengah"><?php echo $Kd_Peminjaman?></td>
            <td><?php echo $Nama_Anggota?></td>
            <td class="Tengah"><?php echo $Kd_Buku?></td>
            <td><?php echo $Judul_Buku?></td>
            <td><?php echo $Status?></td>
            <td class="Kiri"><?php echo $EstimasiP?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>