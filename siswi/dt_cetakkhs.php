				<thead>
					<tr>
						<th>NO</th>
						<th>Kode</th>
						<th>Matakuliah</th>
						<th>SKS</th>
						<th>Nilai</th>
						<th>Mutu</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					
						$querykhs = mysqli_query ($konek, "SELECT Id_krs, NIM_krs_Mhs, Kode_Matakuliah_krs, Semester_Ambil,SKS_krs, Nilai, Mutu, NIM, Nama_Mahasiswa, Kode_Matakuliah, SKS, Nama_Matakuliah, Semester_Aktif FROM krs 
								INNER JOIN mahasiswa ON NIM_krs_Mhs=NIM
								INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah WHERE NIM_krs_Mhs='$_SESSION[Username]' AND Semester_Ambil = '$khst' ");
						 if($querykhs == false){
							die ("Terjadi Kesalahan :". mysqli_error($konek));
							}
							while ($khs = mysqli_fetch_array ($querykhs)){
								 $kreditsks += $khs['SKS_krs'];
								 $bobot += $khs['Mutu'];
								echo "
								<tr>
									<td>$no</td>
									<td>$khs[Kode_Matakuliah]</td>
									<td>$khs[Nama_Matakuliah]</td>
									<td>$khs[SKS_krs]</td>
									<td>$khs[Nilai]</td>							
									<td>$khs[Mutu]</td>
								</tr>";

								$no++;

						}
					?>
				</tbody>