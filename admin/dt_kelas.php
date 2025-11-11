				<thead>
					<tr>
						<th>Kode Kelas</th>
						<th>Kelas</th>
						<th>Angkatan</th>
						<th>Semester</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querykelas = mysqli_query ($konek, "SELECT Kode_Kelas, Nama_Kelas, Kode_Angkatan_Kls, Semester, Kode_Angkatan, Nama_Angkatan FROM kelas INNER JOIN angkatan ON Kode_Angkatan_Kls = Kode_Angkatan");
						if($querykelas == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($kelas = mysqli_fetch_array ($querykelas)){
							
							echo "
								<tr>
									<td>$kelas[Kode_Kelas]</td>
									<td>$kelas[Nama_Kelas]</td>
									<td>$kelas[Nama_Angkatan]</td>
									<td>$kelas[Semester]</td>
									<td>
										<a href='#' class='open_modal' id='$kelas[Kode_Kelas]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"kelas_delete.php?Kode_Kelas=$kelas[Kode_Kelas]\")'>Hapus</a>
									</td>
								</tr>";
						}
					?>
				</tbody>