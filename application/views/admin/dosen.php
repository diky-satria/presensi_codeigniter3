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
			<div class="card-header" style="background-color:#D3D3D3;">
				Dosen
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>NID</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Telepon</th>
							<th>Alamat</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($dosen as $d): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $d->nid ?></td>
							<td><?php echo $d->nama_dosen ?></td>
							<td><?php echo $d->email_dosen ?></td>
							<td><?php echo $d->telepon_dosen ?></td>
							<td><?php echo $d->alamat_dosen ?></td>
							<td>
								<a href="<?php echo base_url() ?>admin/ubah_dosen/<?php echo $d->id_dosen ?>" class="btn btn-sm btn-success">Ubah</a>
								<a onclick="return confirm('lanjutkan >>>')" href="<?php echo base_url() ?>admin/hapus_dosen?id=<?php echo $d->id_dosen ?>&email=<?php echo $d->email_dosen ?>" class="btn btn-sm btn-danger">Hapus</a>
								<?php if($d->status == 0): ?>
								<a onclick="return confirm('lanjutkan >>>')" href="<?php echo base_url() ?>admin/buka_access_dosen?id=<?php echo $d->id_dosen ?>&email=<?php echo $d->email_dosen ?>" class="btn btn-sm btn-primary">Buka access</a>
							<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_dosen" class="btn btn-sm btn-primary">Tambah</a>	
			</div>
		</div>
	</div>
</div>