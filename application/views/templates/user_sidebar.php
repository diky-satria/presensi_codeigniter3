<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                <?php if($this->session->userdata('role_user') == 1): ?>
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <a class="nav-link" href="<?php echo base_url() ?>admin">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Dashboard
                    </a>
                <?php endif; ?>
                <?php if($this->session->userdata('role_user') == 1 || $this->session->userdata('role_user') == 2): ?>
                    <div class="sb-sidenav-menu-heading">Dosen</div>
                    <a class="nav-link" href="<?php echo base_url() ?>dosen">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chart-area"></i>
                        </div>
                        Absen
                    </a>
                    <a class="nav-link" href="<?php echo base_url() ?>dosen/jadwal">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chart-area"></i>
                        </div>
                        Jadwal
                    </a>
                <?php endif; ?>
                    <div class="sb-sidenav-menu-heading">Mahasiswa</div>
                    <a class="nav-link" href="<?php echo base_url() ?>mahasiswa">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chart-area"></i>
                        </div>
                        Jadwal
                    </a>
                    <a class="nav-link" href="<?php echo base_url() ?>mahasiswa/ubah_password">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chart-area"></i>
                        </div>
                        Ubah Password
                    </a>
                    <a class="nav-link" data-toggle="modal" data-target="#logout">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-table"></i>
                        </div>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mb-3">