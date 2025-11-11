
				<thead>
					<tr>
						<th>NO</th>
						<th>Kode Mata Kuliah</th>
						<th>Status</th>
						<th>Kelas</th>
						<th>SKS</th>
						<th>Nama Mata Kuliah</th>
						<th>Semester</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					
						// $querykrs = mysqli_query($konek, "SELECT Id_krs, Kode_Matakuliah_krs, Semester_Ambil, SKS_krs, Status, Kode_Matakuliah, Nama_Matakuliah, Semester_Aktif 
						// 	FROM krs 
						// 	INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah 
						// 	INNER JOIN mahasiswa ON Semester_Ambil=Semester_Aktif WHERE NIM_krs_Mhs='$_SESSION[Username]'");
						$querysa=mysqli_query($konek,"SELECT Semester_Aktif FROM mahasiswa WHERE NIM='$_SESSION[Username]'");
						while ($sa = mysqli_fetch_array ($querysa)){
							$SmsA=$sa['Semester_Aktif'];}

							$querykrs = mysqli_query($konek, "SELECT Id_krs, Kode_Matakuliah_krs, Kode_krs_Kelas, Semester_Ambil, SKS_krs, Status, Kode_Matakuliah, Nama_Matakuliah, NIM, Semester_Aktif , Nama_Kelas
							FROM krs 
							INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah 
							INNER JOIN mahasiswa ON NIM=NIM_krs_Mhs 
							INNER JOIN kelas ON Kode_krs_Kelas = Kode_Kelas WHERE NIM_krs_Mhs='$_SESSION[Username]' AND Semester_Ambil = '$SmsA'");

						if($querykrs == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($krs = mysqli_fetch_array ($querykrs)){
							
							echo "
								<tr>
									<td>$no</td>
									<td>$krs[Kode_Matakuliah]</td>
									<td>$krs[Status]</td>
									<td>$krs[Nama_Kelas]</td>
									<td>$krs[SKS_krs]</td>
									<td>$krs[Nama_Matakuliah]</td>
									<td>$krs[Semester_Ambil]</td>
									<td>
										<a href='#' onClick='confirm_delete(\"krs_delete.php?Id_krs=$krs[Id_krs]\")'>Hapus</a>
									</td>
								</tr>";
								$no++;
						}
					?>
					
				</tbody>