				<thead>
					<tr>
						<th>Kode Angkatan</th>
						<th>Angkatan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryangkatan = mysqli_query ($konek, "SELECT * FROM angkatan");
						if($queryangkatan == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($angkatan = mysqli_fetch_array ($queryangkatan)){
							
							echo "
								<tr>
									<td>$angkatan[Kode_Angkatan]</td>
									<td>$angkatan[Nama_Angkatan]</td>
									<td>
										<a href='#' class='open_modal' id='$angkatan[Kode_Angkatan]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"angkatan_delete.php?Kode_angkatan=$angkatan[Kode_Angkatan]\")'>Hapus</a>
									</td>
								</tr>";
						}
					?>
				</tbody>