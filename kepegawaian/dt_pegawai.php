				<thead>
					<tr>
						<th>NIP</th>
						<th>Nama Pegawai</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>E-mail</th>
						<th>Telpon</th>
						<th>Jabatan</th>
						<th>Pendidikan terakhir</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querypegawai = mysqli_query ($konek, "SELECT Id_pegawai, NIP, Nama_Pegawai, Tempat_Lahir, DATE_FORMAT(Tanggal_Lahir, '%d-%m-%Y')as Tanggal_Lahir, JK, Email, No_Telp,Pendidikan, Jabatan FROM pegawai");
						if($querypegawai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($pegawai = mysqli_fetch_array ($querypegawai)){
							
							echo "
								<tr>
									<td>$pegawai[NIP]</td>
									<td>$pegawai[Nama_Pegawai]</td>
									<td>$pegawai[Tempat_Lahir]</td>
									<td>$pegawai[Tanggal_Lahir]</td>
									<td>
								";
									if($pegawai["JK"] == "L"){
										echo "Laki - laki";
									}
									else{
										echo "Perempuan";
									}
							echo "
									</td>
									<td>$pegawai[Email]</td>
									<td>$pegawai[No_Telp]</td>
									<td>$pegawai[Jabatan]</td>
									<td>$pegawai[Pendidikan]</td>
									<td>
										<a href='#' class='open_modal' id='$pegawai[Id_pegawai]'>Ubah</a> |
										<a href='#' onClick='confirm_delete(\"pegawai_delete.php?Id_pegawai=$pegawai[Id_pegawai]\")'>Hapus</a>
									</td>
								</tr>";
						}
					?>
				</tbody>