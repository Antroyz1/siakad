				<thead>
					<tr>
						<th>No.</th>
						<th>No Inventaris</th>
						<th>Nama</th>
						<th>Jumlah</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
						$queryLab = mysqli_query ($konek, "SELECT * FROM baranglab ORDER BY Id_barang ASC");
						if($queryLab == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($Lab = mysqli_fetch_array ($queryLab)){
							
							echo "
								<tr>
									<td>$no</td>
									<td>$Lab[no_inventaris]</td>
									<td>$Lab[nama_barang]</td>
									<td>$Lab[jumlah_barang]</td>
									<td>
										<a href='#' class='open_modal' id='$Lab[Id_barang]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"barang_delete.php?Id_barang=$Lab[Id_barang]\")'>Hapus</a>
									</td>
								</tr>";
								$no++;
						}
					?>
				</tbody>