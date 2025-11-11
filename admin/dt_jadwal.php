				<thead>
					<tr>
						<th>Matakuliah</th>
						<th>Ruangan</th>
						<th>Semester</th>
						<th>Kelas</th>
						<th>Hari</th>
						<th>Jam</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryjadwal = mysqli_query ($konek, "SELECT Id_Jadwal, Kode_Matakuliah_Jadwal, NIP_Jadwal, Kode_Ruangan_Jadwal, Semester_Jadwal, Hari,	Jam, Kode_Matakuliah, Nama_Matakuliah, NIP, Nama_Pegawai, Kode_Ruangan, Nama_Ruangan, Kode_Kelas, Nama_Kelas FROM jadwal 
							INNER JOIN matakuliah ON Kode_Matakuliah_Jadwal=Kode_Matakuliah
							INNER JOIN pegawai ON NIP_Jadwal=NIP
							INNER JOIN ruangan ON Kode_Ruangan_Jadwal=Kode_Ruangan
							INNER JOIN kelas ON Kode_Kelas_Jadwal=Kode_Kelas");
						if($queryjadwal == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($jadwal = mysqli_fetch_array ($queryjadwal)){
							
							echo "
								<tr>
									<td>$jadwal[Nama_Matakuliah]</td>
									<td>$jadwal[Nama_Ruangan]</td>
									<td>$jadwal[Semester_Jadwal]</td>
									<td>$jadwal[Kode_Kelas]</td>
									<td>$jadwal[Hari]</td>
									<td>$jadwal[Jam]</td>
									<td>
										<a href='#' class='open_modal' id='$jadwal[Id_Jadwal]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"jadwal_delete.php?Id_Jadwal=$jadwal[Id_Jadwal]\")'>Hapus</a>
									</td>
								</tr>";
						}
					?>
				</tbody>