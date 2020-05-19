<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/dosen" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Ubah Dosen
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form action="<?php echo base_url() ?>admin/ubah_dosen/<?php echo $dosen->id_dosen ?>" method="post">
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $dosen->id_dosen ?>">
							<input type="hidden" name="email" value="<?php echo $dosen->email_dosen ?>">
							<label>Nomor Induk Dosen</label>
							<input type="text" name="nid" class="form-control" value="<?php echo $dosen->nid ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $dosen->nama_dosen ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo $dosen->email_dosen ?>" readonly>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="text" name="telepon" class="form-control" value="<?php echo $dosen->telepon_dosen ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('telepon'); ?></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" rows="3"><?php echo $dosen->alamat_dosen ?></textarea>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('alamat'); ?></small>
						</div>
						<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>