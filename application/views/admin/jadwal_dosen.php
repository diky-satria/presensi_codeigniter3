<div class="row">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin" class="btn btn-sm btn-dark my-3">Kembali</a>
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
				Jadwal Dosen
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Jadwal</th>
							<th>Mata kuliah</th>
							<th>Dosen</th>
							<th>Waktu</th>
							<th>Ruangan</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($jadwal_dosen as $jd): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><a href="<?php echo base_url() ?>admin/absensi_mahasiswa?id=<?php echo $jd->id_jadwal_dosen ?>&kode=<?php echo $jd->kode_jadwal ?>&dosen=<?php echo $jd->nama_dosen ?>"><?php echo $jd->kode_jadwal ?></a></td>
							<td><a href="<?php echo base_url() ?>admin/riwayat_absensi_dosen?id=<?php echo $jd->id_jadwal_dosen ?>&kode=<?php echo $jd->kode_jadwal ?>"><?php echo $jd->matkul ?></a></td>
							<td><?php echo $jd->nama_dosen ?></td>
							<td><?php echo $jd->waktu ?></td>
							<td><?php echo $jd->ruangan ?></td>
							<td>
								<a href="<?php echo base_url() ?>admin/detail_jadwal/<?php echo $jd->id_jadwal_dosen ?>" class="btn btn-sm btn-info">Detail</a>
								<a href="<?php echo base_url() ?>admin/ubah_jadwal/<?php echo $jd->id_jadwal_dosen ?>" class="btn btn-sm btn-success">Ubah</a>
								<a href="<?php echo base_url() ?>admin/hapus_jadwal?id=<?php echo $jd->id_jadwal_dosen ?>&kode=<?php echo $jd->kode_jadwal ?>" onclick="return confirm('lanjutkan >>>')" class="btn btn-sm btn-danger">Hapus</a>
								<?php if($jd->status_jadwal == 0): ?>
								<a onclick="return confirm('pastikan dosen sudah datang')" href="<?php echo base_url() ?>admin/buka_jadwal/<?php echo $jd->id_jadwal_dosen ?>" class="btn btn-sm btn-warning">Buka absen</a>
								<?php endif; ?>
								<?php if($jd->status_jadwal == 1): ?>
								<a onclick="return confirm('tutup absen sekarang')" href="<?php echo base_url() ?>admin/tutup_jadwal/<?php echo $jd->id_jadwal_dosen ?>" class="btn btn-sm btn-dark">Tutup absen</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_jadwal_dosen?kode=<?php echo kode_random(6) ?>" class="btn btn-sm btn-primary">Tambah</a>	
			</div>
		</div>
	</div>
</div>