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
				Mahasiswa/i
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama</th>
							<th>Jurusan</th>
							<th>Semester</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($mahasiswa as $m): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $m->nim ?></td>
							<td><?php echo $m->nama_mahasiswa ?></td>
							<td><?php echo $m->jurusan ?></td>
							<td><?php echo $m->semester ?></td>
							<td>
								<a href="<?php echo base_url() ?>admin/detail_mahasiswa/<?php echo $m->id_mahasiswa ?>" class="btn btn-sm btn-info">Detail</a>
								<a href="<?php echo base_url() ?>admin/ubah_mahasiswa/<?php echo $m->id_mahasiswa ?>" class="btn btn-sm btn-success">Ubah</a>
								<a onclick="return confirm('Lanjutkan >>>')" href="<?php echo base_url() ?>admin/hapus_mahasiswa?id=<?php echo $m->id_mahasiswa ?>&email=<?php echo $m->email_mahasiswa ?>" class="btn btn-sm btn-danger">Hapus</a>
								<?php if($m->status == 0): ?>
								<a onclick="return confirm('lanjutkan >>>')" href="<?php echo base_url() ?>admin/buka_access_mahasiswa?id=<?php echo $m->id_mahasiswa ?>&email=<?php echo $m->email_mahasiswa ?>" class="btn btn-sm btn-primary">Buka access</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_mahasiswa" class="btn btn-sm btn-primary">Tambah</a>	
			</div>
		</div>
	</div>
</div>