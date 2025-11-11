<?php
include "../koneksi.php";

$NIM_krs_Mhs				= $_POST["Username"];
$Kode_krs_Kelas				= $_POST["Kode_krs_Kelas"];
$Paket 						= $_POST["Paket"];

$quetambah = mysqli_query($konek, "SELECT Kode_Matakuliah, Semester_Matakuliah, SKS FROM matakuliah WHERE Kode_Jurusan_Matkul = 'S1ADM' AND Semester_Matakuliah ='$Paket'");
if($quetambah == false){
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
    }
    while($tambah = mysqli_fetch_array($quetambah)){
    	$KM = $tambah['Kode_Matakuliah'];
    	$sksaja = $tambah['SKS'];
    	$add = mysqli_query($konek, "INSERT INTO krs (NIM_krs_Mhs, Kode_Matakuliah_krs, Kode_krs_Kelas, Semester_Ambil,SKS_krs,Status) VALUES ('$NIM_krs_Mhs', '$KM', '$Kode_krs_Kelas', '$Paket','$sksaja', 'Baru')");  	
    }
    header('Location: krs.php');
	exit();

// if($add = mysqli_query($konek, "INSERT INTO krs (NIM_krs_Mhs, Kode_Matakuliah_krs, SKS_krs, Kode_krs_Kelas, Semester_Ambil,Status) 
// VALUES ('$NIM_krs_Mhs', (SELECT m.Kode_Matakuliah, m.SKS FROM matakuliah m WHERE m.Semester ='$Paket' ),'$Kode_krs_Kelas','$Paket','Baru');")){
// 	header('Location: krs.php');
// 	exit();
// }
// die ("Terdapat Kesalahan : ". mysqli_error($konek));
?>