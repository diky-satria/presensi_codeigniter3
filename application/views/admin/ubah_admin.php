<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/admin" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Ubah Admin
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md">
					<form action="<?php echo base_url() ?>admin/ubah_admin/<?php echo $admin->id_admin ?>" method="post">
						<input type="hidden" name="id" value="<?php echo $admin->id_admin ?>">
						<label>Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo $admin->email_admin ?>" readonly>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $admin->nama_admin ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Telepon</label>
							<input type="text" name="telepon" class="form-control" value="<?php echo $admin->telepon_admin ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('telepon'); ?></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" rows="3"><?php echo $admin->alamat_admin ?></textarea>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('alamat'); ?></small>
						</div>
						<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>