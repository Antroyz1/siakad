				<thead>
					<tr>
						<th>No</th>
						<th>Judul Penelitian</th>
						<th>Tahun</th>
						<th>Keterangan</th>
						<th>Progres<br>Capaian</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
						
						$querypenelitian1 = mysqli_query ($konek, "SELECT Id_penelitian_cat, COUNT(Id_penelitian_cat) AS jumlah_cat, SUM(presentase_kegiatan) AS persen_total FROM catatan GROUP BY  Id_penelitian_cat");

						$querypenelitian = mysqli_query ($konek, "SELECT Id_penelitian, NIDN_Peneliti, Judul_Penelitian, Tahun, Id_catatan, Id_penelitian_cat, COUNT(Id_penelitian_cat) AS jumlah_cat, SUM(DISTINCT presentase_kegiatan) AS persen_total FROM penelitian 
							LEFT JOIN catatan ON Id_penelitian=Id_penelitian_cat WHERE NIDN_Peneliti = '$_SESSION[Userdisplay]' GROUP BY  Id_penelitian");


						//asli
						// $querypenelitian = mysqli_query ($konek, "SELECT Id_penelitian_cat, COUNT(Id_catatan) AS jumlah_cat, SUM(presentase_kegiatan) AS persen_total, Id_penelitian, NIDN_Peneliti, Judul_Penelitian, Tahun, NIP, Nama_Pegawai FROM catatan
						// INNER JOIN penelitian ON Id_penelitian_cat = Id_penelitian 
						// INNER JOIN pegawai ON NIDN_Peneliti=NIP WHERE NIDN_Peneliti = '$_SESSION[Userdisplay]' ORDER BY Id_penelitian_cat ASC");

						 // $querypenelitian = mysqli_query ($konek, "SELECT Id_penelitian, NIDN_Peneliti, Judul_Penelitian, Tahun, NIP, Nama_Pegawai FROM penelitian
						 // 	INNER JOIN pegawai ON NIDN_Peneliti=NIP 
						 // 	WHERE NIDN_Peneliti = '$_SESSION[Userdisplay]'");
						if($querypenelitian == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($penelitian = mysqli_fetch_array ($querypenelitian)){
							
							echo "
								<tr>
									<td>$no</td>
									<td>$penelitian[Judul_Penelitian]</td>
									<td>$penelitian[Tahun]</td>
									<td>$penelitian[jumlah_cat] Catatan</td>
									<td>$penelitian[persen_total] %</td>
									<td>
										<a href='catatan.php' id='$penelitian[Id_penelitian_cat]'><i class='fa fa-search'></i></a> |
										<a href='#' class='open_modal' id='$penelitian[Id_penelitian]'><i class='fa fa-pencil-square-o'></i></a> |
										<a href='#' onClick='confirm_delete(\"penelitian_delete.php?Id_penelitian=$penelitian[Id_penelitian]\")'><i class='fa fa-trash-o'></i></a>
									</td>
								</tr>";
								$no++;
						}
					?>
				</tbody>