				<thead>
					<tr>
						<th>No.</th>
						<th>Mata <br>kuliah</th>
						<th>Alat<br>dipinjam</th>
						<th>Jumlah<br>Barang</th>
						<th>Tanggal<br>Pinjam</th>
						<th>Tanggal<br>Kembali</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
						$queryPinjam = mysqli_query ($konek, "SELECT Id_detail, Id_barang_pinjam, jumlah_barang_pinjam, NIM_peminjam, Kode_matkulPinjam, tgl_pinjam, tgl_kembali,Id_barang, no_inventaris, nama_barang, NIM, Nama_Mahasiswa, Kode_Kelas_Mhs, Semester_Aktif, Kode_Matakuliah, Nama_Matakuliah 
							FROM detail_pinjam 
							INNER JOIN baranglab ON Id_barang=Id_barang_pinjam
							INNER JOIN matakuliah ON Kode_Matakuliah = Kode_matkulpinjam 
							INNER JOIN mahasiswa ON NIM_peminjam=NIM WHERE NIM_peminjam='$_SESSION[Username]' ORDER BY Id_detail ASC");
						if($queryPinjam == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($Pinjam = mysqli_fetch_array ($queryPinjam)){
							
							echo "
								<tr>
									<td>$no</td>
									<td>($Pinjam[Kode_matkulPinjam])<br> $Pinjam[Nama_Matakuliah]</td>
									<td>($Pinjam[no_inventaris])<br>$Pinjam[nama_barang]</td>
									<td>$Pinjam[jumlah_barang_pinjam]</td>
									<td>$Pinjam[tgl_pinjam]</td>
									<td>$Pinjam[tgl_kembali]</td>
									<td>
										<a href='#' onClick='confirm_delete(\"pinjam_delete.php?Id_detail=$Pinjam[Id_detail]\")'>Hapus</a></td>
								</tr>";
								$no++;
						}
					?>
				</tbody>