<html>

<head>
	<title>Laporan SPP</title>
	<?php 
		session_start();
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=hasil.xls");
		include "../koneksi.php";
		include "auth_user.php";
		$Kelas 			= $_POST["Kelas"];
		$Semester		= $_POST["Semester"];
		$no = 1;
		$kreditsks = 0;
		$bobot=0;
		$tgl=date('d/m/Y');
		$khst=0;
		?>
		<style type="text/css">
			@media print{
				#tbl1 {background-color:#ff0000;
			}
		</style>
</head>
<body>
	
				<table style="width: 100%;" >
					<tr>
						<th colspan="9"><h2>AKADEMI KEBIDANAN PANCA BHAKTI PONTIANAK</h1></th>
					</tr>
					<tr>
						<th colspan="9">Jl.Ahmad Yani II, Komp.Akbid Panca Bhakti Pontianak, Kubu Raya 78391</th>						
					</tr>
					<tr>
						<th colspan="9">Telp.(0561)6726777, Fax.(0561)711260</th>
					</tr>
					<tr>
						<th colspan="9">E-mail : akbidpbpontianak@gmail.com</th>
					</tr>
				</table>
				<hr width="100%">
					
				<br>
					<table style='cellpadding:10; width:100%;'>
						<?php
							echo "
						<tr>
							<th colspan='8'><h2>DAFTAR SPP MAHASISWA</h1></th>
						</tr>
						<tr>
							<th align='right' width:'50%' colspan='4'>Kode Kelas</th>
							<td colspan='4'>: $Kelas</td>
						</tr>
						<tr>
							<th align='right' colspan='4'>Semester</th>
							<td colspan='4'>: $Semester</td>
						</tr>"
						?>
					</table>
				<br><br>
				
				<table border='1' style='width:100%; cellpadding:2;'>
					<?php 
					include "dt_lapspp.php"; ?>
				</table>
				<br>
				</center>
				
			

</body>
</html>