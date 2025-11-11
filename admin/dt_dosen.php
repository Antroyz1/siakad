				<thead>
					<tr>
						<th>NIDN</th>
						<th>Nama Dosen</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>E-mail</th>
						<th>Telpon</th>
						<th>Pendidikan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT NIP, Nama_Pegawai, Tempat_Lahir, DATE_FORMAT(Tanggal_Lahir, '%d-%m-%Y')as Tanggal_Lahir, JK, Email, No_Telp, Pendidikan FROM pegawai WHERE Jabatan='Dosen'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($dosen = mysqli_fetch_array ($querydosen)){
							
							echo "
								<tr>
									<td>$dosen[NIP]</td>
									<td>$dosen[Nama_Pegawai]</td>
									<td>$dosen[Tempat_Lahir]</td>
									<td>$dosen[Tanggal_Lahir]</td>
									<td>
								";
									if($dosen["JK"] == "L"){
										echo "Laki - laki";
									}
									else{
										echo "Perempuan";
									}
							echo "
									</td>
									<td>$dosen[Email]</td>
									<td>$dosen[No_Telp]</td>
									<td>$dosen[Pendidikan]</td>
									<td>
										<a href='#' class='open_modal' id='$dosen[NIP]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"dosen_delete.php?NIP=$dosen[NIP]\")'>Hapus</a>
									</td>
								</tr>";
						}
					?>
				</tbody>