<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<script>
  $(document).ready(function() {
    var d = new Date();
    var curr_year = d.getFullYear();

    $(".Dates").datepicker({
      format: "dd/mm/yyyy",
      todayHighlight: true,
      changeMonth: true,
      changeYear: true,

      autoclose: true
    });
  });
</script>
<div id="layout-wrapper">

  <!-- ========== Left Sidebar Start ========== -->
  <?= $this->load->view('templates/sidebar/sidebar'); ?>
  <!-- ========== Left Sidebar End ========== -->


  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0"><?= $title; ?></h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                  <li class="breadcrumb-item active">Starter page</li>
                </ol>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <!-- Coding Content Here -->
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">

                    <?php echo $this->session->flashdata('message'); ?>

                    <h4 class="header-title mt-0">Shopping Cart</h4>
                    <?php echo form_open('cart/updatebarangcart'); ?>
                    <div class="table-responsive shopping-cart">
                      <table class="table mb-0">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Harga</th>
                            <th width="100px">Quantity</th>
                            <th>Sub-Total</th>
                            <th>Action</th>
                          </tr>

                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($this->cart->contents() as $items) : ?>
                            <?php
                            $barang = $this->barang_model->getDataProductDetail($items['id'])->row_array();
                            ?>
                            <tr>
                              <td>
                                <img src="#" alt="" height="52">
                                <p class="d-inline-block align-middle mb-0">
                                  <a href="" class="d-inline-block align-middle mb-0 product-name"> <?php echo $items['name']; ?></a>
                                  <br>
                                  <!-- <span class="text-muted font-13">size-08 (Model 2019)</span> -->
                                </p>
                              </td>
                              <td>Rp. <?php echo number_format($items['price'], 0); ?></td>
                              <td>
                                <?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '0', 'size' => '5', 'type' => 'number', 'class' => 'form-control')); ?>
                                <!-- <input class="form-control w-25" type="number" value="2" id="example-number-input1"> -->
                              </td>
                              <td>Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                              <td>
                                <a href="<?php echo base_url('cart/deletebarangcart/') . $items['rowid'] . '/' . $items['qty'] . '/' . $barang['id_barang']; ?>" class="text-dark"><i class="mdi mdi-close-circle-outline font-18"></i></a>
                              </td>
                            </tr>
                            <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="row justify-content-center">
                      <!--end col-->
                      <div class="col-md-12">
                        <div class="total-payment">
                          <h4 class="header-title">Total Payment</h4>
                          <table class="table">
                            <tbody>
                              <tr>
                                <td class="payment-title">Total</td>
                                <td class="text-dark"><strong>Rp. <?php echo number_format($this->cart->total(), 0); ?></strong></td>
                              </tr>

                            </tbody>
                          </table>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 mt-3">
                            <button class="btn btn-primary text-white px-4 d-inline-block">Update Cart</button>
                            <a href="<?php echo base_url('cart/clearbarangcart'); ?>" class="btn btn-danger text-white px-4 d-inline-block">Delete Cart</a>
                          </div>
                        </div>
                        <?php echo form_close(); ?>
                        <div class="mt-4">
                          <div class="row">
                            <div class="col-6">
                              <a href="<?php echo base_url('home'); ?>" class="text-info"><i class="fas fa-long-arrow-alt-left mr-1"></i> Continue Shopping</a>
                            </div>
                            <div class="col-6 text-right">
                              <a href="<?php echo base_url('cart/checkout'); ?>" class="text-info">Checkout <i class="fas fa-long-arrow-alt-right ml-1"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--end col-->
                    </div>
                    <!--end row-->
                  </div>
                  <!--end card-->
                </div>
                <!--end card-body-->
              </div>
              <!--end col-->
            </div>

          </div>
        </div>


      </div>
      <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- ========== Text Footer Start ========== -->
    <?= $this->load->view('templates/textfooter/textfooter'); ?>
    <!-- ========== Text Footer Start ========== -->

  </div>
  <!-- ============================================================== -->
  <!-- end main content-->
  <!-- ============================================================== -->

</div>
<!-- END layout-wrapper -->