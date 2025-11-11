				<thead>
					<tr>
						<th>Hari</th>
						<th>Penanggung Jawab</th>
						<th>Kelompok</th>
						<th>Tempat</th>
						<th>Perasat</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryLab = mysqli_query ($konek, "SELECT Id_lab, Nama_Kelompok, NIDN_Lab, Kode_Ruangan_Lab, Perasat, Hari, Tanggal_Jadwal, Jam, NIP, Nama_Pegawai, Nama_Kelompok, Nama_Ruangan FROM lab 
							INNER JOIN pegawai ON NIDN_Lab=NIP
							INNER JOIN ruangan ON Kode_Ruangan_Lab=Kode_Ruangan");
						if($queryLab == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($Lab = mysqli_fetch_array ($queryLab)){
							
							echo "
								<tr>
									<td>$Lab[Hari]</td>
									<td>$Lab[Nama_Pegawai]</td>
									<td>$Lab[Nama_Kelompok]</td>
									<td>$Lab[Nama_Ruangan]</td>
									<td>$Lab[Perasat]</td>
									<td>$Lab[Tanggal_Jadwal]</td>
									<td>$Lab[Jam]</td>
									<td>
										
										<a href='#' onClick='confirm_delete(\"jadwal_delete.php?Id_Lab=$Lab[Id_lab]\")'>Hapus</a>
									</td>
								</tr>";
						}
					?>
				</tbody>