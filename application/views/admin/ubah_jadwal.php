<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/jadwal_dosen" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Ubah Jadwal Dosen
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md">
					<form action="<?php echo base_url() ?>admin/ubah_jadwal/<?php echo $jad->id_jadwal_dosen ?>" method="post">
						<div class="form-group">
							<label>Kode Jadwal</label>
							<input type="text" name="kode" class="form-control" readonly value="<?php echo $jad->kode_jadwal ?>">
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Dosen</label>
							<select class="form-control" name="dosen">
								<?php foreach($dosen_by_nama as $dbn): ?>
								<option value="<?php echo $dbn->email_dosen ?>" <?php if($dos == $dbn->email_dosen){ echo 'selected'; } ?>><?php echo $dbn->nid ?>&nbsp;&nbsp;&nbsp;<?php echo $dbn->nama_dosen ?></option>
								<?php endforeach; ?>
							</select>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Mata Kuliah</label>
							<select class="form-control" name="matkul">
								<?php foreach($matkul_by_nama as $mbn): ?>
								<option value="<?php echo $mbn->nama_matkul ?>" <?php if($mat == $mbn->nama_matkul){ echo 'selected'; } ?>><?php echo $mbn->nama_matkul ?></option>
								<?php endforeach; ?>
							</select>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Waktu</label>
							<input type="text" name="waktu" class="form-control" value="<?php echo $jad->waktu ?>" readonly>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Ruangan</label>
							<input type="text" name="ruangan" class="form-control" value="<?php echo $jad->ruangan ?>" readonly>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Jurusan</label>
							<select class="form-control" name="jurusan">
								<?php foreach($jurusan as $j): ?>
								<option value="<?php echo $j->nama_jurusan ?>" <?php if($jur == $j->nama_jurusan){ echo 'selected'; } ?>><?php echo $j->nama_jurusan ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<?php for ($i=1; $i <= 8 ; $i++): ?>
								<option value="<?php echo $i ?>" <?php if($sem == $i){ echo 'selected'; } ?>><?php echo $i ?></option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<option value="pagi" <?php if($kel == 'pagi'){ echo 'selected'; } ?>>Pagi</option>
								<option value="malam" <?php if($kel == 'malam'){ echo 'selected'; } ?>>Malam</option>
								<option value="weekend" <?php if($kel == 'weekend'){ echo 'selected'; } ?>>Weekend</option>
							</select>
						</div>
					</div>
				</div>	
				<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
				</form>
			</div>
		</div>
	</div>
</div>