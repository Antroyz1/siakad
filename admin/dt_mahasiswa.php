				<thead>
					<tr>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Telpon</th>
						<th>Alamat</th>
						<th>Jurusan</th>
						<th>Kelas</th>
						<th>PA</th>
						<th>Semester Aktif</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
						$querymhs = mysqli_query ($konek, "SELECT NIM, Nama_Mahasiswa, Tempat_Lahir_Mhs, DATE_FORMAT(Tanggal_Lahir_Mhs, '%d-%m-%Y') as Tanggal_Lahir_Mhs, No_Telp_Mhs, Alamat_Mhs, Kode_Kelas_Mhs, NIP_PA,  Semester_Aktif, Kode_JurusanMhs, Nama_Pegawai, Kode_Kelas, Nama_Jurusan, Kode_jurusan FROM mahasiswa
							INNER JOIN pegawai ON NIP = NIP_PA
							INNER JOIN kelas ON Kode_Kelas_Mhs = Kode_Kelas
							INNER JOIN jurusan ON Kode_jurusan = Kode_JurusanMhs");
						if($querymhs == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
							
						while ($mhs = mysqli_fetch_array ($querymhs)){
							
							echo "
								<tr>
									<td>$mhs[NIM]</td>
									<td>$mhs[Nama_Mahasiswa]</td>
									<td>$mhs[Tempat_Lahir_Mhs]</td>
									<td>$mhs[Tanggal_Lahir_Mhs]</td>
									<td>$mhs[No_Telp_Mhs]</td>
									<td>$mhs[Alamat_Mhs]</td>
									<td>$mhs[Nama_Jurusan]</td>
									<td>$mhs[Kode_Kelas_Mhs]</td>
									<td>$mhs[Nama_Pegawai]</td>
									<td>$mhs[Semester_Aktif]</td>
									<td>
										<a href='#' class='open_modal' id='$mhs[NIM]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"mahasiswa_delete.php?NIM=$mhs[NIM]\")'>Hapus</a>
									</td>

								</tr>";
								
						}
						
					?>
				</tbody>