<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/dosen" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Tambah Dosen
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form action="<?php echo base_url() ?>admin/tambah_dosen" method="post">
						<div class="form-group">
							<input type="hidden" name="password" value="unusia">
							<label>Nomor Induk Dosen</label>
							<input type="text" name="nid" class="form-control" value="<?php echo set_value('nid'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nid'); ?></small>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('email'); ?></small>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="text" name="telepon" class="form-control" value="<?php echo set_value('telepon'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('telepon'); ?></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" rows="3"><?php echo set_value('alamat') ?></textarea>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('alamat'); ?></small>
						</div>
						<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>