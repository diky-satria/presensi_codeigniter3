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
				Mata kuliah
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Mata kuliah</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php foreach($matkul as $m): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $m->nama_matkul ?></td>
							<td>
								<a onclick="return confirm('lanjutkan >>>')" href="<?php echo base_url() ?>admin/hapus_matkul/<?php echo $m->id_matkul ?>" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_matkul" class="btn btn-sm btn-primary">Tambah</a>	
			</div>
		</div>
	</div>
</div>