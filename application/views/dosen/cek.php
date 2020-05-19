<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>dosen/jadwal" class="btn btn-sm btn-dark my-3">Kembali</a>
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
				Cek kehadiran mahasiswa/i  
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th colspan="4">Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php if($mahasiswa): ?>
						<?php $no = 1; ?>
						<?php foreach($mahasiswa as $m): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $m->nama_mahasiswa ?></td>
								<td>
									<form action="<?php echo base_url() ?>dosen/hadir_mahasiswa" method="post">
										<input type="hidden" name="nama" value="<?php echo $m->nama_mhs ?>">
										<input type="hidden" name="kode" value="<?php echo $m->kode_jadwal ?>">
										<button type="submit" name="hadir" onclick="return confirm('Pastikan mahasiswa/i ada dikelas sekarang')"class="btn btn-sm btn-primary">Hadir</button>
									</form>
								</td>
								<td>
									<form action="<?php echo base_url() ?>dosen/sakit_mahasiswa" method="post">
										<input type="hidden" name="nama" value="<?php echo $m->nama_mhs ?>">
										<input type="hidden" name="kode" value="<?php echo $m->kode_jadwal ?>">
										<button type="submit" name="sakit" onclick="return confirm('Pastikan mahasiswa/i sudah konfirmasi sakit')" class="btn btn-sm btn-success">Sakit</button>
									</form>
								</td>
								<td>
									<form action="<?php echo base_url() ?>dosen/izin_mahasiswa" method="post">
										<input type="hidden" name="nama" value="<?php echo $m->nama_mhs ?>">
										<input type="hidden" name="kode" value="<?php echo $m->kode_jadwal ?>">
										<button type="submit" name="izin" onclick="return confirm('lanjutkan >>>')" class="btn btn-sm btn-warning">Izin</button>
									</form>
								</td>
								<td>
									<form action="<?php echo base_url() ?>dosen/alpha_mahasiswa" method="post">
										<input type="hidden" name="nama" value="<?php echo $m->nama_mhs ?>">
										<input type="hidden" name="kode" value="<?php echo $m->kode_jadwal ?>">
										<button type="submit" name="alpha" onclick="return confirm('lanjutkan >>>')" class="btn btn-sm btn-danger">Alpha</button>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="3"><center><h5>Tidak ada mahasiswa lagi untuk di cek, silahkan kembali dan tutup absen ini</h5></center></td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>