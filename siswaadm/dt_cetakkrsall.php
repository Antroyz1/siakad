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
					$kreditsks = 0;
						$querykhs = mysqli_query ($konek, "SELECT Id_krs, NIM_krs_Mhs, Kode_Matakuliah_krs, Semester_Ambil, SKS_krs,Status, NIM, Nama_Mahasiswa, Semester_Aktif, Kode_Matakuliah, SKS, Nama_Matakuliah FROM krs 
								INNER JOIN mahasiswa ON NIM_krs_Mhs=NIM
								INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah WHERE NIM_krs_Mhs='$_SESSION[Username]' AND Semester_Ambil = '$khst' ");
						 if($querykhs == false){
							die ("Terjadi Kesalahan :". mysqli_error($konek));
							}
							while ($khs = mysqli_fetch_array ($querykhs)){
								 $kreditsks += $khs['SKS_krs'];
								 
								echo "
								<tr>
									<td>$no</td>
									<td>$khs[Kode_Matakuliah]</td>
									<td>$khs[Status]</td>
									<td>$khs[SKS_krs]</td>
									<td>$khs[Nama_Matakuliah]</td>	
								</tr>";

								$no++;

						}
					?>
				</tbody>