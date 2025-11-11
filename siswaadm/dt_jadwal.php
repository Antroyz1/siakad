
				<thead>
					<tr>
						<th>Hari</th>
						<th>Matakuliah</th>
						<th>Semester</th>
						<th>Kelas</th>
						<th>Jam</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querymhs = mysqli_query($konek, "SELECT Kode_Kelas_Mhs, Kode_Kelas, Nama_Kelas FROM mahasiswa INNER JOIN kelas ON Kode_Kelas_Mhs=Kode_kelas WHERE NIM='$_SESSION[Username]'");
						if($querymhs == false){
							die("Terdapat Kesalahan : ". mysqli_error($konek));
						}
						while ($mhs = mysqli_fetch_array($querymhs)){
							
							$queryjadwal = mysqli_query ($konek, "SELECT Id_Jadwal, Kode_Matakuliah_Jadwal, NIP_Jadwal, Kode_Ruangan_Jadwal, Semester_Jadwal, Hari,
							Jam, Kode_Matakuliah, Nama_Matakuliah, NIP, Nama_Pegawai, Kode_Ruangan, Nama_Ruangan, Kode_Kelas, Nama_Kelas FROM jadwal 
							INNER JOIN matakuliah ON Kode_Matakuliah_Jadwal=Kode_Matakuliah
							INNER JOIN pegawai ON NIP_Jadwal=NIP
							INNER JOIN ruangan ON Kode_Ruangan_Jadwal=Kode_Ruangan
							INNER JOIN kelas ON Kode_Kelas_Jadwal=Kode_Kelas WHERE Kode_Kelas_Jadwal='$mhs[Kode_Kelas_Mhs]'");
							if($queryjadwal == false){
								die ("Terjadi Kesalahan : ". mysqli_error($konek));
							}
							while ($jadwal = mysqli_fetch_array ($queryjadwal)){
							
								echo "
									<tr>
										<td>$jadwal[Hari]</td>
										<td>$jadwal[Nama_Matakuliah]</td>
										<td>$jadwal[Semester_Jadwal]</td>
										<td>$jadwal[Kode_Kelas]</td>
										<td>$jadwal[Jam]</td>
									</tr>";
							}
							
						}
					
						
					?>
				</tbody>