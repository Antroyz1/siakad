<?php
include "../koneksi.php";

$NIM_krs_Mhs				= $_POST["NIM_krs_Mhs"];
$Kode_Matakuliah_krs		= $_POST["Kode_Matakuliah_krs"];
$Kode_krs_Kelas				= $_POST["Kode_krs_Kelas"];
$Semester_Ambil				= $_POST["Semester_Ambil"];
$SKS_krs				 	= $_POST["SKS_krs"];
$Status 					= $_POST["Status"];

// if ($add = mysqli_query($konek, "INSERT INTO krs (NIM_krs_Mhs, Kode_Matakuliah_krs, Kode_krs_Kelas, Semester_Ambil, SKS_krs, Status) VALUES 
// 	('$NIM_krs_Mhs', '$Kode_Matakuliah_krs', '$Kode_krs_Kelas', '$Semester_Ambil', '$SKS_krs', '$Status') ON DUPLICATE KEY UPDATE Semester_Ambil='$Semester_Ambil', SKS_krs='$SKS_krs', Status='$Status'")){
// 		$queryambil=mysqli_query($konek,"SELECT Id_krs FROM krs WHERE NIM_krs_Mhs='$NIM_krs_Mhs' AND Kode_Matakuliah_krs='$Kode_Matakuliah_krs'");
// 		while ($ambil = mysqli_fetch_array ($queryambil)){
// 		$nilai = mysqli_query($konek, "INSERT INTO nilai(Id_Nilai_krs) Values ($ambil[Id_krs]) ON DUPLICATE KEY UPDATE Id_Nilai_krs='$ambil[Id_krs]'");}
// 		header("Location: krs.php");
// 		exit();
// 	}
// die ("Terdapat kesalahan : ". mysqli_error($konek));
	$cek=mysqli_query($konek,"SELECT * FROM krs WHERE NIM_krs_Mhs='$NIM_krs_Mhs' AND Kode_Matakuliah_krs='$Kode_Matakuliah_krs'") or die("Terjadi Kesalahan :". mysqli_error($konek));
	$rowcount=mysqli_num_rows($cek);
	if($rowcount){
 		$ubah = mysqli_query($konek, "UPDATE krs SET Semester_Ambil='$Semester_Ambil', SKS_krs='$SKS_krs', Status='$Status', Kehadiran='', Tugas='', UTS='', Utulis='', Utek='', UAS='', Total='', Nilai='', Mutu='0' WHERE NIM_krs_Mhs='$NIM_krs_Mhs' AND Kode_Matakuliah_krs='$Kode_Matakuliah_krs'");
 		
 		header("Location: krs.php");
 		exit();
 	
}else{
	if($add = mysqli_query($konek, "INSERT INTO krs (NIM_krs_Mhs, Kode_Matakuliah_krs, Kode_krs_Kelas, Semester_Ambil, SKS_krs, Status) VALUES 
	 	('$NIM_krs_Mhs', '$Kode_Matakuliah_krs', '$Kode_krs_Kelas', '$Semester_Ambil', '$SKS_krs', '$Status')")){
		$queryambil=mysqli_query($konek,"SELECT Id_krs FROM krs WHERE NIM_krs_Mhs='$NIM_krs_Mhs' AND Kode_Matakuliah_krs='$Kode_Matakuliah_krs'");
 		while ($ambil = mysqli_fetch_array ($queryambil)){
 		$nilai = mysqli_query($konek, "INSERT INTO nilai(Id_Nilai_krs) Values ($ambil[Id_krs])");
 	}
 		header("Location: krs.php");
 		exit();
 	}
 die ("Terdapat kesalahan : ". mysqli_error($konek));
}

?>