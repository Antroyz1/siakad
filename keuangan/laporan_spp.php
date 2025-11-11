<html>
<head>
	<title>Laporan SPP</title>
	<?php 
		session_start();
		include "../koneksi.php";
		include "auth_user.php";
		$Kelas 			= $_POST["Kelas"];
		$Semester		= $_POST["Semester"];
		$no = 1;
		$tgl=date('d/m/Y');
		?>
		<style type="text/css">
			@media print{
				#tbl1 {background-color:#ff0000;
			}
		</style>
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
				<h1>LAP. KEUANGAN MAHASISWA</h1>
				
				<br>
					<table style='cellpadding:10; width:50%;'>
						<?php
							echo "
						<tr>
							<th align='left' width:'50%'>Kode Kelas</th>
							<td>: $Kelas</td>
						</tr>
						<tr>
							<th align='left'>Semester</th>
							<td>: $Semester</td>
						</tr>"
						?>
					</table>
				<br><br>
				
				<table border='1' style='width:90%; cellpadding:5;'>
					<?php 
					include "dt_lapspp.php"; ?>
				</table>
				<br>
				</center>
				<script>
					window.print();
				</script>
			

</body>
</html>