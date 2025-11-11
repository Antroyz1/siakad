				<thead>
					<tr>
						<th>Semester</th>
						<th>Status Pembayaran</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
						$queryform = mysqli_query ($konek, "SELECT * FROM lunas WHERE NIM_Lunas='$_SESSION[Username]'");
						if($queryform == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($form = mysqli_fetch_array ($queryform)){
							
							echo "
								<tr>
									<td>Semester - $form[Semester_Lunas]</td>
									<td>$form[Status_Lunas]</td>
									
								</tr>";
						}
					?>
				</tbody>