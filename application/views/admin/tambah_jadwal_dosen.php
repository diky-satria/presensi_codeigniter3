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
				Tambah Jadwal Dosen
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md">
					<form action="<?php echo base_url() ?>admin/tambah_jadwal_dosen?kode=<?php echo $kode ?>" method="post">
						<div class="form-group">
							<label>Kode Jadwal</label>
							<input type="text" name="kode" class="form-control" value="<?php echo $kode ?>" readonly value="<?php echo set_value('kode'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('kode'); ?></small>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Dosen</label>
							<select class="form-control" name="dosen">
								<option disabled selected>-- Pilih Dosen --</option>
								<?php foreach($dosen_by_nama as $dbn): ?>
								<option value="<?php echo $dbn->email_dosen ?>"><?php echo $dbn->nid ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dbn->nama_dosen ?></option>
								<?php endforeach; ?>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('dosen'); ?></small>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Mata Kuliah</label>
							<select class="form-control" name="matkul">
								<option disabled selected>-- Pilih Mata Kuliah --</option>
								<?php foreach($matkul_by_nama as $mbn): ?>
								<option value="<?php echo $mbn->nama_matkul ?>"><?php echo $mbn->nama_matkul ?></option>
								<?php endforeach; ?>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('matkul'); ?></small>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Waktu</label>
							<input type="text" name="waktu" class="form-control" placeholder="senin 09.00-11.00" value="<?php echo set_value('waktu'); ?>">
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('waktu'); ?></small>
							<small id="emailHelp" class="form-text text-danger">Format : <b>senin 09.00-11.00</b></small>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Ruangan</label>
							<select class="form-control" name="ruangan">
								<option disabled selected>-- Pilih Ruangan --</option>
								<?php foreach($ruangan as $r): ?>
								<option value="<?php echo $r->no_ruangan ?>"><?php echo $r->no_ruangan ?></option>
								<?php endforeach; ?>
							</select>
							<small id="emailHelp" class="form-text text-danger"><?php echo form_error('ruangan'); ?></small>
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
				<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>