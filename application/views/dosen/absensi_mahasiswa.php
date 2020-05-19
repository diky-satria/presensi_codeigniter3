<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>dosen/jadwal" class="btn btn-sm btn-dark my-3">Kembali</a>
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
			<div class="card-header" style="background-color:#D3D3D3;">
				Riwayat absen mahasiswa/i Mata kuliah <?php echo $matkul ?>
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
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($absensi_mahasiswa as $m): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><a href="<?php echo base_url() ?>dosen/riwayat_mahasiswa?kode=<?php echo $m->kode_jadwal ?>&email=<?php echo $m->nama_mhs ?>&matkul=<?php echo $matkul ?>"><?php echo $m->nama_mahasiswa ?></a></td>
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
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>