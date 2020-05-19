<div id="layoutAuthentication">
<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Presensi UNUSIA</h3></div>
                        <div class="card-body">
                            <form action="<?php echo base_url() ?>auth" method="post">
                            <?php echo $this->session->flashdata('pesan') ?>
                                <div class="form-group">
                                    <label class="small mb-1">Email</label>
                                    <input class="form-control py-4" type="text" name="email" placeholder="Email..." value="<?php echo set_value('email'); ?>" />
                                    <small id="emailHelp" class="form-text text-danger"><?php echo form_error('email'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1">Password</label>
                                    <input class="form-control py-4" type="password" name="password" placeholder="Password" />
                                    <small id="emailHelp" class="form-text text-danger"><?php echo form_error('password'); ?></small>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="<?php echo base_url() ?>auth/lupa_password">Lupa Password?</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>