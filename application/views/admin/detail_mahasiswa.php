<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/mahasiswa" class="btn btn-sm btn-dark my-3">Kembali</a>
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
				Detail Mahasiswa/i
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>NIM</th>
								<td>:</td>
								<td><?php echo $mahasiswa->nim ?></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td>:</td>
								<td><?php echo $mahasiswa->nama_mahasiswa ?></td>
							</tr>
							<tr>
								<th>email</th>
								<td>:</td>
								<td><?php echo $mahasiswa->email_mahasiswa ?></td>
							</tr>
							<tr>
								<th>Telepon</th>
								<td>:</td>
								<td><?php echo $mahasiswa->telepon_mahasiswa ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>alamat</th>
								<td>:</td>
								<td><?php echo $mahasiswa->alamat_mahasiswa ?></td>
							</tr>
							<tr>
								<th>Jurusan</th>
								<td>:</td>
								<td><?php echo $mahasiswa->jurusan ?></td>
							</tr>
							<tr>
								<th>Semester</th>
								<td>:</td>
								<td><?php echo $mahasiswa->semester ?></td>
							</tr>
							<tr>
								<th>Kelas</th>
								<td>:</td>
								<td><?php echo $mahasiswa->kelas ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>