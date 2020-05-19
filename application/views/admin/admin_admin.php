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
				Admin
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Telepon</th>
							<th>Alamat</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1; ?>
					<?php foreach($admin as $a): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $a->nama_admin ?></td>
							<td><?php echo $a->email_admin ?></td>
							<td><?php echo $a->telepon_admin ?></td>
							<td><?php echo $a->alamat_admin ?></td>
							<td>
								<a href="<?php echo base_url() ?>admin/ubah_admin/<?php echo $a->id_admin ?>" class="btn btn-sm btn-success">Ubah</a>
								<a onclick="return confirm('lanjutkan >>>')" href="<?php echo base_url() ?>admin/hapus_admin?id=<?php echo $a->id_admin ?>&email=<?php echo $a->email_admin ?>" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_admin" class="btn btn-sm btn-primary">Tambah</a>	
			</div>
		</div>
	</div>
</div>