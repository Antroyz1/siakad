<?php
include "../koneksi.php";

$Kode_Kelas_Bayar 	 = $_POST["Kode_Kelas_Bayar"];
$Semester_Pembayaran = $_POST["Semester_Pembayaran"];
$Status				 = $_POST["Status"];


if ($add = mysqli_query($konek, "INSERT INTO lunas (NIM_Lunas, Semester_Lunas, Angsuran1,Tanggal_Angsuran,Angsuran2, Tanggal_Lunas, Total, Status_Lunas) 
			SELECT NIM, '$Semester_Pembayaran', '0','', '0','','0','Belum Lunas' AS Status FROM mahasiswa  WHERE Kode_Kelas_Mhs= '$Kode_Kelas_Bayar' ORDER BY NIM DESC ")){
		
	header("Location: keuangan.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));


// if ($add = mysqli_query($konek, "INSERT INTO pembayaran (Kode_Kelas_Bayar, Semester_Pembayaran, Total_Bayar, Status) VALUES 
// 	('$Kode_Kelas_Bayar','$Semester_Pembayaran', '$Total_Bayar', '$Status')")){
// 		$mhs= mysqli_query($konek, "INSERT INTO lunas (NIM_Lunas, Semester_Lunas, SPP_Lunas,Tanggal_Lunas, Status_Lunas) 
// 			SELECT NIM, '$Semester_Pembayaran', '$Total_Bayar','','Belum Lunas' AS Status FROM mahasiswa WHERE Kode_Kelas_Mhs= $Kode_Kelas_Bayar");
// 	header("Location: keuangan.php");
// 		exit();
// 	}
// die ("Terdapat kesalahan : ". mysqli_error($konek));

?>