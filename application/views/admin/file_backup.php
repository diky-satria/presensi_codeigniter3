<?php //$no = 1; ?>
					<?php //foreach($mhs as $m): ?>
						<tr>
							<td><?php //echo $no++ ?></td>
							<td><?php //echo $m->nama_mahasiswa ?></td>
							<td>
								<?php //if($m->hadir == 0){
									echo '-';
								}else{
									echo $m->hadir;
								} ?>
							</td> 
							<td>
								<?php //if($m->sakit == 0){
									echo '-';
								}else{
									echo $m->sakit;
								} ?>
							</td>
							<td>
								<?php //if($m->izin == 0){
									echo '-';
								}else{
									echo $m->izin;
								} ?>
							</td>
							<td>
								<?php //if($m->alpha == 0){
									echo '-';
								}else{
									echo $m->alpha;
								} ?>
							</td>
							<td>
								<a onclick="return confirm('yakin ingin menghapus mahasiswa/i ini dari daftar absensi ?')" href="<?php //echo base_url() ?>admin/hapus_absensi_mahasiswa?id=<?php //echo $m->id_absen_mahasiswa ?>&kode=<?php //echo $kode ?>&dosen=<?php //echo $dosen ?>&id_dosen=<?php //echo $id ?>" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php //endforeach; ?>