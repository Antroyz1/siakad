				<thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Mahasiswa</th>
						<th>Kode Matkul</th>
						<th>Semester</th>
						<th>Kehadiran</th>
						<th>Tugas</th>
						<th>UTS</th>
						<th>UAS</th>
						<th>Total</th>
						<th>Nilai</th>
						<th>Mutu</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						$queryip = mysqli_query ($konek, "SELECT Id_krs, NIM_krs_Mhs, Semester_Ambil, Kehadiran, Tugas, UTS, UAS, Total, Nilai, Mutu, Nama_Mahasiswa FROM ipkkumulatif
							INNER JOIN mahasiswa on NIM_krs_Mhs=NIM");
						if($queryip == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($qip = mysqli_fetch_array ($queryip)){
								
							echo "
								<tr>
									<td>$no</td>
									<td>$qip[NIM_krs_Mhs]</td>
									<td>$qip[Nama_Mahasiswa]</td>
									<td>$qip[Kode_Matakuliah_krs]</td>
									<td>$qip[Semester_Ambil]</td>
									<td><input name='kehadiran' type='text' placeholder='Kehadiran'></td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										<a href='#' class='open_modal' id='$qip[Id_kum]'>Edit</a>
										
									</td>
								</tr>";
								$no++;

						}
					?>
				</tbody>