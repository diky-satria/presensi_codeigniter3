<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>mahasiswa" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<table class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th class="bg-primary" style="color:white;">Hadir</th>
			<th class="bg-success" style="color:white;">Sakit</th>
			<th class="bg-warning" style="color:white;">Izin</th>
			<th class="bg-danger" style="color:white;">Alpha</th>
		</tr>
	</thead>
	<tbody>
	<?php if($absen): ?>
		<tr>
			<td><h4 style="font-weight:bold;text-align:center;"><?php echo $absen->hadir ?></h4></td>
			<td><h4 style="font-weight:bold;text-align:center;"><?php echo $absen->sakit ?></h4></td>
			<td><h4 style="font-weight:bold;text-align:center;"><?php echo $absen->izin ?></h4></td>
			<td><h4 style="font-weight:bold;text-align:center;"><?php echo $absen->alpha ?></h4></td>
		</tr>
	<?php else: ?>
		<tr>
			<td colspan="4"><center><h5>Tidak ada absensi</h5></center></td>
		</tr>
	<?php endif; ?>
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
					<?php if($r->status == 'hadir'): ?>
						<h6><div class="badge badge-pill badge-primary"><?php echo $r->status ?></div></h6>
					<?php elseif($r->status == 'sakit'): ?>
						<h6><div class="badge badge-pill badge-success"><?php echo $r->status ?></div></h6>
					<?php elseif($r->status == 'izin'): ?>
						<h6><div class="badge badge-pill badge-warning"><?php echo $r->status ?></div></h6>
					<?php else: ?>
						<h6><div class="badge badge-pill badge-danger"><?php echo $r->status ?></div></h6>
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