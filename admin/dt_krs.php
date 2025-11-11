
				<thead>
					<tr>
						<th>NO</th>
						<th>NIM</th>
						<th>Kode Mata Kuliah</th>
						<th>Status</th>
						<th>SKS</th>
						<th>Nama Mata Kuliah</th>
						<th>Semester</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
						$querykrs = mysqli_query($konek, "SELECT Id_krs,NIM_krs_Mhs, Kode_Matakuliah_krs, Semester_Ambil, SKS_krs, Status, Kode_Matakuliah, Nama_Matakuliah 
							FROM krs 
							INNER JOIN matakuliah ON Kode_Matakuliah_krs=Kode_Matakuliah");

						if($querykrs == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($krs = mysqli_fetch_array ($querykrs)){
							
							echo "
								<tr>
									<td>$no</td>
									<td>$krs[NIM_krs_Mhs]</td>
									<td>$krs[Kode_Matakuliah]</td>
									<td>$krs[Status]</td>
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