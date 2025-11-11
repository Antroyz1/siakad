				<thead>
					<tr>
						<th>No.</th>
						<th>NPM</th>
						<th>Kelas</th>
						<th>Semester</th>
						<th>SPP</th>
						<th>Tanggal Lunas</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
						$querybayar = mysqli_query ($konek, "SELECT * FROM lunas INNER JOIN mahasiswa ON NIM=NIM_Lunas");
						if($querybayar == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($bayar = mysqli_fetch_array ($querybayar)){
							
							echo "
								<tr>
									<td>$no</td>
									<td>$bayar[Nama_Mahasiswa] <br>($bayar[NIM])</td>
									<td>$bayar[Kode_Kelas_Mhs]</td>
									<td>$bayar[Semester_Aktif]</td>
									<td>Rp. $bayar[SPP_Lunas]</td>
									<td>$bayar[Tanggal_Lunas]</td>
									<td>$bayar[Status_Lunas]</td>
									<td>
										<a href='#' class='open_modal' id='$bayar[NIM]'>Ubah</a>
									</td>
								</tr>";
								$no++;
						}
					?>
				</tbody>