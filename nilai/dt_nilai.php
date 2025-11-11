				<thead>
					<tr>
						<th>NO</th>
						<th>NIM</th>
						<th>Nama Mhs</th>
						<th>Smt.</th>
						<th>Jumlah Matkul</th>
						<th>Jumlah SKS</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						$querynilai = mysqli_query ($konek, "
							SELECT 
								IFNULL (NIM_krs_Mhs,'SUB TOTAL') AS NIM_krs,
								IFNULL (Semester_Ambil,'TOTAL') AS Smt,
								Nama_Mahasiswa
							FROM krs INNER JOIN mahasiswa ON NIM=NIM_krs_Mhs
							INNER JOIN ipkkumulatif ON NIM_kum_Mhs=NIM_krs_Mhs
							GROUP BY Semester_Ambil, NIM_krs_Mhs ORDER BY NIM_krs, Smt ASC");
						if($querynilai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($nilai = mysqli_fetch_array ($querynilai)){
							
							$queryjummatkul =mysqli_query($konek,"SELECT 
								COUNT(Id_krs) AS jumlah_Matkul, 
								SUM(SKS_krs) AS Sks_total 
							FROM krs WHERE NIM_krs_Mhs='$nilai[NIM_krs]' AND Semester_Ambil='$nilai[Smt]'");
							if($queryjummatkul == false){
								die ("Terjadi Kesalahan : ".mysqli_error($konek));
							}
							while ($jummatkul= mysqli_fetch_array($queryjummatkul)) {
								echo "
									<tr>
										<td>$no</td>
										<td>$nilai[NIM_krs]</td>
										<td>$nilai[Nama_Mahasiswa]</td>
										<td>$nilai[Smt]</td>
										<td>$jummatkul[jumlah_Matkul]</td>
										<td>$jummatkul[Sks_total]</td>
									</tr>";
								$no++;
							}
						}
						
					?>
				</tbody>