				<thead>
					<tr>
						<th>No.</th>
						<th>NPM</th>
						<th>Kelas<br> Semester</th>
						<th>Angsuran 1 <br> (Rp)</th>
						<th>Tanggal</th>
						<th>Angsuran 2 <br> (Rp)</th>
						<th>Tanggal</th>
						<th>Total</th>
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
						//ASLI
						// while ($bayar = mysqli_fetch_array ($querybayar)){
							
						// 	echo "
						// 		<tr>
						// 			<td>$no</td>
						// 			<td>$bayar[Nama_Mahasiswa] <br>($bayar[NIM])</td>
						// 			<td>$bayar[Kode_Kelas_Mhs] / $bayar[Semester_Lunas]</td>
						// 			<td>$bayar[Angsuran1]</td>
						// 			<td>$bayar[Tanggal_Angsuran]</td>
						// 			<td>$bayar[Angsuran2]</td>
						// 			<td>$bayar[Tanggal_Lunas]</td>
						// 			<td>$bayar[Total]</td>
						// 			<td>$bayar[Status_Lunas]</td>
						// 			<td>
						// 				<a href='#' class='open_modal' id='$bayar[Id_Lunas]'>Ubah</a>
						// 			</td>
						// 		</tr>";
						// 		$no++;
						// }

						while ($bayar = mysqli_fetch_array ($querybayar)){
							if($bayar['Status_Lunas']=="Lunas"){
								echo "
								<tr>
									<td>$no</td>
									<td>$bayar[Nama_Mahasiswa] <br>($bayar[NIM])</td>
									<td>$bayar[Kode_Kelas_Mhs] / $bayar[Semester_Lunas]</td>
									<td>$bayar[Angsuran1]</td>
									<td>$bayar[Tanggal_Angsuran]</td>
									<td>$bayar[Angsuran2]</td>
									<td>$bayar[Tanggal_Lunas]</td>
									<td>$bayar[Total]</td>
									<td>$bayar[Status_Lunas]</td>
									<td>
										<a href='#' class='open_modal' id='$bayar[Id_Lunas]'>Ubah</a>
									</td>
								</tr>";
								$no++;
							} else {
								echo "
								<tr style='background-color: tomato;'>
									<td>$no</td>
									<td>$bayar[Nama_Mahasiswa] <br>($bayar[NIM])</td>
									<td>$bayar[Kode_Kelas_Mhs] / $bayar[Semester_Lunas]</td>
									<td>$bayar[Angsuran1]</td>
									<td>$bayar[Tanggal_Angsuran]</td>
									<td>$bayar[Angsuran2]</td>
									<td>$bayar[Tanggal_Lunas]</td>
									<td>$bayar[Total]</td>
									<td>$bayar[Status_Lunas]</td>
									<td>
										<a href='#' class='open_modal' id='$bayar[Id_Lunas]'>Ubah</a>
									</td>
								</tr>";
								$no++;
							}
							
						}
					?>
				</tbody>