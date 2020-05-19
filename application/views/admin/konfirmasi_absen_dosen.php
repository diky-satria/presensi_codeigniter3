<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin" class="btn btn-sm btn-dark my-3">Kembali</a>
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
				Konfirmasi absen dosen
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode jadwal</th>
							<th>Tanggal absen</th>
							<th>Mata kuliah</th>
							<th>Dosen</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($konfirmasi as $k): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $k->kode_jadwal_dosen ?></td>
							<td><?php echo $k->tanggal_absen ?></td>
							<td><?php echo $k->matkul ?></td>
							<td><?php echo $k->nama_dosen ?></td>
							<td>
								<a onclick="return confirm('konfirmasi')" href="<?php echo base_url() ?>admin/konfir_absen_dosen?id=<?php echo $k->id_absen_dosen ?>&kode=<?php echo $k->kode_jadwal_dosen ?>" class="btn btn-sm btn-primary">Konfirmasi</a>
								<a onclick="return confirm('tolak')" href="<?php echo base_url() ?>admin/tolak_absen_dosen?id=<?php echo $k->id_absen_dosen ?>&kode=<?php echo $k->kode_jadwal_dosen ?>" class="btn btn-sm btn-danger">Tolak</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>