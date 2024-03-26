<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/logo/shopping-cart.png') ?>" alt="logo-sm-dark" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/logo/shopping-cart.png') ?>" alt="logo-dark" height="20">
                    </span>
                </a>

                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/logo/shopping-cart.png') ?>" alt="logo-sm-light" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/logo/shopping-cart.png') ?>" alt="logo-light" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>

        <?php
        $keranjang = $this->cart->contents();
        $jml_item = 0;
        foreach ($keranjang as $k) {
            $jml_item = $jml_item + $k['qty'];
        }
        ?>

        <div class="d-flex">

            <!-- Zoom Wiew -->
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <!-- Cart -->
            <div class="dropdown d-inline-block">
                <?php if ($this->session->userdata('role_id') == 4) : ?>
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>
                        <?php if ($jml_item == 0) : ?>
                        <?php else : ?>
                            <span class="noti-dot"></span>
                        <?php endif; ?>
                    </button>
                <?php endif; ?>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <?php if ($jml_item == 0) : ?>
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col text-center">
                                    <h6 class="m-0"> Keranjang Masih Kosong </h6>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notifications </h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <a href="#!" class="small"> View All</a> -->
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <?php foreach ($keranjang as $k) : ?>
                                <?php $barang = $this->barang_model->getDataProductDetail($k['id'])->row_array(); ?>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="<?= base_url('assets/images/product_barang/') . $barang['image'] ?>" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mb-1"><?php echo $k['name']; ?></h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1"><?php echo $k['qty']; ?> x Rp.<?php echo number_format($k['price'], 0); ?></p>
                                                <p class="mb-0"><i class="fas fa-money-bill"></i> </i> Rp.<?php echo $this->cart->format_number($k['subtotal']); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="p-2 border-top">
                            <p>Total : Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></p>
                        </div>
                        <div class="p-2 border-top">
                            <div class="d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="<?= base_url('cart/viewcart') ?>">
                                    <i class="fas fa-shopping-basket"></i> View Cart
                                </a>
                            </div>
                            <div class="d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="<?= base_url('cart/checkout') ?>">
                                    <i class="fas fa-receipt"></i> Checkout
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if ($this->session->userdata('foto_user') == true) : ?>
                        <img class="rounded-circle header-profile-user" src="<?= base_url('assets/assets_one/images/users/' . $this->session->userdata('foto_user')) ?>" alt="Header Avatar">
                    <?php else : ?>
                        <img class="rounded-circle header-profile-user" src="<?= base_url('assets/assets_one/images/users/avatar-2.jpg') ?>" alt="Header Avatar">
                    <?php endif; ?>
                    <span class="d-none d-xl-inline-block ms-1">
                        <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 3) : ?>
                            <?= $user['name']; ?>
                        <?php else : ?>
                            <?= $user['name']; ?>
                        <?php endif; ?>
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?= base_url('profile'); ?>"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger logout" href="#"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>