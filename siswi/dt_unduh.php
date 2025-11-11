				<thead>
					<tr>
						<th>Nama</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryform = mysqli_query ($konek, "SELECT *FROM formulir");
						if($queryform == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($form = mysqli_fetch_array ($queryform)){
							
							echo "
								<tr>
									<td>$form[Judul]</td>
									<td>
										<a href='$form[Link]' target='_blank'><i class='fa fa-download'></i> Unduh</a>
									</td>
								</tr>";
						}
					?>
				</tbody>