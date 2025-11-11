				<thead>
					<tr>
						<th>NO</th>
						<th>Nama</th>
						<th>NPM</th>
						<th>Kehadiran</th>
						<th>Tugas</th>
						<th>UTS</th>
						<th>UAS</th>
						<th>Total</th>
						<th>Nilai</th>
						<th>Mutu</th>
					</tr>
				</thead>
				<center>
					<tbody>
					<?php
						$no=1;
						$querynilai = mysqli_query ($konek, "SELECT Id_krs, NIM_krs_Mhs, Kode_Matakuliah_krs, Kode_krs_Kelas, Kehadiran, Tugas, UTS, UAS ,Total , Nilai, Mutu, NIM, Nama_Mahasiswa FROM krs
							INNER JOIN mahasiswa on NIM_krs_Mhs=NIM Where Kode_Matakuliah_krs='$Kd' AND Kode_krs_Kelas='$Kelas' ORDER BY NIM ASC");
						if($querynilai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($nilai = mysqli_fetch_array ($querynilai)){
								echo "
								<tr>
									<td>$no</td>
									<td>$nilai[Nama_Mahasiswa]</td>
									<td>$nilai[NIM]</td>
									<td>$nilai[Kehadiran]</td>
									<td>$nilai[Tugas]</td>
									<td>$nilai[UTS]</td>
									<td>$nilai[UAS]</td>
									<td>$nilai[Total]</td>
									<td>$nilai[Nilai]</td>
									<td>$nilai[Mutu]</td>
								</tr>";

								$no++;

						}
					?>
				</tbody>
				</center>