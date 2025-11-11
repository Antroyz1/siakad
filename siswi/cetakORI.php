<html>
<head>
	<title>CETAK KHS</title>
	<?php 
			session_start();
			include "../koneksi.php";
			include "auth_user.php";
			$Skr		= $_POST["Semester_Skr"];
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
				<h1>Kartu Hasil Studi</h1>
				
				<br><br>
					<table cellpadding="3" style='width:90%;'>
						<?php while ($khsa = mysqli_fetch_array ($querykhsa)){
							$khst=$khsa['Semester_Aktif'];
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
							<th align='left' style='width:25%;'>Angkatan(Kelas)</th>
							<td>: $khsa[Kode_Kelas_Mhs]</td>
						</tr>
						<tr>
							<th align='left'>NPM</th>
							<td>: $khsa[NIM]</td>
							<th align='left'>Semester</th>
							<td>: $Skr</td>
							// <td>: $khsa[Semester_Aktif]</td>
						</tr>";
						} 
						?>
						
					</table>
				<br><br>

				<table border='1' style='width:90%; cellpadding:5;'>
					<?php 
					include "dt_cetakkhs.php"; 
					?>
				</table><br>
				<table border="1" style="width: 90%">
					<tr>
						<?php 
							$querykum = mysqli_query($konek, "SELECT * FROM ipkkumulatif WHERE Nim_kum_Mhs='$_SESSION[Username]' AND Semester='$khst'");
								if($querykum == false){
									die ("Terjadi Kesalahan : ". mysqli_error($konek));
								}
								while($qkum = mysqli_fetch_array($querykum)){ 
									$skp=$qkum['Sikap'];?>
						<th style="width: 15%">IP Sem.</th>
						<td style="width: 15%"><?php echo ": ".number_format($qkum['IP_Sem'],2); ?></td>
						<th style="width: 15%">Jum. Mutu</th>
						<td style="width: 15%"><?php echo ": ".$bobot ?></td>
						<th colspan="2" style="width: 40%"><u>Hasil Semester Sebelumnya</u></th>
					</tr>
					<tr>
						<th style="width: 15%">IP Kum.</th>
						<td style="width: 15%"><?php echo ": ".number_format($qkum['IP_kum'],2); ?></td>
						<th style="width: 15%">Kredit Sem.</th>
						<td style="width: 15%"><?php echo ": ".$qkum['SKS_kum']; ?></td>
						<?php }
					$querykumlama= mysqli_query($konek, "SELECT * FROM ipkkumulatif WHERE Nim_kum_Mhs='$_SESSION[Username]' AND Semester='$khsblm'");
								if($querykumlama == false){
									die ("Terjadi Kesalahan : ". mysqli_error($konek));
								}
								while($qkumlm = mysqli_fetch_array($querykumlama)){ ?>
						<th style="width: 15%">IP Sem.</th>
						<td style="width: 15%"><?php echo ": ".number_format($qkumlm['IP_Sem'],2); ?></td>
					</tr>
					<tr>
						<th style="width: 15%">Sikap</th>
						<td style="width: 15%"><?php echo ": ".$skp; ?> </td>
						<th colspan="2" style="width: 40%"></th>
						<th style="width: 15%">IP Kum.</th>
						<td style="width: 15%"><?php echo ": ".number_format($qkumlm['IP_kum'],2); ?></td>
					</tr>
				</table>
				<br>
				<table border='0' style='width:90%;'>
					<tr>
						<td>Dibuat rangkap 3:</td>
						<td rowspan="3"></td>
					<tr>
					<tr>
						<td>1. Mahasiswa yang bersangkutan</td>
					</tr>
					<tr>
						<td>2. Dosen Pembimbing Akademik</td>
					</tr>
					<tr>
						<td style="width: 70%;">3. Akademik</td>
						<td align='left' style="width: 30%;"><?php echo "  Kubu Raya, ". $tgl ?></td>
					</tr>
					<?php 
					} ?>
					<tr>
						<td style='width:50%; rowspan:4'></td>
						<th align='center' style='width:25%'>Pembimbing Akademik</th>
					</tr>
					<tr>
						<td height='100px' colspan='3'></td>
					</tr>
					<tr>
						<th align='center' style='width:50%; rowspan:4'></th>
						<td align='center' style='width:50%'><?php echo "(<b>". $pa."</b>)"; ?></td>
					</tr>
				</table>
				</center>
				<script>
					window.print();
				</script>				
</body>
</html>