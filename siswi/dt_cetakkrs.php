				<thead>
					<tr>
						<th>No <br> Urut</th>
						<th>Kode <br> Mata Kuliah</th>
						<th>Status</th>
						<th>SKS</th>
						<th>Nama Mata Kuliah</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					$SA=0;
					$kreditsks = 0;
						$querykrs = mysqli_query ($konek, "SELECT Id_krs, NIM_krs_Mhs, Kode_Matakuliah_krs, Semester_Ambil, SKS_krs,Status, NIM, Nama_Mahasiswa, Semester_Aktif, Kode_Matakuliah, SKS, Nama_Matakuliah FROM krs
										INNER JOIN mahasiswa ON NIM_krs_Mhs=NIM
										INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah WHERE NIM_krs_Mhs='$_SESSION[Username]' AND Semester_Ambil = '$SmsA'");
						 if($querykrs == false){
							die ("Terjadi Kesalahan :". mysqli_error($konek));
							}
						while ($krs = mysqli_fetch_array ($querykrs)){
							$SA=$krs['Semester_Ambil'];
							$kreditsks += $krs['SKS_krs'];
							echo "
							
								<tr>
									<td>$no</td>
									<td>$krs[Kode_Matakuliah]</td>
									<td>$krs[Status]</td>
									<td>$krs[SKS_krs]</td>
									<td>$krs[Nama_Matakuliah]</td>								
								</tr>";
								$no++;
								
						}
						// $add = mysqli_query($konek,"INSERT INTO ipkkumulatif(NIM_kum_Mhs, Semester, SKS_kum) VALUES ('$_SESSION[Username]', '$SA', '$kreditsks')");
						// $cek=mysqli_query($konek,"SELECT count(*) as ipk FROM ipkkumulatif WHERE NIM_kum_Mhs='$_SESSION[Username]' AND Semester='$SA'") or die ("Terjadi Kesalahan :". mysqli_error($konek));
						// list($ipk)= mysqli_fetch_row($cek);
						// if($ipk >=0){
						// 	$edit = mysqli_query($konek, "UPDATE ipkkumulatif SET SKS_kum='$kreditsks' WHERE NIM_kum_Mhs='$_SESSION[Username]' AND Semester='$SA'");
						// }else{
						// 	$add = mysqli_query($konek,"INSERT INTO ipkkumulatif(NIM_kum_Mhs, Semester, SKS_kum) VALUES ('$_SESSION[Username]', '$SA', '$kreditsks')");
						// }
						$cek=mysqli_query($konek,"SELECT * FROM ipkkumulatif WHERE NIM_kum_Mhs='$_SESSION[Username]' AND Semester='$SA'") or die ("Terjadi Kesalahan :". mysqli_error($konek));
						$rowcount=mysqli_num_rows($cek);
						if($rowcount){
							$edit = mysqli_query($konek, "UPDATE ipkkumulatif SET SKS_kum='$kreditsks' WHERE NIM_kum_Mhs='$_SESSION[Username]' AND Semester='$SA'");
						} else {
							
							$add = mysqli_query($konek,"INSERT INTO ipkkumulatif(NIM_kum_Mhs, Semester, SKS_kum) VALUES ('$_SESSION[Username]', '$SA', '$kreditsks')");
						}
?>


				</tbody>