<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/mahasiswa" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Ubah Mahasiswa
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form action="<?php echo base_url() ?>admin/ubah_mahasiswa/<?php echo $mahasiswa->id_mahasiswa ?>" method="post">
						<div class="form-group">
							<input type="hidden" name="password" value="unusia">
							<label>Nomor Induk Mahasiswa (NIM)</label>
							<input type="text" name="nim" class="form-control" value="<?php echo $mahasiswa->nim ?>" readonly>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $mahasiswa->nama_mahasiswa ?>"
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Jurusan</label>
							<select class="form-control" name="jurusan">
								<?php foreach($jurusan as $j): ?>
								<option value="<?php echo $j->nama_jurusan ?>" <?php if($jr == $j->id_jurusan){ echo 'selected'; } ?>><?php echo $j->nama_jurusan ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<?php for ($i=1; $i <= 8 ; $i++): ?>
								<option value="<?php echo $i ?>" <?php if($sm == $i){ echo 'selected'; } ?>><?php echo $i ?></option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<option value="pagi" <?php if($kl == 'pagi'){ echo 'selected'; } ?>>Pagi</option>
								<option value="malam" <?php if($kl == 'malam'){ echo 'selected'; } ?>>Malam</option>
								<option value="weekend" <?php if($kl == 'weekend'){ echo 'selected'; } ?>>Weekend</option>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('kelas'); ?></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo $mahasiswa->email_mahasiswa ?>" readonly>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Telepon</label>
							<input type="text" name="telepon" class="form-control" value="<?php echo $mahasiswa->telepon_mahasiswa ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('telepon'); ?></small>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" rows="3"><?php echo $mahasiswa->alamat_mahasiswa ?></textarea>
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