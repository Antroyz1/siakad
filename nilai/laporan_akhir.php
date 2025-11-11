<html>
<head>
	<title>Laporan Akhir</title>
	<?php 
			session_start();
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=laporanAkhir.xls");
			include "../koneksi.php";
			include "auth_user.php";
			setlocale(LC_TIME, 'id_ID.utf8');
			$Kode_Kelas			= $_POST["Kode_Kelas"];
			$Semester_aja		= $_POST["Semester"];
			
		$kreditsks = 0;
		$TotalMutu =0;
		$bobot=0;
		$tgl=date('d/m/Y');
		$khst=0;
		$rowcount=0;
		$no=1;
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
	<colgroup width="85"></colgroup>
	<colgroup width="176"></colgroup>
	<colgroup width="166"></colgroup>
	<colgroup span="37" width="85"></colgroup>
	<tr>
		<td colspan=40 height="23" align="center"><b><font face="Arial" size=3>AKADEMI KEBIDANAN PANCA BHAKTI PONTIANAK</font></b></td>
	</tr>
	<tr>
		<td colspan=40 height="23" align="center"><b><font face="Arial" size=3>KELAS <?php echo "$Kode_Kelas" ?> </font></b></td>
	</tr>
	<tr>
		<td colspan=40 height="23" align="center"><b><font face="Arial" size=3>SEMESTER <?php echo "$Semester_aja" ?> </font></b></td>
	</tr>
	<tr>
		<td colspan=40 height="23" align="center"><b><font face="Arial" size=3><br></font></b></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=5 height="97" align="center" valign=middle><b><font face="Arial">NO</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=5 align="center" valign=middle><b><font face="Arial">Nama Mahasiswa</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=5 align="center" valign=middle><b><font face="Arial">NIM</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=5 align="center" valign=middle><b><font face="Arial">Kode Matakuliah</font></b></td>
		<?php 
		$queryMakul = mysqli_query($konek, "SELECT Kode_Matakuliah, Nama_Matakuliah FROM matakuliah WHERE Semester_Matakuliah = '$Semester_aja' ORDER BY Kode_Matakuliah ASC"); 
			if($queryMakul == false){
				die("Terdapat Kesalahan : ". mysqli_error($konek));
			}
			$rowcount=mysqli_num_rows($queryMakul);
			$rowcountA = 4 * $rowcount ;
			?>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan= <?php echo "$rowcountA" ?>; align="center" valign=middle><b><font face="Arial">Nilai</font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=middle><b><font face="Arial">JUMLAH</font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=5 align="center" valign=middle><b><font face="Arial">TOTAL</font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=5 align="center" valign=middle><b><font face="Arial">B TOTAL </font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=5 align="center" valign=middle><b><font face="Arial">IPK</font></b></td>
		</tr>
		<tr>
		<?php
			while($mk1 = mysqli_fetch_array($queryMakul)){?>
		
			<td style='border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' colspan=4 rowspan=3 align='center' valign=middle><b><font face='Arial'><?php echo $mk1['Kode_Matakuliah']; ?> <br /> <?php echo $mk1['Nama_Matakuliah']; ?></font></b></td>
		
		<?php }?>
		</tr>
		<tr>				
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle><b><font face="Arial">B</font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle><b><font face="Arial">M</font></b></td>
		</tr>
		<tr>
		</tr>
		<tr>
			<?php 	for ($x = 0; $x < $rowcount; $x++) {
  						echo "
  						<td style='border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign=middle><b><font face='Arial'><br></font></b></td>
  						<td style='border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign=middle><b><font face='Arial'>N</font></b></td>
  						<td style='border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign=middle><b><font face='Arial'>B</font></b></td>
  						<td style='border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign=middle><b><font face='Arial'>M</font></b></td>";} ?>
		</tr>
		<?php 
			$querynilai = mysqli_query ($konek, "SELECT NIM_krs_Mhs, Kode_Matakuliah_krs, Kode_krs_Kelas, Total, Nilai, Mutu, Nama_Mahasiswa FROM krs
			INNER JOIN mahasiswa ON NIM=NIM_krs_Mhs WHERE Kode_krs_Kelas = '$Kode_Kelas' AND Semester_Ambil = '$Semester_aja' ORDER BY NIM ASC");
			if($querynilai == false){
				die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}
			while ($nilai = mysqli_fetch_array ($querynilai)){ 
				if ($nilai['Nilai'] == "A"){
					$AngkaNilai = "4";
				}elseif ($nilai['Nilai'] == "B") {
					$AngkaNilai = "3";
				}elseif ($nilai['Nilai'] == "C") {
					$AngkaNilai = "2";
				}elseif ($nilai['Nilai'] == "D") {
					$AngkaNilai = "1";
				}else {
					$AngkaNilai = "0";}?>
				<tr>
					<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="37" align="center" valign=middle sdval="1" sdnum="1057;0;0"><font face="Arial Narrow" size=3><?php echo $no; ?></font></td>
					<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Cambria" color="#000000"><?php echo $nilai['Nama_Mahasiswa']; ?></font></td>
					<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" sdval="211140981541001" sdnum="1057;0;0;[RED]0"><font face="Cambria" size=3 color="#000000"><?php echo $nilai['NIM_krs_Mhs']; ?></font></td>
					<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" sdval="211140981541001" sdnum="1057;0;0;[RED]0"><font face="Cambria" size=3 color="#000000"><?php echo $nilai['Kode_Matakuliah_krs']; ?></font></td>
					<td style='border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign=middle><b><font face='Arial'><?php echo $nilai['Total']; ?></font></b></td>
  				<td style='border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign=middle><b><font face='Arial'><?php echo $nilai['Nilai']; ?></font></b></td>
  				<td style='border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign=middle><b><font face='Arial'><?php echo $AngkaNilai; ?></font></b></td>
  				<td style='border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000' align='center' valign=middle><b><font face='Arial'><?php echo $nilai['Mutu']; ?></font></b></td>
			</tr>
			<?php $no++; } ?>		

</table>		
			
</body>
</html>