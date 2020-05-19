<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/mahasiswa" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Tambah Mahasiswa
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form action="<?php echo base_url() ?>admin/tambah_mahasiswa" method="post">
						<div class="form-group">
							<input type="hidden" name="password" value="unusia">
							<label>Nomor Induk Mahasiswa (NIM)</label>
							<input type="text" name="nim" class="form-control" value="<?php echo set_value('nim'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nim'); ?></small>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Jurusan</label>
							<select class="form-control" name="jurusan">
								<option disabled selected>-- Pilih jurusan --</option>
								<?php foreach($jurusan as $j): ?>
								<option value="<?php echo $j->nama_jurusan ?>"><?php echo $j->nama_jurusan ?></option>
								<?php endforeach; ?>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('jurusan'); ?></small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<option disabled selected>-- Pilih semester --</option>
								<?php for ($i=1; $i <= 8 ; $i++): ?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php endfor; ?>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('semester'); ?></small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<option disabled selected>-- Pilih kelas --</option>
								<option value="pagi">Pagi</option>
								<option value="malam">Malam</option>
								<option value="weekend">Weekend</option>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('kelas'); ?></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('email'); ?></small>
						</div>	
					</div>
					<div class="col-md-6">
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