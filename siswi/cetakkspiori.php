<html>
<head>
	<title>CETAK SKPI</title>
	<?php 
			session_start();
			include "../koneksi.php";
			include "auth_user.php";
			$queryskpi = mysqli_query ($konek, "SELECT * FROM mahasiswa WHERE NIM='$_SESSION[Username]'");
			 if($queryskpi == false){
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
					<h1>Surat Keterangan Pendamping Ijazah (SKPI)</h1>
					<h1>Diploma Supplement</h1>
				<?php while ($skpi= mysql_fetch_array ($queryskpi)){
					echo"
					$ubah_Tmpt = ucwords($skpi[Tempat_Lahir_Mhs]);
					<h1>Nomor: $skpi[no_skpi]</h1>
					<br>
				<p>Surat Keterangan Pendamping Ijazah (SKPI) sebagai dokumen pelengkap ijazah yang menerangkan kompetensi lulusan dan prestasi dari pemegang ijazah selama masa kuliah.</p>
				<p>The Diploma Supplement is a complementary document of diploma describing the learning outcomes and achievement of the holder during the period of study.</p>
				<div class='row'>
					<div class='col-12'>
						<table width='100%'>
							<thead>
								<tr>
									<th width='3%'>I.</th>
									<th colspan='3'>InFORMASI TENTANG DIRI PEMEGANG SKPI</th>
								</tr>
								<tr>
									<th></th>
									<th colspan='3'><i>INFORMATION IDENTIFYING THE HOLDER OF DIPLOMA SUPPLEMENT</i></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td width='3'>1.1</td>
									<td>Name / Nama Lengkap</td>
									<td>$skpi[Nama_Mahasiswa]</td>
								</tr>
								<tr>
									<td></td>
									<td width='3'>1.2</td>
									<td>Place and Date of Birth / Tempat dan Tanggal Lahir</td>
									<td>$ubah_Tmpt, $skpi[Tanggal_Lahir_Mhs]</td>
								</tr>
								<tr>
									<td></td>
									<td width='3'>1.3</td>
									<td>Student Identification Number/ Nomor Pokok Mahasiswa</td>
									<td>$skpi[NIM]</td>
								</tr>
								<tr>
									<td></td>
									<td width='3'>1.4</td>
									<td>Admission Year /Tahun Masuk</td>
									<td>$skpi[Tahun_Masuk]</td>
								</tr>
								<tr>
									<td></td>
									<td width='3'>1.5</td>
									<td>Graduation Year /Tahun Lulus</td>
									<td>$skpi[Tahun_Lulus]</td>
								</tr>
								<tr>
									<td></td>
									<td width='3'>1.6</td>
									<td>Number of Sertification / Nomor Ijazah</td>
									<td>$skpi[no_ijazah]</td>
								</tr>
								<tr>
									<td></td>
									<td width='3'>1.7</td>
									<td>Title / Gelar</td>
									<td>Ahli Madya Kebidanan (A.Md Keb.)</td>
								</tr>
							</tbody>
						
					";}
				?>
							<tr style="visibility:hidden">
								<th colspan="4">asdasdds</th>
							</tr>
						<thead>
						<tr>
							<th width="3%">II.</th>
							<th colspan="3">INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM</th>
						</tr>
						<tr>
							<th></th>
							<th colspan="3" class="spasi"><i>INFORMATION IDENTIFYING AWARDING INSTITUTION</i></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td width="5%">2.1</td>
							<td><i>Accreditation Decree Number</i> / <br> Nomor SK Akreditasi Perguruan Tinggi</td>
							<td>1038/SK/BAN-PT/Akred/PT/X/2015</td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.2</td>
							<td><i>Name of University</i> / Nama Perguruan Tinggi</td>
							<td class="spasi"><i>Panca Bhakti Midwifery Academy Pontianak</i>/ <br>Akademi Kebidanan Panca Bhakti Pontianak</td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.3</td>
							<td><i>Accreditation Decree Number</i> / <br> Nomor SK Akreditasi Program Studi</td>
							<td class="spasi">110/SK/BAN-PT/Ak-SURV/Dpl-III/IV/2014</td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.4</td>
							<td><i>Study Program</i> / Nama Program Studi</td>
							<td class="spasi"><i>DIII of Midwifery</i> / DIII Kebidanan</td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.5</td>
							<td><i>Classification Study</i> / Jenis Pendidikan</td>
							<td class="spasi"><i>Academic / Akademik</i></td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.6</td>
							<td>Education / Jenjang Pendidikan</td>
							<td class="spasi"><i>Diploma III</i></td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.7</td>
							<td>Appropriate Level of Qualification KKNI / <br>Jenjang Kualifikasi sesuai KKNI</td>
							<td class="spasi">Level 5</i></td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.8</td>
							<td>Access Requirements / Persyaratan Penerimaan </td>
							<td class="spasi">High School Certificate and Pass The New Student Selection <br> Lulus SMA dan lulus Seleksi Mahasiswa Baru
</i></td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.9</td>
							<td><i>Language Study</i> / Bahasa Pengantar Kuliah</td>
							<td class="spasi"><i>Indonesian Language</i>/ Bahasa Indonesia</td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.10</td>
							<td><i>Grading System</i>/Sistem Penilaian</td>
							<td>Skala 0-4; A=4, B=3, C=2, D=1, E=0</td>
						</tr>
						<tr>
							<td></td>
							<td width="5%">2.11</td>
							<td><i>Access to Further Study</i> / Jenis dan Jenjang Pendidikan Lanjutan</td>
							<td><i>Bachelor Degree of Midwifery<br>Graduated Degree of Midwifery</i><br>DIV Kebidanan<br>S1 Kebidanan</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
		
					
					

					<!-- INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM -->
					
				
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