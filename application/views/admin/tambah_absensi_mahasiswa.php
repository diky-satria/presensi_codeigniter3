<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/absensi_mahasiswa?id=<?php echo $id ?>&kode=<?php echo $kode ?>&dosen=<?php echo $dosen ?>" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header" style="background-color:rgba(0, 255, 0, .4);">
				Tambah Mahasiswa/i <?php echo $dosen ?>
			</div>
			<div class="card-body">
				<form action="<?php echo base_url() ?>admin/tambah_absensi_mahasiswa?id=<?php echo $id ?>&kode=<?php echo $kode ?>&dosen=<?php echo $dosen ?>" method="post">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<input type="hidden" name="dosen" value="<?php echo $dosen ?>">
						<input type="hidden" name="kode" value="<?php echo $kode ?>">
						<label>Mahasiswa/i</label>
						<select class="form-control" name="nama">
							<option disabled selected>-- Pilih mahasiswa/i --</option>
							<?php foreach($mhs as $m): ?>
							<option value="<?php echo $m->email_mahasiswa?>"><?php echo $m->nim ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $m->nama_mahasiswa ?></option>
							<?php endforeach; ?>
						</select>
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>