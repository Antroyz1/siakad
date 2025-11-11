				<thead>
					<tr>
						<th>NIM</th>
						<th>Mahasiswa</th>
						<th>Kelas</th>
						<th>Semester</th>
						<th>SKS Sem.</th>
						<th>IP Sem.</th>
						<th>IP Kum</th>
						<th>Sikap</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						$queryip = mysqli_query ($konek, "SELECT Id_kum, NIM_kum_Mhs, Semester, SKS_kum, IP_Sem, IP_Kum, Sikap, NIM, Nama_Mahasiswa,Kode_Kelas_Mhs FROM ipkkumulatif
							INNER JOIN mahasiswa on NIM_kum_Mhs=NIM");
						if($queryip == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($qip = mysqli_fetch_array ($queryip)){
								
							echo "
								<tr>
									<td>$qip[NIM_kum_Mhs]</td>
									<td>$qip[Nama_Mahasiswa]</td>
									<td>$qip[Kode_Kelas_Mhs]</td>
									<td>$qip[Semester]</td>
									<td>$qip[SKS_kum]</td>
									<td>$qip[IP_Sem]</td>
									<td>$qip[IP_Kum]</td>
									<td>$qip[Sikap]</td>
									<td>
										<a href='#' class='open_modal' id='$qip[Id_kum]'>Edit</a>
										
									</td>
								</tr>";
								$no++;

						}
					?>
				</tbody>