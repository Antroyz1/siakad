<?php

include('database_connection.php');

$column = array("Id_krs", "NIM_krs_Mhs","Nama_Mahasiswa" , "Kode_Matakuliah_krs", "Semester_Ambil", "Kehadiran","Tugas", "UTS", "UAS", "Total", "Nilai", "Mutu");

$query = "
SELECT * FROM krs INNER JOIN mahasiswa ON NIM=NIM_krs_Mhs
";

if(isset($_POST['filter_kelas'], $_POST['filter_Kode']) && $_POST['filter_kelas'] != '' && $_POST['filter_Kode'] != '')
{
 $query .= '
 WHERE Kode_krs_Kelas = "'.$_POST['filter_kelas'].'" AND Kode_Matakuliah_krs = "'.$_POST['filter_Kode'].'" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY NIM_krs_Mhs ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row['Id_krs'];
	$sub_array[] = $row['NIM_krs_Mhs'];
	$sub_array[] = $row['Nama_Mahasiswa'];
	$sub_array[] = $row['Kode_Matakuliah_krs'];
	$sub_array[] = $row['Semester_Ambil'];
	$sub_array[] = $row['Kehadiran'];
	$sub_array[] = $row['Tugas'];
	$sub_array[] = $row['UTS'];
	$sub_array[] = $row['UAS'];
	$sub_array[] = $row['Total'];
	$sub_array[] = $row['Nilai'];
	$sub_array[] = $row['Mutu'];
	$data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM krs INNER JOIN mahasiswa ON NIM=NIM_krs_Mhs";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($connect),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>