<h4 class="mt-4 mb-3">Jadwal absensi sekarang</h4>
<div class="row">
	<div class="col-md">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<?php 
	if($absensi):
 ?>
	<div class="row">
	<?php $no = 1; ?>
	<?php foreach($absensi as $a): ?>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header" style="background-color:#D3D3D3;">
					<b><?php echo $no++ ?></b>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<th>Kode jadwal</th>
							<td>:</td>
							<td><?php echo $a->kode_jadwal ?></td>
						</tr>
						<tr>
							<th>Mata Kuliah</th>
							<td>:</td>
							<td><?php echo $a->matkul ?></td>
						</tr>
						<tr>
							<th>Jurusan</th>
							<td>:</td>
							<td><?php echo $a->jurusan_jadwal ?></td>
						</tr>
						<tr>
							<th>Semester</th>
							<td>:</td>
							<td><?php echo $a->semester_jadwal ?></td>
						</tr>
						<tr>
							<th>Kelas</th>
							<td>:</td>
							<td><?php echo $a->kelas_jadwal ?></td>
						</tr>
						<tr>
							<th>Waktu</th>
							<td>:</td>
							<td><?php echo $a->waktu ?></td>
						</tr>
						<tr>
							<th>Ruangan</th>
							<td>:</td>
							<td><?php echo $a->ruangan ?></td>
						</tr>
					</table>
					<form action="<?php echo base_url() ?>dosen" method="post">
						<input type="hidden" name="kode" value="<?php echo $a->kode_jadwal ?>">
						<input type="hidden" name="email" value="<?php echo $this->session->userdata('email_user') ?>">
						<button onclick="return confirm('lanjutkan >>>')" type="submit" name="absen" class="btn btn-sm btn-block btn-primary">Absen</button>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
<?php else: ?>
	<div class="row">
		<div class="col-md-4">
			<div class="alert alert-danger">
				<h5>Tidak ada jadwal absensi</h5>
			</div>
		</div>
	</div>
<?php endif; ?>