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
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Pesanan</h4>
                    <div class="table-responsive shopping-cart">
                      <table class="table mb-0">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th width="100px">Quantity</th>
                            <th>Total Harga</th>
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
                                <p class="d-inline-block align-middle mb-0 product-name"><?php echo $items['name']; ?></p>
                              </td>
                              <td>Rp. <?php echo number_format($items['price'], 0); ?></td>
                              <td><?php echo $items['qty']; ?></td>
                              <td>Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                            </tr>
                            <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <!--end re-table-->
                    <div class="total-payment">
                      <table class="table mb-0">
                        <tbody>
                          <tr>
                            <td>Ongkir</td>
                            <td>
                              <select name="ongkir" id="ongkir" class="form-control">
                                <option value="0">Jakarta</option>
                                <option value="150000">Bodetabek</option>
                                <option value="300000">Luar Kota</option>
                              </select>
                            </td>
                            <td class="payment-title">Grand Total</td>
                            <td><label id="grand_total_id">Rp <?php echo number_format($this->cart->total(), 0); ?></label> </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--end table-->
                    </div>
                    <!--end total-payment-->
                  </div>
                  <!--end card-body-->
                </div>
                <!--end card-->
              </div>
              <!--end col-->

              <div class="col-lg-6">
                <div class="card">

                  <?php echo $this->session->flashdata('message'); ?>

                  <?php echo validation_errors('<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                  <div class="card-body">
                    <?php
                    $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                    ?>
                    <h4 class="header-title mt-0 mb-3">No.Order : <?php echo $no_order; ?></h4>
                    <h4 class="header-title mt-0 mb-3">Alamat Pengiriman</h4>
                    <form method="POST" action="<?php echo base_url('cart/proses_checkout'); ?>" class="mb-0">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama <small class="text-danger font-13">*</small></label>
                            <input type="text" name="nama" class="form-control" id="firstname" required>
                          </div>
                        </div>
                        <!--end col-->
                      </div>
                      <!--end row-->
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat Pengiriman<small class="text-danger font-13">*</small></label>
                            <input type="text" name="alamat_penerima" class="form-control" required>
                          </div>
                        </div>
                        <!--end col-->
                        <div class="col-sm-6 mt-3">
                          <div class="form-group">
                            <label for="provinsi">Provinsi</label><br>
                            <input type="text" name="provinsi" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                          <div class="form-group">
                            <label for="kota">Kota/Kabupaten</label><br>
                            <input type="text" name="kota" class="form-control" required>
                          </div>
                        </div>
                        <!--end col-->
                      </div>
                      <!--end row-->
                      <div class="row mt-3">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>HP Penerima <small class="text-danger font-13">*</small></label>
                            <input type="text" name="hp_penerima" class="form-control" onkeypress="isInputNumber(event)" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Email Address <small class="text-danger font-13">*</small></label>
                            <input type="email" name="email" class="form-control" required>
                          </div>
                        </div>
                        <!--end col-->
                        <!-- Simpan Transaksi -->
                        <input name="no_order" value="<?php echo $no_order; ?>" hidden>
                        <input name="estimasi" hidden>
                        <input name="ongkir" hidden>
                        <input name="grand_totals" value="<?php echo $this->cart->total(); ?>" hidden>
                        <input name="grand_total" id="grand_total" value="<?php echo $this->cart->total(); ?>" hidden>
                        <input name="total_bayar" hidden>
                        <!-- End Simpan Transaksi -->
                        <!-- Simpan Rinci Transaksi -->
                        <?php
                        $i = 1;
                        foreach ($this->cart->contents() as $items) {
                          echo form_hidden('qty' . $i++, $items['qty']);
                        }
                        ?>
                        <!-- End Simpan Rinci Transaksi -->

                      </div>
                      <!--end row-->
                      <a href="<?php echo base_url('cart/viewcart'); ?>" class="btn btn-primary px-3 mt-3">Kembali ke keranjang</a>
                      <button type="submit" class="btn btn-success px-3 mt-3">Bayar</button>
                    </form>
                    <!--end form-->
                  </div>
                  <!--end card-body-->
                </div>
                <!--end card-->

              </div>
              <!--end col-->
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Pembayaran</h4>
                    <div class="billing-nav">
                      <ul class="nav nav-pills justify-content-center text-center mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-credit-card-tab" data-toggle="pill" href="#pills-credit-card"><i class="mdi mdi mdi-bank d-block mx-auto text-danger font-18"></i>Transfer</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-credit-card">
                          <div class="demo-container">
                            <div class="card-wrapper mb-4"></div>
                            <div class="form-container">
                              <p>Untuk melanjutkan transaksi, silahkan melakukan pembayaran melalui transfer bank yang tersedia di bawah ini : </p>
                              <form class="bill-form">
                                <div class="row">
                                  <div class="col-md-6">
                                    <label for="">Rekening</label>
                                    <div class="form-group">
                                      <input placeholder="Nama Rekening" class="form-control" type="tel" name="number" value="BCA" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="">No. Rekening</label>
                                    <div class="form-group">
                                      <input placeholder="Nomer Rekening" class="form-control" type="tel" name="number" value="4568854796" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <!--end col-->
                                  <div class="col-md-6">
                                    <label for="">Nama Rekening</label>
                                    <div class="form-group">
                                      <input placeholder="Nama Rekening" class="form-control" type="text" name="name" value="Christopher Santoso" disabled>
                                    </div>
                                  </div>
                                  <!--end col-->
                                </div>
                                <!--end row-->

                              </form>
                              <!--end form-->
                            </div>
                            <!--end form-container-->
                          </div>
                          <!--end demo-->
                        </div>
                      </div>
                      <!--end tab-content-->
                    </div>
                    <!--end billing-nav-->
                  </div>
                  <!--end card-body-->
                </div>
                <!--end card-->
              </div>
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

<script>
  $(document).ready(function() {
    $("select[name=ongkir]").on("change", function() {
      var dataongkir = $("option:selected", this).val();
      var grandTotal = $('input[name="grand_totals"]').val();

      var hasil = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
      $("input[name=grand_total]").val(hasil);
      var reverse2 = hasil.toString().split('').reverse().join(''),
        ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
      ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');

      $("#grand_total_id").html("Rp. " + ribuan_total_bayar);
    });
  })
</script>