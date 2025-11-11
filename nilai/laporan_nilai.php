<html>
<head>
	<title>Laporan Nilai</title>
	<?php 
			session_start();
			include "../koneksi.php";
			include "auth_user.php";
			$Kd 				= $_POST["Kode_Matakuliah_Nilai"];
			$Kelas				= $_POST["Kode_Kelas"];
			$querymakul = mysqli_query ($konek, "SELECT Kode_Matakuliah, Nama_Matakuliah, Semester_Matakuliah, SKS FROM matakuliah
				WHERE Kode_Matakuliah='$Kd'");
			  if($querymakul == false){
			 	die ("Terjadi Kesalahan :". mysqli_error($konek));
			 	}
		$no = 1;
		$kreditsks = 0;
		$bobot=0;
		$tgl=date('d/m/Y');
		$khst=0;
		?>
</head>
<body>
	
				<table style="width: 100%; border-spacing: 0.1px;" >
					<tr>
						<th rowspan="4"><img src="../aset/foto/logo.png" width="100px"></th>
						<th>AKADEMI KEBIDANAN PANCA BHAKTI PONTIANAK</th>
					</tr>
					<tr>
						<th>Jl.Ahmad Yani II, Komp.Akbid Panca Bhakti Pontianak, Kubu Raya 78391</th>						
					</tr>
					<tr>
						<th>Telp.(0561)6726777, Fax.(0561)711260</th>
					</tr>
					<tr>
						<th>E-mail : akbidpbpontianak@gmail.com</th>
					</tr>
				</table>
				<hr width="100%">
				<center>
				<h1>DAFTAR NILAI MAHASISWA</h1>
				
				<br><br>
					<table style='cellpadding:10; width:50%;'>
						<?php while ($makul = mysqli_fetch_array ($querymakul)){
							echo "
						<tr>
							<th align='left' width:'50%'>Kode Matakuliah</th>
							<td>: $makul[Kode_Matakuliah]</td>
						</tr>
						<tr>
							<th align='left'>Nama Matakuliah</th>
							<td>: $makul[Nama_Matakuliah]</td>
						</tr>
						<tr>
							<th align='left'>Kelas</th>
							<td>: $Kelas</td>
						</tr>
						<tr>
							<th align='left'>SKS</th>
							<td>: $makul[SKS]</td>
						</tr>";}
						?>
					</table>
				<br><br>
				
				<table border='1' style='width:90%; cellpadding:5;'>
					<?php 
					include "dt_lapmakul.php"; ?>
				</table>
				<br>
				</center>
				<script>
					window.print();
				</script>
			

</body>
</html>