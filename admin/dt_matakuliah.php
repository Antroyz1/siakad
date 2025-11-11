				<thead>
					<tr>
						<th>Kode Matakuliah</th>
						<th>Nama Matakuliah</th>
						<th>Prodi</th>
						<th>Sifat</th>
						<th>Semester</th>
						<th>SKS</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querymatakuliah = mysqli_query ($konek, "SELECT * FROM matakuliah INNER JOIN jurusan ON Kode_jurusan = Kode_Jurusan_Matkul");
						if($querymatakuliah == false){
							die ("Terdapat Kesalahan : ". mysqli_error($konek));
						}
						while($matakuliah = mysqli_fetch_array($querymatakuliah)){
							echo "
								<tr>
									<td>$matakuliah[Kode_Matakuliah]</td>
									<td>$matakuliah[Nama_Matakuliah]</td>
									<td>$matakuliah[Nama_Jurusan]</td>
									<td>$matakuliah[Sifat]</td>
									<td>$matakuliah[Semester_Matakuliah]</td>
									<td>$matakuliah[SKS]</td>
									<td>
										<a href='#' class='open_modal' id='$matakuliah[Kode_Matakuliah]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"matakuliah_delete.php?Kode_Matakuliah=$matakuliah[Kode_Matakuliah]\")'>Hapus</a>
									</td>
								</tr>";
						}
					?>
				</tbody>