<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/ruangan" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Tambah Ruangan
			</div>
			<div class="card-body">
				<form action="<?php echo base_url() ?>admin/tambah_ruangan" method="post">
					<div class="form-group">
						<label>No ruangan</label>
						<input type="text" name="ruangan" class="form-control" value="<?php echo set_value('ruangan'); ?>">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('ruangan'); ?></small>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>