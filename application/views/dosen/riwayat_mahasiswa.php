<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>dosen/absensi_mahasiswa?kode=<?php echo $kode ?>&matkul=<?php echo $matkul ?>" class="btn btn-sm btn-dark my-3">Kembali</a>
	</div>
</div>
<table class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal absen</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
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
	</tbody>
</table>
