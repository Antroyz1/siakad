<html>
<head>
	<title>CETAK LOGBOOK</title>
	<?php 
			session_start();
			include "../koneksi.php";
			include "auth_user.php";
			$Skr		= $_POST["Kode_matkulpinjam"];
			$querykhsa = mysqli_query ($konek, "SELECT NIM, Nama_Mahasiswa, Kode_Kelas_Mhs, Semester_Aktif,NIP_PA,NIP, Nama_Pegawai FROM mahasiswa 
			INNER JOIN pegawai ON NIP=NIP_PA WHERE NIM='$_SESSION[Username]'");
			  if($querykhsa == false){
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
				<h1>Log Book</h1>
				
				<br><br>
					<table cellpadding="3" style='width:90%;'>
						<?php while ($khsa = mysqli_fetch_array ($querykhsa)){
							//$khst=$khsa['Semester_Aktif'];
							$khst=$Skr;
							if ($khst>1){
								$khsblm=$khst-1;
							}else{
								$khsblm=1;
							}
							$pa=$khsa['Nama_Pegawai'];
							echo "
						<tr>
							<th align='left' style='width:25%;'>Nama</th>
							<td>: $khsa[Nama_Mahasiswa]</td>
							
						</tr>
						<tr>
							<th align='left' style='width:25%;'>Angkatan(Kelas)</th>
							<td>: $khsa[Kode_Kelas_Mhs]</td>

						</tr>
						<tr>
							<th align='left'>NPM</th>
							<td>: $khsa[NIM]</td>
							
							
						</tr>";
						} 
						?>
						
					</table>
				<br><br>

				<table border='1' style='width:90%; cellpadding:5;'>
					<?php 
					include "dt_Logbook.php"; 
					?>
				</table><br>
				
				<script>
					window.print();
				</script>				
</body>
</html>