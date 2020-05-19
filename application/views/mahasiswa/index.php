<h4 class="mt-4 mb-3">Jadwal saya</h4>
<table class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Jadwal</th>
			<th>Mata kuliah</th>
			<th>Waktu</th>
			<th>Ruangan</th>
		</tr>
	</thead>
	<tbody>
	<?php if($get): ?>
		<?php if($jadwal): ?>
			<?php $no = 1; ?>
			<?php foreach($jadwal as $jd): ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $jd->kode_jadwal ?></td>
					<td><a href="<?php echo base_url() ?>mahasiswa/riwayat_absensi?kode=<?php echo $jd->kode_jadwal ?>&email=<?php echo $this->session->userdata('email_user') ?>"><?php echo $jd->matkul ?></a></td>
					<td><?php echo $jd->waktu ?></td>
					<td><?php echo $jd->ruangan ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="6"><center><h5>Tidak ada jadwal</h5></center></td>
			</tr>
		<?php endif; ?>
	<?php else: ?>
		<tr>
			<td colspan="6"><center><h5>Tidak ada jadwal</h5></center></td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>