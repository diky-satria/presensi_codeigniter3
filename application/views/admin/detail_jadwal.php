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
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Detail Jadwal Dosen
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>Kode</th>
								<td>:</td>
								<td><?php echo $jadwal_dosen->kode_jadwal ?></td>
							</tr>
							<tr>
								<th>Dosen</th>
								<td>:</td>
								<td><?php echo $jadwal_dosen->nama_dosen ?></td>
							</tr>
							<tr>
								<th>Mata Kuliah</th>
								<td>:</td>
								<td><?php echo $jadwal_dosen->matkul ?></td>
							</tr>
							<tr>
								<th>Waktu</th>
								<td>:</td>
								<td><?php echo $jadwal_dosen->waktu ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>Jurusan</th>
								<td>:</td>
								<td><?php echo $jadwal_dosen->jurusan_jadwal ?></td>
							</tr>
							<tr>
								<th>Semester</th>
								<td>:</td>
								<td><?php echo $jadwal_dosen->semester_jadwal ?></td>
							</tr>
							<tr>
								<th>Kelas</th>
								<td>:</td>
								<td><?php echo $jadwal_dosen->kelas_jadwal ?></td>
							</tr>
							<tr>
								<th>Ruangan</th>
								<td>:</td>
								<td><?php echo $jadwal_dosen->ruangan ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>