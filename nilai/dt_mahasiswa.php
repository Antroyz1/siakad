				<thead>
					<tr>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>No SKPI</th>
						<th>No Ijazah</th>
						<th>Semester Aktif</th>
						<th>KHS Tampil</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
						$querymhs = mysqli_query ($konek, "SELECT NIM, Nama_Mahasiswa, Tempat_Lahir_Mhs, DATE_FORMAT(Tanggal_Lahir_Mhs, '%d-%m-%Y') as Tanggal_Lahir_Mhs, No_Telp_Mhs, Alamat_Mhs, Kode_Kelas_Mhs, NIP_PA,  Semester_Aktif, khs_tampil, no_skpi,no_ijazah FROM mahasiswa ");
						if($querymhs == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
							
						while ($mhs = mysqli_fetch_array ($querymhs)){
							
							echo "
								<tr>
									<td>$mhs[NIM]</td>
									<td>$mhs[Nama_Mahasiswa]</td>
									<td>$mhs[no_skpi]</td>
									<td>$mhs[no_ijazah]</td>
									<td>$mhs[Semester_Aktif]</td>
									<td>$mhs[khs_tampil]</td>
									<td>
										<a href='#' class='open_modal' id='$mhs[NIM]'>Ubah</a> |
										<a href='#' class='transkrip_modal' id='$mhs[NIM]'><i class='fa fa-print'></i>Print Transkrip</a>
									</td>

								</tr>";
								
						}
						
					?>
				</tbody>