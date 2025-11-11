<html>
<head>
	<title>CETAK SKPI</title>
	<?php 
			session_start();
			include "../koneksi.php";
			include "auth_user.php";
			$thnMasuk= $_POST['thnMasuk'];
			$thnLulus= $_POST['thnLulus'];
			$queryskpi = mysqli_query ($konek, "SELECT * FROM mahasiswa INNER JOIN pegawai ON NIP=NIP_PA WHERE NIM='$_SESSION[Username]'");
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
					<h1>Surat Keterangan Pendamping Ijazah (SKPI)</h1>
					<h2>Diploma Supplement</h2>
					<?php while ($skpi= mysqli_fetch_array ($queryskpi)){
						$noSKPI=$skpi['no_skpi'];
						$noIjazah= $skpi['no_Ijazah'];
						$pa=$skpi['Nama_Pegawai'];
						$nm=$skpi['Nama_Mahasiswa'];
						$ubah_Tmpt = ucwords($skpi['Tempat_Lahir_Mhs']);

					echo"<h2>Nomor: $skpi[no_skpi]</h2>
					<br>
				<p>Surat Keterangan Pendamping Ijazah (SKPI) sebagai dokumen pelengkap ijazah yang menerangkan kompetensi lulusan dan prestasi dari pemegang ijazah selama masa kuliah.</p>
				<p>The Diploma Supplement is a complementary document of diploma describing the learning outcomes and achievement of the holder during the period of study.</p>
				<div class='row'>
					<div class='col-12'>
						<table width='100%'>
								<tr>
									<th width='3%'>I.</th>
									<th colspan='3'>INFORMASI TENTANG DIRI PEMEGANG SKPI</th>
								</tr>
								<tr>
									<th></th>
									<th colspan='3'><i>INFORMATION IDENTIFYING THE HOLDER OF DIPLOMA SUPPLEMENT</i></th>
								</tr>
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
									<td>$thnMasuk</td>
								</tr>
								<tr>
									<td></td>
									<td width='3'>1.5</td>
									<td>Graduation Year /Tahun Lulus</td>
									<td>$thnLulus</td>
								</tr>
								<tr>
									<td></td>
									<td width='3'>1.6</td>
									<td>Number of Sertification / Nomor Ijazah</td>
									<td>$skpi[no_Ijazah]</td>
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
						
						<tr>
							<th width="3%">II.</th>
							<th colspan="3">INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM</th>
						</tr>
						<tr>
							<th></th>
							<th colspan="3" class="spasi"><i>INFORMATION IDENTIFYING AWARDING INSTITUTION</i></th>
						</tr>
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
							<td><i>Name of University</i> /<br>Nama Perguruan Tinggi</td>
							<td class="spasi"><i>Panca Bhakti Midwifery Academy Pontianak</i> / <br>Akademi Kebidanan Panca Bhakti Pontianak</td>
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
							<td class="spasi"><i>Academic</i> / Akademik</td>
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
							<td><i>Access to Further Study /</i> <br>Jenis dan Jenjang Pendidikan Lanjutan</td>
							<td><i>Bachelor Degree of Midwifery<br>Graduated Degree of Midwifery</i><br>S1 Kebidanan<br>DIV Kebidanan</td>
						</tr>
						
					</tbody>
						<tr>
							<th width="3%">III.</th>
							<th colspan="3">INFORMASI TENTANG KUALIFIKASI DAN HASIL YANG DICAPAI</th>
						</tr>
						<tr>
							<th></th>
							<th colspan="3" class="spasi"><i>INFORMATION OF QUALIFICATION AND LEARNING OUTCOMES</i></th>
						</tr>
						<tr>
							<th width="3%">A.</th>
							<th align=left valign=bottom colspan="3">Capaian Pembelajaran</th>
						</tr>
						<tr>
							<th></th>
							<th align=left valign=bottom colspan="3" class="spasi"><i>Learning Outcomes</i></th>
						</tr>
						<tbody>
							<tr>
								<td></td>
								<td align=left valign=top width="5%">3.A.1</td>
								<td text-align= justify><i>Capable of providing midwifery care in an effective, safe , and holistically by taking into account the cultural aspects of the pregnant women, maternity, childbirth and breastfeeding , newborns , toddlers and reproductive health in normal conditions based midwifery practice standards and professional code of ethics.</i></td>
								<td >Mampu memberikan asuhan kebidanan secara efektif, aman, dan holistik dengan memperhatikan aspek budaya terhadap ibu hamil, bersalin, nifas dan menyusui, bayi baru lahir, balita dan kesehatan reproduksi pada kondisi normal berdasarkan standar praktik kebidanan dan kode etik profesi.</td>
							</tr>
							<tr>
								<td></td>
								<td align=left valign=top width="5%">3.A.2</td>
								<td><i>Capable of providing emergency treatment for pregnant women, maternity , childbirth and breastfeeding , newborns , toddlers and reproductive health in accordance with its authority.</i></td>
								<td>Mampu memberikan penanganan kegawatdaruratan pada ibu hamil, bersalin, nifas dan menyusui, bayi baru lahir, balita dan kesehatan reproduksi sesuai dengan kewenangannya.</td>
							</tr>
							<tr>
								<td></td>
								<td align=left valign=top width="5%">3.A.3</td>
								<td><i>Capable of performing promotive, preventive, early detection and community empowerment in midwifery care.</i></td>
								<td>Mampu melakukan upaya promotif, preventif, deteksi dini dan pemberdayaan masyarakat dalam pelayanan kebidanan.</td>
							</tr>
							<tr>
								<td></td>
								<td align=left valign=top width="5%">3.A.4</td>
								<td><i>Capable of having professionally , ethically and morally attitude as well as the responsibility to the socio-cultural values ​​in the midwifery practice.</i></td>
								<td>Mampu berperilaku profesional, beretika dan bermoral serta tanggap terhadap nilai sosial budaya dalam praktik kebidanan.</td>
							</tr>

						</tbody>
						

						<tr>
							<th width="3%">B.</th>
							<th align=left valign=bottom colspan="3">Informasi Tambahan</th>
						</tr>
						<tr>
							<th></th>
							<th align=left valign=bottom colspan="3" class="spasi"><i>Additional Information</i></th>
						</tr>
						<tr>
							<td></td>
								<td align=left valign=top width="5%">3.B.1</td>
								<td text-align= justify><i>Honors and Awards</i><br>Penghargaan dan Pemenang Kejuaraan</td>
							<td ></td>
						</tr>
						<tr>
							<td></td>
								<td align=left valign=top width="5%">3.B.2</td>
								<td text-align= justify><i>Organization Experiences</i><br>Pengalaman Berorganisasi</td>
							<td ></td>
						</tr>
						<tr>
							<td></td>
								<td align=left valign=top width="5%">3.B.3</td>
								<td text-align= justify><i>Specification of The Final Project</i><br>Spesifikasi Tugas Akhir</td>
							<td ></td>
						</tr>
						<tr>
							<td></td>
								<td align=left valign=top width="5%">3.B.4</td>
								<td text-align= justify><i>International Language</i><br>Bahasa Internasional</td>
							<td ></td>
						</tr>
						<tr>
							<td></td>
								<td align=left valign=top width="5%">3.B.5</td>
								<td text-align= justify><i>Internship</i><br>Magang</td>
							<td ></td>
						</tr>
						<tr>
							<td></td>
								<td align=left valign=top width="5%">3.B.6</td>
								<td text-align= justify><i>Soft Skill Training</i><br>Pendidikan Karakter</td>
							<td ></td>
						</tr>
						<tr>
							<td></td>
								<td align=left valign=top width="5%">3.B.7</td>
								<td text-align= justify><i>SIKAP<br>KEJUJURAN<br>KEPUDULIAN<br>TANGGUNG JAWAB<br>DISIPLIN<br>KERJA SAMA<br>KEINGINTAHUAN </i></td>
							<td ></td>
						</tr>
						
				</table>
				
				</center>
				<script>
					window.print();
				</script>
			

</body>
</html>