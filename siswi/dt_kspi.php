
				<thead>
					<tr>
						<th>NO.</th>
						<th>Jenis Data</th>
						<th>Informasi</th>
						
						
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					
						// $querykrs = mysqli_query($konek, "SELECT Id_krs, Kode_Matakuliah_krs, Semester_Ambil, SKS_krs, Status, Kode_Matakuliah, Nama_Matakuliah, Semester_Aktif 
						// 	FROM krs 
						// 	INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah 
						// 	INNER JOIN mahasiswa ON Semester_Ambil=Semester_Aktif WHERE NIM_krs_Mhs='$_SESSION[Username]'");
					
						 $queryskpi = mysqli_query ($konek, "SELECT * FROM tambahan WHERE nim_tambahan='$_SESSION[Username]'");
					 if($queryskpi == false){
						die ("Terjadi Kesalahan :". mysqli_error($konek));
						}
								if($queryskpi == false){
									die ("Terjadi Kesalahan : ". mysqli_error($konek));
								}
								while ($skpi = mysqli_fetch_array ($queryskpi)){
									
									echo "
										<tr>
											<td>$no</td>
											<td>$skpi[jenis_tambahan]</td>
											<td>$skpi[ket_tambahan]</td>
											
										</tr>";
										$no++;
								}
							?>
					
				</tbody>