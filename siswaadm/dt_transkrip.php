				<thead>
					<tr>
						<th>NO</th>
						<th>Semester</th>
						<th>Kode</th>
						<th>Mata Kuliah</th>
						<th>SKS</th>
						<th>Nilai</th>
						<th>Mutu</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
						$querynilai = mysqli_query ($konek, "SELECT Id_Nilai, Id_Nilai_krs, Nilai, Mutu,Id_krs, NIM_krs_Mhs, Kode_Matakuliah_krs, Semester_Ambil,SKS_krs,Status, NIM, Nama_Mahasiswa, Semester_Aktif, Kode_Matakuliah, Nama_Matakuliah, SKS FROM nilai
								INNER JOIN krs on Id_Nilai_krs=Id_krs
								INNER JOIN mahasiswa ON NIM_krs_Mhs=NIM
								INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah 
								WHERE NIM_krs_Mhs='$_SESSION[Username]'");
						if($querynilai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($nilai = mysqli_fetch_array ($querynilai)){
							
							echo "
								<tr>
									<td>$no</td>
									<td>$nilai[Kode_Matakuliah]</td>
									<td>$nilai[Nama_Matakuliah]</td>
									<td>$nilai[SKS]</td>
									<td>$nilai[Nilai]</td>
									<td>$nilai[Mutu]</td>
									<td>$nilai[Status]</td>
								</tr>";
								$no++;
						}
					?>
				</tbody>