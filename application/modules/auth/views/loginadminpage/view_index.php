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

                    <h4 class="font-size-18 mt-4">Selamat Datang!</h4>
                    <p class="text-muted">Silahkan login untuk melanjutkan.</p>
                  </div>

                  <div class="p-2 mt-5">
                    <form method="POST" class="" action="<?php echo base_url(); ?>auth/loginadmin">

                      <div class="mb-3 auth-form-group-custom mb-4">
                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan email">
                      </div>

                      <div class="mb-3 auth-form-group-custom mb-4">
                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                      </div>

                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="customControlInline">
                        <label class="form-check-label" for="customControlInline">Remember me</label>
                      </div>

                      <div class="mt-4 text-center">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                      </div>

                      <div class="mt-4 text-center">
                        <a hidden href="<?php echo base_url(); ?>auth/forgotpassword" class="text-muted"><i class="mdi mdi-lock me-1"></i>Lupa Password?</a>
                      </div>
                    </form>
                  </div>

                  <div class="mt-5 text-center">
                    <!-- <p><a href="<?php echo base_url(); ?>auth/register" class="fw-medium text-primary"> Register </a> </p> -->
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