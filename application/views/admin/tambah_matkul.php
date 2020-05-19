<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/matkul" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Tambah Mata kuliah
			</div>
			<div class="card-body">
				<form action="<?php echo base_url() ?>admin/tambah_matkul" method="post">
					<div class="form-group">
						<label>Mata Kuliah</label>
						<input type="text" name="matkul" class="form-control" value="<?php echo set_value('matkul'); ?>">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('matkul'); ?></small>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>