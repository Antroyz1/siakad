				<thead>
					<tr>
						<th>No</th>
						<th>Nama Dosen</th>
						<th>Judul Penelitian / Buku</th>
						<th>Tahun</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
						$querypenelitian = mysqli_query ($konek, "SELECT Id_penelitian, NIDN_Peneliti, Judul_Penelitian, Tahun, NIP, Nama_Pegawai FROM penelitian
							INNER JOIN pegawai ON NIDN_Peneliti=NIP");
						if($querypenelitian == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($penelitian = mysqli_fetch_array ($querypenelitian)){
							
							echo "
								<tr>
									<td>$no</td>
									<td>$penelitian[Nama_Pegawai]</td>
									<td>$penelitian[Judul_Penelitian]</td>
									<td>$penelitian[Tahun]</td>
									<td>
										<a href='#' class='open_modal' id='$penelitian[Id_penelitian]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"penelitian_delete.php?Id_penelitian=$penelitian[Id_penelitian]\")'>Hapus</a>
									</td>
								</tr>";
								$no++;
						}
					?>
				</tbody>