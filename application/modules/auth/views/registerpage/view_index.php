<div>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div>
                                            <a href="#" class="">
                                                <img src="assets/images/logo/shopping-cart.png" alt="" height="20" class="auth-logo logo-dark mx-auto">
                                                <img src="assets/images/logo/shopping-cart.png" alt="" height="20" class="auth-logo logo-light mx-auto">
                                            </a>
                                        </div>

                                        <h4 class="font-size-18 mt-4">Register Akun!</h4>
                                        <p class="text-muted">Silahkan mengisi form di bawah ini.</p>
                                    </div>

                                    <div class="p-2 mt-5">

                                        <?php echo $this->session->flashdata('message'); ?>

                                        <form method="POST" class="" action="register/registerakun">

                                            <div class="mb-3 auth-form-group-custom mb-4">
                                                <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" required>
                                                <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                            </div>

                                            <div class="mb-3 auth-form-group-custom mb-4">
                                                <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
                                                <small class="text-danger"><?php echo form_error('email'); ?></small>
                                            </div>

                                            <div class="mb-3 auth-form-group-custom mb-4">
                                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
                                                <small class="text-danger"><?php echo form_error('password'); ?></small>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mt-4 text-center">
                                                        <a href="<?= base_url(''); ?>" class="btn btn-primary w-md waves-effect waves-light">Kembali</a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-success w-md waves-effect waves-light" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <a hidden href="<?= base_url('forgotpassword'); ?>" class="text-muted"><i class="mdi mdi-lock me-1"></i>Lupa Password?</a>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p><a hidden href="<?= base_url('register'); ?>" class="fw-medium text-primary"> Register </a> </p>
                                        <p>© <script>
                                                document.write(new Date().getFullYear())
                                            </script> EcommerceKu </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="authentication-bg">
                    <div class="bg-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>