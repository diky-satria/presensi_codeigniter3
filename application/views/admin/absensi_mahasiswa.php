<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/jadwal_dosen" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-header" style="background-color:rgba(0, 255, 0, .4);">
				Mahasiswa/i dosen <?php echo $dosen ?>
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Hadir</th>
							<th>Sakit</th>
							<th>Izin</th>
							<th>Alpha</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach($mhs as $m): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $m->nama_mahasiswa ?></td>
							<td>
								<?php if($m->hadir == 0){
									echo '-';
								}else{
									echo $m->hadir;
								} ?>
							</td> 
							<td>
								<?php if($m->sakit == 0){
									echo '-';
								}else{
									echo $m->sakit;
								} ?>
							</td>
							<td>
								<?php if($m->izin == 0){
									echo '-';
								}else{
									echo $m->izin;
								} ?>
							</td>
							<td>
								<?php if($m->alpha == 0){
									echo '-';
								}else{
									echo $m->alpha;
								} ?>
							</td>
							<td>
								<a onclick="return confirm('yakin ingin menghapus mahasiswa/i ini dari daftar absensi ?')" href="<?php echo base_url() ?>admin/hapus_absensi_mahasiswa?id=<?php echo $m->id_absen_mahasiswa ?>&kode=<?php echo $kode ?>&dosen=<?php echo $dosen ?>&id_dosen=<?php echo $id ?>" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_absensi_mahasiswa?id=<?php echo $id ?>&kode=<?php echo $kode ?>&dosen=<?php echo $dosen ?>" class="btn btn-sm btn-primary">Tambah</a>	
			</div>
		</div>
	</div>
</div>