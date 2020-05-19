<h4 class="mt-4 mb-3">Dashboard</h4>

<div class="row">
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/admin_admin" style="text-decoration:none;">
	        <div class="card text-white bg-secondary mb-4">
	            <div class="card-body">
	            	Admin
	            	<div class="angka h1"><?php echo $count_admin ?></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/dosen" style="text-decoration:none;">
	        <div class="card text-white mb-4" style="background-color:#996633;">
	            <div class="card-body">
	            	Dosen
	            	<div class="angka h1"><?php echo $count_dosen ?></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/mahasiswa" style="text-decoration:none;">
	        <div class="card text-white mb-4" style="background-color:#cccc00;">
	            <div class="card-body">
	            	Mahasiswa/i
	            	<div class="angka h1"><?php echo $count_mahasiswa ?></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/jurusan" style="text-decoration:none;">
	        <div class="card text-white mb-4" style="background-color:#527a7a;">
	            <div class="card-body">
	            	Jurusan
	            	<div class="angka h1"><?php echo $count_jurusan ?></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/ruangan" style="text-decoration:none;">
	        <div class="card text-white mb-4" style="background-color:#cc3300;">
	            <div class="card-body">
	            	Ruangan
	            	<div class="angka h1"><?php echo $count_ruangan ?></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/matkul" style="text-decoration:none;">
	        <div class="card text-white mb-4" style="background-color:#7a00cc;">
	            <div class="card-body">
	            	Mata kuliah
	            	<div class="angka h1"><?php echo $count_matkul ?></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/jadwal_dosen" style="text-decoration:none;">
	        <div class="card text-white mb-4" style="background-color:#993333;">
	            <div class="card-body">
	            	Jadwal Dosen
	            	<div class="angka h1"><?php echo $count_jadwal_dosen ?></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/konfirmasi_absen_dosen" style="text-decoration:none;">
	        <div class="card text-white mb-4" style="background-color:#ebebe0;">
	            <div class="card-body text-dark">
	            	Konfirmasi absen dosen
	            	<div class="angka h1 text-danger"><?php echo $count_konfirmasi_dosen ?></div>
	            </div>
	        </div>
	    </a>
    </div>
</div>
</div>    
