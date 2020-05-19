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
	<div class="col-md-4">
		<table class="table table-sm">
			<tr>
				<td>Kode jadwal</td>
				<td>:</td>
				<td><?php echo $dosen->kode_jadwal ?></td>
			</tr>
			<tr>
				<td>Nama Dosen</td>
				<td>:</td>
				<td><?php echo $dosen->nama_dosen ?></td>
			</tr>
			<tr>
				<td>Mata kuliah</td>
				<td>:</td>
				<td><?php echo $dosen->matkul ?></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td><?php echo $dosen->jurusan_jadwal ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<table class="table table-sm">
			<tr>
				<td>Semester</td>
				<td>:</td>
				<td><?php echo $dosen->semester_jadwal ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><?php echo $dosen->kelas_jadwal ?></td>
			</tr>
			<tr>
				<td>Waktu</td>
				<td>:</td>
				<td><?php echo $dosen->waktu ?></td>
			</tr>
			<tr>
				<td>Ruangan</td>
				<td>:</td>
				<td><?php echo $dosen->ruangan ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<table class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="bg-primary" style="color:white;">Disetujui</th>
					<th class="bg-danger" style="color:white;">Ditolak</th>
				</tr>
			</thead>
			<tbody>
			<?php if($riwayat): ?>
				<tr>
					<td><h4 style="font-weight:bold;text-align:center;"><?php echo $riwayat->disetujui ?></h4></td>
					<td><h4 style="font-weight:bold;text-align:center;"><?php echo $riwayat->ditolak ?></h4></td>
				</tr>
			<?php else: ?>
				<tr>
					<td colspan="4"><center><h5>Tidak ada absensi</h5></center></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<table class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr class="bg-secondary" style="color:white;">
					<td colspan="3"><center><h5>Riwayat absensi mu</h5></center></td>
				</tr>
				<tr>
					<th>No</th>
					<th>Tanggal absen</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php if($absensi_dosen): ?>
				<?php $no = 1; ?>
				<?php foreach($absensi_dosen as $ad): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo date('d-M-Y H:i', strtotime($ad->tanggal_absen)) ?></td>
						<td>
							<?php if($ad->status_absen_dosen == 0): ?>
								<h6><div class="badge badge-pill badge-warning">Menunggu konfirmasi</div></h6>
							<?php elseif($ad->status_absen_dosen == 1): ?>
								<h6><div class="badge badge-pill badge-danger">Ditolak</div></h6>
							<?php else: ?>
								<h6><div class="badge badge-pill badge-lg badge-primary">Disetujui</div></h6>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><center><h5>Belum ada riwayat absensi</h5></center></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>