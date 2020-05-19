<h4 class="mt-4 mb-3">Jadwal saya</h4>
<div class="row">
	<div class="col-md">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<table class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Jadwal</th>
					<th>Mata kuliah</th>
					<th>Waktu</th>
					<th>Ruangan</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
			<?php if($jadwal_dosen): ?>
				<?php $no = 1; ?>
				<?php foreach($jadwal_dosen as $jd): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><a href="<?php echo base_url() ?>dosen/absensi_mahasiswa?kode=<?php echo $jd->kode_jadwal ?>&matkul=<?php echo $jd->matkul ?>"><?php echo $jd->kode_jadwal ?></a></td>
						<td><a href="<?php echo base_url() ?>dosen/riwayat_absensi?kode=<?php echo $jd->kode_jadwal ?>&matkul=<?php echo $jd->matkul ?>"><?php echo $jd->matkul ?></a></td>
						<td><?php echo $jd->waktu ?></td>
						<td><?php echo $jd->ruangan ?></td>
						<td>
							<a href="<?php echo base_url() ?>dosen/detail_jadwal/<?php echo $jd->kode_jadwal ?>" class="btn btn-sm btn-info">Detail</a>
							<?php if($jd->status_mahasiswa == 0): ?>
							<a onclick="return confirm('lanjutkan >>>')" href="<?php echo base_url() ?>dosen/buka_absensi/<?php echo $jd->kode_jadwal ?>" class="btn btn-sm btn-warning">Buka absensi</a>
							<?php else: ?>
							<a onclick="return confirm('lanjutkan >>>')" href="<?php echo base_url() ?>dosen/tutup_absensi/<?php echo $jd->kode_jadwal ?>" class="btn btn-sm btn-dark">Tutup absensi</a>
							<a href="<?php echo base_url() ?>dosen/cek/<?php echo $jd->kode_jadwal ?>" class="btn btn-sm btn-success">Cek</a>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="6"><center><h5>Tidak ada jadwal</h5></center></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>