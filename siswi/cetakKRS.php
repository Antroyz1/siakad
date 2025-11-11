<html>
<head>
	<title>CETAK KRS</title>
	<?php 
			session_start();
			include "../koneksi.php";
			include "auth_user.php";
			$querykrs = mysqli_query ($konek, "SELECT NIM, Nama_Mahasiswa, Kode_Kelas_Mhs, NIP_PA, Semester_Aktif, NIP, Nama_Pegawai FROM mahasiswa INNER JOIN pegawai ON NIP=NIP_PA WHERE NIM='$_SESSION[Username]'");
			 if($querykrs == false){
				die ("Terjadi Kesalahan :". mysqli_error($konek));
				}
				
		$no = 1;
		$sks = 0;
		$bobot=0;
		$tgl=date('d/m/Y');
		$nm;
		$pa;
		?>
</head>
<body>
	
				<table style="width: 100%; border-spacing: 0.1px;" >
					<tr>
						<th rowspan="4"><img src="../aset/foto/logo2.png" width="100px"></th>
						<th>STIKES PANCA BHAKTI PONTIANAK</th>
					</tr>
					<tr>
						<th>Jl.Ahmad Yani II, Komp.STIKES Panca Bhakti Pontianak, Kubu Raya 78391</th>						
					</tr>
					<tr>
						<th>HP.  0823 5013 1717</th>
					</tr>
					<tr>
						<th>E-mail : stikespancabhaktipontianak@gmail.com</th>
					</tr>
				</table>
				<hr width="100%">
				<center>
				<h1>Kartu Rencana Studi</h1>
				
				<br><br>
					<table style='cellpadding:10; width:90%;'>
						<?php while ($krs = mysqli_fetch_array ($querykrs)){
							$SmsA=$krs['Semester_Aktif'];
							$nm=$krs['Nama_Mahasiswa'];
							$pa=$krs['Nama_Pegawai'];
							echo "
						<tr>
							<th align='left' width:'50%'>Nama</th>
							<td>: $krs[Nama_Mahasiswa]</td>
						</tr>
						<tr>
							<th align='left'>NIM</th>
							<td>: $krs[NIM]</td>
						</tr>
						<tr>
							<th align='left'>Jurusan</th>
							<td>: Kebidanan</td>
						</tr>
						<tr>
							<th align='left'>Dosen PA</th>
							<td>: $krs[Nama_Pegawai]</td>
						</tr>
						<tr>
							<th align='left'>Semester ke</th>
							<td>: $krs[Semester_Aktif]</td>
						</tr>";}
						?>
					</table>
				<br><br>
				
				<table border='1' style='width:90%; cellpadding:5;'>
					<?php 
					include "dt_cetakkrs.php"; ?>
				</table>
				<br>
				<table border='0' style='width:90%;'>
					<tr>
						<td>Dibuat rangkap 3:</td>
						<td colspan='2'><?php echo "Kubu Raya, ". $tgl ?></td>
					<tr>
					<tr>
						<td>1. Mahasiswa yang bersangkutan</td>
						<td rowspan='2'></td>
					</tr>
					<tr>
						<td>2. Dosen Pembimbing Akademik</td>
						
					</tr>
					<tr>
						<td>3. Akademik</td>
						<td>Menyetujui</td>
					</tr>
					<tr>
						<td style='width:50%; rowspan:4'></td>
						<th align='left' style='width:25%'>Dosen PA</th>
						<th align='left' style='width:25%'>Mahasiswa ybs</th>
					</tr>
					<tr>
						<td height='100px' colspan='3'></td>
					</tr>
					<tr>
						<th align='left' style='width:50%; rowspan:4'>Mahasiswa bertanggung jawab atas <br> ketelitian pengisian KRS ini</th>
						<td align='left' style='width:25%'><?php echo "(<b>". $pa."</b>)"; ?></td>
						<td align='left' style='width:25%'><?php echo "(<b>". $nm."</b>)"; ?></td>
					</tr>
				</table>
				</center>
				<script>
					window.print();
				</script>
			

</body>
</html>