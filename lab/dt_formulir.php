				<thead>
					<tr>
						<th>Nama</th>
						<th>Link</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryform = mysqli_query ($konek, "SELECT *FROM formulir");
						if($queryform == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($form = mysqli_fetch_array ($queryform)){
							
							echo "
								<tr>
									<td>$form[Judul]</td>
									<td>$form[Link]</td>
									<td>
										<a href='#' class='open_modal' id='$form[Id_unduh]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"formulir_delete.php?Id_unduh=$form[Id_unduh]\")'>Hapus</a>
									</td>
								</tr>";
						}
					?>
				</tbody>