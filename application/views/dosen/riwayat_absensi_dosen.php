<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>dosen/jadwal" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<table class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th class="bg-primary" style="color:white;">Disetujui</th>
			<th class="bg-danger" style="color:white;">Ditolak</th>
		</tr>
	</thead>
	<tbody>
	<?php if($absen): ?>
		<tr>
			<td><h4 style="font-weight:bold;text-align:center;"><?php echo $absen->disetujui ?></h4></td>
			<td><h4 style="font-weight:bold;text-align:center;"><?php echo $absen->ditolak ?></h4></td>
		</tr>
	<?php else: ?>
		<tr>
			<td colspan="4"><center><h5>Tidak ada absensi</h5></center></td>
		</tr>
	<?php endif ?>
	</tbody>
</table>
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
	<?php if($riwayat): ?>
		<?php $no = 1; ?>
		<?php foreach($riwayat as $r): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo date('d-M-Y H:i', strtotime($r->tanggal_absen)) ?></td>
				<td>
					<?php if($r->status_absen_dosen == 0): ?>
						<h6><div class="badge badge-pill badge-warning">Menunggu konfirmasi</div></h6>
					<?php elseif($r->status_absen_dosen == 1): ?>
						<h6><div class="badge badge-pill badge-danger">Ditolak</div></h6>
					<?php else: ?>
						<h6><div class="badge badge-pill badge-lg badge-primary">Disetujui</div></h6>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><center><h5>Kosong</h5></center></td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>