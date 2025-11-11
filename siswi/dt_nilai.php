				<thead>
					<tr>
						<th>NO</th>
						<th>Kode</th>
						<th>Mata Kuliah</th>
						<th>Smt</th>
						<th>SKS</th>
						<th>Nilai</th>
						<th>Mutu</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$no=1;
					$KHS_tmpl=0;
					$querykhs= mysqli_query($konek,"SELECT khs_tampil from mahasiswa WHERE NIM='$_SESSION[Username]'");
					if($querykhs == false){
						die("Terjadi Kesalahan :".mysqli_error($konek));
					}
					while ($qkhs= mysqli_fetch_array ($querykhs)){
						$KHS_tmpl= $qkhs['khs_tampil'];
					}
						$querynilai = mysqli_query ($konek, "SELECT Id_krs, NIM_krs_Mhs, Kode_Matakuliah_krs, Semester_Ambil,SKS_krs,Status,Nilai, Mutu, NIM, Nama_Mahasiswa, Semester_Aktif, Kode_Matakuliah, Nama_Matakuliah, SKS FROM krs 
										INNER JOIN mahasiswa ON NIM_krs_Mhs=NIM
										INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah 
										WHERE NIM_krs_Mhs='$_SESSION[Username]' AND Semester_Ambil<='$KHS_tmpl'");
						if($querynilai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($nilai = mysqli_fetch_array ($querynilai)){
							
							echo "
								<tr>
									<td>$no</td>
									<td>$nilai[Kode_Matakuliah]</td>
									<td>$nilai[Nama_Matakuliah]</td>
									<td>$nilai[Semester_Ambil]</td>
									<td>$nilai[SKS]</td>
									<td>$nilai[Nilai]</td>
									<td>$nilai[Mutu]</td>
									<td>$nilai[Status]</td>
								</tr>";
								$no++;
						}
					?>
				</tbody>