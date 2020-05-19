<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/jurusan" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Ubah Jurusan
			</div>
			<div class="card-body">
				<form action="<?php echo base_url() ?>admin/ubah_jurusan/<?php echo $jurusan->id_jurusan ?>" method="post">
					<div class="form-group">
						<label>Jurusan</label>
						<input type="text" name="jurusan" class="form-control" value="<?php echo $jurusan->nama_jurusan ?>">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('jurusan'); ?></small>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
				</form>
			</div>
		</div>
	</div>
</div>