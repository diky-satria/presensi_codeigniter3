<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>dosen/jadwal" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Detail Jadwal Anda
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>Kode</th>
								<td>:</td>
								<td><?php echo $det->kode_jadwal ?></td>
							</tr>
							<tr>
								<th>Dosen</th>
								<td>:</td>
								<td><?php echo $det->nama_dosen ?></td>
							</tr>
							<tr>
								<th>Mata Kuliah</th>
								<td>:</td>
								<td><?php echo $det->matkul ?></td>
							</tr>
							<tr>
								<th>Waktu</th>
								<td>:</td>
								<td><?php echo $det->waktu ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>Jurusan</th>
								<td>:</td>
								<td><?php echo $det->jurusan_jadwal ?></td>
							</tr>
							<tr>
								<th>Semester</th>
								<td>:</td>
								<td><?php echo $det->semester_jadwal ?></td>
							</tr>
							<tr>
								<th>Kelas</th>
								<td>:</td>
								<td><?php echo $det->kelas_jadwal ?></td>
							</tr>
							<tr>
								<th>Ruangan</th>
								<td>:</td>
								<td><?php echo $det->ruangan ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>