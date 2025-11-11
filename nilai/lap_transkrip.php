<html>

<head>
	<title>TRANSKRIP NILAI</title>
	<?php 
			session_start();
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=TRANSKRIP.xls");
			include "../koneksi.php";
			include "auth_user.php";
			setlocale(LC_TIME, 'id_ID.utf8');
			$NIM 				= $_POST["NIM"];
			$Nama 				= $_POST["Nama_Mahasiswa"];
			$Tempat_Lahir		= $_POST["Tempat_Lahir"];
			$Tanggal_Lahir		= $_POST["Tanggal_Lahir"];
			$Tgl_Yudisium 		= $_POST["Tgl_Yudisium"];
			$No_Seri 			= $_POST["No_Seri"];
			$No_Reg 			= $_POST["No_Reg"];
			$JudulKTI 			= $_POST["JudulKTI"];
			$UTul 				= $_POST["UTul"];
			$UTek 				= $_POST["UTek"];
			$UKti 				= $_POST["UKti"];
			$Yudisium 			= $_POST['Yudisium'];
			$formatted_tgl = date('d F Y',strtotime($Tanggal_Lahir));
			$formatted_Yudisium = date('d F Y',strtotime($Tgl_Yudisium));
			// $querytrasnskip = mysqli_query ($konek, "SELECT * FROM mahasiswa 
			// 	INNER JOIN krs ON NIM = NIM_krs_Mhs
			// 	INNER JOIN  matakuliah ON Kode_Matakuliah_krs = Kode_Matakuliah
			// 	INNER JOIN krs ON NIM_krs_Mhs = NIM
			// 	INNER JOIN nilai ON Id_Nilai_krs = Id_krs
			// 	WHERE NIM='$NIM'");
			//   if($querytrasnskip == false){
			//  	die ("Terjadi Kesalahan :". mysqli_error($konek));
			//  	}
		$kreditsks = 0;
		$TotalMutu =0;
		$bobot=0;
		$tgl=date('d/m/Y');
		$khst=0;
		?>
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
</head>
<body>
	<table cellspacing="0" border="0">
		<colgroup width="83"></colgroup>
		<colgroup width="37"></colgroup>
		<colgroup width="67"></colgroup>
		<colgroup width="581"></colgroup>
		<colgroup span="3" width="62"></colgroup>
		<colgroup width="87"></colgroup>
		<colgroup width="61"></colgroup>
		<tr></tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-top: 3px solid #000000; border-left: 3px solid #000000; border-right: 3px solid #000000" colspan=9 height="20" align="center" valign=bottom><b><u><font size=3>T R A N S K R I P       A K A D E M I K</font></u></b></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000; border-right: 3px solid #000000" colspan=9 height="20" align="center" valign=bottom><i><font size=3>(Academic Transcript)</font></i></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="leftr" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><font size=1><br></font></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="19" align="left"><br></td>
			<td colspan=3 align="left" valign=bottom><b>NAMA LENGKAP (FULL NAME)</b></td>
			<td align="left" valign=middle><b>: <?php echo "$Nama" ?> AMd.Keb</b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td style="border-right: 3px solid #000000" align="left" valign=bottom><b><br></b></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="19" align="left"><br></td>
			<td colspan=3 align="left" valign=bottom><b>TEMPAT TANGGGAL LAHIR (DATE AND PLACE OF BIRTH)</b></td>
			<td align="left" valign=bottom sdnum="1033;0;0"><b>: <?php echo"$Tempat_Lahir, ".$formatted_tgl."</p>"?></b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td style="border-right: 3px solid #000000" align="left" valign=bottom><b><br></b></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="19" align="left"><br></td>
			<td colspan=3 align="left" valign=bottom><b>NOMOR POKOK MAHASISWA (STUDENT REGISTRATION NUMBER)</b></td>
			<td align="left" valign=bottom sdnum="1033;0;@"><b>: <?php echo "$NIM" ?></b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td align="center" valign=bottom><b><br></b></td>
			<td align="center" valign=bottom><b><br></b></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="19" align="left"><br></td>
			<td colspan=3 align="left" valign=bottom><b>TANGGAL YUDISIUM (DATE OF YUDICIUM)</b></td>
			<td align="left" valign=bottom><b>:  <?php echo "".$formatted_Yudisium.""?></b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td align="center" valign=bottom><b><br></b></td>
			<td align="center" valign=bottom><b><br></b></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="19" align="left"><br></td>
			<td colspan=3 align="left" valign=bottom><b>NOMOR SERI IJAZAH (SERTIFICATE NUMBER)</b></td>
			<td align="left" valign=bottom><b>: <?php echo "$No_Seri" ?></b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td align="center" valign=bottom><b><br></b></td>
			<td align="center" valign=bottom><b><br></b></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="19" align="left"><br></td>
			<td colspan=3 align="left" valign=bottom><b>NOMOR REGISTER IJAZAH (CERTIFICATE REGISTRATION NUMBER)</b></td>
			<td align="left" valign=bottom><b>: <?php echo " $No_Reg" ?></b></td>
			<td align="left" valign=bottom><b><br></b></td>
			<td align="center" valign=bottom><b><br></b></td>
			<td align="center" valign=bottom><b><br></b></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="19" align="left"><br></td>
			<td style="border-bottom: 0px solid #000000" colspan=3 align="left" valign=bottom><b>A NILAI SEMESTER I s.d VI (Semester Grade)</b></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-top: 1px solid #000000; border-left: 3px solid #000000; border-right: 1px solid #000000" rowspan=2 height="34" align="center" valign=middle><b>SEMESTER</b></td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b>NO</b></td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b>KODE</b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle><b>MATA KULIAH (COURSE TITLE)</b></td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b>BOBOT</b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom><b>NILAI </b></td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b>BOBOT</b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 3px solid #000000" rowspan=3 align="center" valign=middle><b>IP</b></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b>MA</b></td>
			<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b>KREDIT</b></td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b>HURUF</b></td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b>ANGKA</b></td>
			<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b>X NILAI</b></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-bottom: 2px double #000000; border-left: 3px solid #000000; border-right: 1px solid #000000" height="17" align="center" valign=middle><b><i>Smt Grade</i></b></td>
			<td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><i>Num</i></b></td>
			<td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b><i>Code</i></b></td>
			<td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b><i>Scu</i></b></td>
			<td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b><i>Grade</i></b></td>
			<td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b><i>Score</i></b></td>
			<td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b><i>Scu x Score</i></b></td>
		</tr>
		<?php 
		$no=1;
		$AngkaNilai="";
		$queryip = mysqli_query ($konek, "SELECT * FROM krs 
			INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah 
			INNER JOIN ipkkumulatif ON NIM_krs_Mhs = NIM_kum_Mhs AND Semester_Matakuliah = Semester WHERE NIM_krs_Mhs='$NIM' ORDER BY Semester ASC");
		 if($queryip == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$rowcount=mysqli_num_rows($queryip);

						while ($qip = mysqli_fetch_array ($queryip)){
								$kreditsks += $qip['SKS_krs'];
								$TotalMutu += $qip['Mutu'];
								$IPSem = number_format($qip['IP_Sem'],2);
								if ($qip['Nilai'] == "A"){
									$AngkaNilai = "4";
								}elseif ($qip['Nilai'] == "B") {
									$AngkaNilai = "3";
								}elseif ($qip['Nilai'] == "C") {
									$AngkaNilai = "2";
								}elseif ($qip['Nilai'] == "D") {
									$AngkaNilai = "1";
								}else {
									$AngkaNilai = "0";}
							echo "
								<tr>
									<td width='0.57 cm'></td>
									<td style='border-bottom: 1px solid #000000; border-left: 3px solid #000000; border-right: 1px solid #000000' align='center' valign='middle'>$qip[Semester]</td>
									<td style='border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign='bottom'>$no</td>
									<td style='border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign='bottom'>$qip[Kode_Matakuliah]</td>
									<td style='border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='left' valign='bottom'>$qip[Nama_Matakuliah]</td>
									<td style='border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign='bottom'>$qip[SKS_krs]</td>
									<td style='border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign='bottom'>$qip[Nilai]</td>
									<td style='border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign='bottom'>$AngkaNilai</td>
									<td style='border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign='bottom'>$qip[Mutu]</td>
									<td style='border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 3px solid #000000' align='center' valign='bottom'>$IPSem</td>
								</tr>";

								$no++;

						}
					?>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left" valign=middle><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom>Jumlah Bobot Kredit (Total Scu)</td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><?php echo ":  $kreditsks" ?></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left" valign=middle><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom>Jumlah (Bobot X Kredit) (Total Scu X Score)</td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><?php echo ":  $TotalMutu" ?></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><i>Indeks Prestasi Kumulatif (IPK) Semester (Grade Point Average)</i></td>
			<td align="center" valign=bottom><i><br></i></td>
			<td align="left" valign=bottom sdnum="1033;0;0.00">:   
				<?php 
				$queryipk1 = mysqli_query ($konek, "SELECT IP_Kum FROM ipkkumulatif WHERE NIM_kum_Mhs='$NIM' AND Semester = '6'"); 
				if($queryipk1 == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($qipk1 = mysqli_fetch_array ($queryipk1)){
							echo "$qipk1[IP_Kum]";
							
						}
				?>
			</td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom sdnum="1033;0;0"><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><b>B</b></td>
			<td align="left" valign=bottom><b>Nilai Ujian Akhir Program (Final Examination Program)</b></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom sdnum="1033;0;0.00"><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom>1. Nilai Rata-rata Ujian Tulis (Comprehensive Examination Grade Point average)</td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><?php echo ":  $UTul" ?></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom sdnum="1033;0;0.00"><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom>2. Nilai Rata-rata Ujian Praktik (Practice Grade Point average)</td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><?php echo ":  $UTek" ?></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom>3. Nilai Ujian Karya Tulis Ilmiah (Scientific Writing)</td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><?php echo ":  $UKti" ?><td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><i>Indeks Prestasi Kumulatif Akhir Program (Grade Point Average)</i></td>
			<td align="center" valign=bottom><i><br></i></td>
			<td align="left" valign=bottom sdnum="1033;0;0.00">:   
				<?php 
				$queryipk2 = mysqli_query ($konek, "SELECT IP_Kum FROM ipkkumulatif WHERE NIM_kum_Mhs='$NIM' AND Semester = '6'"); 
				if($queryipk2 == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($qipk2 = mysqli_fetch_array ($queryipk2)){
							echo "$qipk2[IP_Kum]";
							
						}
				?>
			</td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><b>C</b></td>
			<td align="left" valign=bottom><b>Nilai Yudisium (Yudicium Grade)</b></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><?php echo ":  $Yudisium" ?><td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><b>Judul Karya Tulis / Kasus (Scientific Writing)</b></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom>:</td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td colspan=2 align="left" valign=bottom><?php echo "$JudulKTI" ?> </td>
			<td align="left" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="center" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="17" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td style="border-right: 3px solid #000000" colspan=6 align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="18" align="left"><br></td>
			<td align="left"><br></td>
			<td align="center" valign=bottom><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td style="border-right: 3px solid #000000" align="left"><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="18" align="left"><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td align="left"><br></td>
			<td style="border-right: 3px solid #000000" align="left"><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="18" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<?php setlocale(LC_TIME, 'id_ID.utf8');$Skrg =date('d F Y');
			echo "<td colspan=4 align='center' valign=bottom>Kubu Raya, $Skrg" ?></td>
			<td style="border-right: 3px solid #000000" align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td width="0.57 cm"></td>
			<td style="border-left: 3px solid #000000" height="18" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td colspan=4 align="center" valign=bottom>Direktur</td>
			<td style="border-right: 3px solid #000000" align="left" valign=bottom><br></td>
		</tr>
	<tr>
		<td width="0.57 cm"></td>
		<td style="border-left: 3px solid #000000" height="18" align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td colspan=4 align="center" valign=bottom>Akademi Kebidanan Panca Bhakti Pontianak</td>
		<td style="border-right: 3px solid #000000" align="left" valign=bottom><br></td>
	</tr>
	<tr>
		<td width="0.57 cm"></td>
		<td style="border-left: 3px solid #000000" height="18" align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-right: 3px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td width="0.57 cm"></td>
		<td style="border-left: 3px solid #000000" height="18" align="left"><br></td>
		<td align="left"><br></td>
		<td align="center" valign=bottom><br></td>
		<td align="center" valign=bottom><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-right: 3px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td width="0.57 cm"></td>
		<td style="border-left: 3px solid #000000" height="18" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-right: 3px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td width="0.57 cm"></td>
		<td style="border-left: 3px solid #000000" height="18" align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-right: 3px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td width="0.57 cm"></td>
		<td style="border-left: 3px solid #000000" height="18" align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td colspan=4 align="center" valign=bottom><u>Dr. Windiyati, M.Kes</u></td>
		<td style="border-right: 3px solid #000000" align="left" valign=bottom><u><br></u></td>
	</tr>
	<tr>
		<td width="0.57 cm"></td>
		<td style="border-left: 3px solid #000000" height="18" align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td align="left" valign=bottom><br></td>
		<td colspan=4 align="center" valign=bottom>NIP. 195809111980082001</td>
		<td style="border-right: 3px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td width="0.57 cm"></td>
		<td style="border-bottom: 3px solid #000000; border-left: 3px solid #000000" height="18" align="left" valign=bottom><br></td>
		<td style="border-bottom: 3px solid #000000" align="left" valign=bottom><br></td>
		<td style="border-bottom: 3px solid #000000" align="left" valign=bottom><br></td>
		<td style="border-bottom: 3px solid #000000" align="left" valign=bottom><br></td>
		<td style="border-bottom: 3px solid #000000" align="left"><br></td>
		<td style="border-bottom: 3px solid #000000" align="left"><br></td>
		<td style="border-bottom: 3px solid #000000" align="left"><br></td>
		<td style="border-bottom: 3px solid #000000" align="left"><br></td>
		<td style="border-bottom: 3px solid #000000; border-right: 3px solid #000000" align="left"><br></td>
	</tr>
	</table>
</body>
</html>