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
	header("Content-Disposition: attachment; filename=Data Buku Hilang_$tanggal.xls");
	?>
 
	<center>
		<h3>Data Buku Yang Hilang dan Rusak</h3>
	</center>
 
	<table border="1px">
		<tr>
			<th>No</th>
			<th>Kode Koleksi</th>
            <th>Nama Koleksi</th>
            <th>Nama Pengarang</th>
            <th>No Rak</th>
            <th>Status</th>
		</tr>
		<?php 
		// koneksi database
        $Data = mysqli_query($koneksi,"SELECT * from t_buku WHERE Status = 'HILANG' OR STATUS = 'RUSAK'");
		$no = 1;
		while($result = mysqli_fetch_array($Data)){
            $KdKoleksi = $result['Kd_Buku'];                  
            $NamaKoleksi = $result['Judul_Buku'];
            $Pengarang = $result['Nama_Pengarang'];
            $NoRak = $result['No_Rak'];
            $Status = $result['Status'];
            $Estimasi = $result['Estimasi_Pengembalian'];
		?>
		<tr>
            <td class="tengah"><?php echo$no++?></td>;            
            <td class="tengah"><?php echo $KdKoleksi?></td>
            <td><?php echo $NamaKoleksi?></td>
            <td><?php echo $Pengarang?></td>
            <td class="tengah"><?php echo $NoRak?></td>
            <td><?php echo $Status?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>