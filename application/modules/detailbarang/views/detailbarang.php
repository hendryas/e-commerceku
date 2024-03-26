<!-- <body data-layout="horizontal" data-topbar="dark"> -->
<?php
function format_rupiah($number)
{
  return 'Rp ' . number_format($number, 0, ',', '.');
}
?>
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
                  <li class="breadcrumb-item active">Detail Barang</li>
                </ol>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <!-- Coding Content Here -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-5">
                    <div class="product-detail">
                      <div class="row">
                        <div class="col-3">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php foreach ($gambar_products as $gambar) : ?>
                              <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab">
                                <img src="<?= base_url('assets/images/product_barang/') . $gambar['gambar'] ?>" alt="img-1" class="img-fluid mx-auto d-block tab-img rounded">
                              </a>
                            <?php endforeach; ?>
                          </div>
                        </div>
                        <div class="col-md-8 col-9">
                          <?php
                          echo form_open('cart/add');
                          echo form_hidden('id', $product[0]['id_barang']);
                          echo form_hidden('price', $product[0]['harga']);
                          echo form_hidden('name', $product[0]['nama_barang']);
                          echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                          ?>
                          <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                              <div class="product-img">
                                <img src="<?= base_url('assets/images/product_barang/') . $product[0]['image'] ?>" alt="img-1" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png">
                              </div>
                            </div>
                          </div>
                          <div class="row text-center mt-2">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-6">
                              <div class="d-grid">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mt-2">
                                  <i class="mdi mdi-cart me-2"></i> Add to cart
                                </button>
                              </div>
                            </div>
                            <div class="col-sm-2">
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- end product img -->
                  </div>
                  <div class="col-xl-7">
                    <div class="mt-4 mt-xl-3">
                      <a href="#" class="text-primary"></a>
                      <h5 class="mt-1 mb-3"><?php echo $product[0]['nama_barang'] ?></h5>

                      <div class="d-inline-flex">
                        <div class="text-muted me-3">
                          <!-- <span class="mdi mdi-star text-warning"></span>
                          <span class="mdi mdi-star text-warning"></span>
                          <span class="mdi mdi-star text-warning"></span>
                          <span class="mdi mdi-star text-warning"></span>
                          <span class="mdi mdi-star"></span> -->
                        </div>
                        <!-- <div class="text-muted">( 132 )</div> -->
                      </div>
                      <?php
                      $amount = $product[0]['harga'];
                      $formatted_amount = format_rupiah($amount);
                      ?>
                      <h5 class="mt-2"><?php echo $formatted_amount; ?><span class="text-danger font-size-12 ms-2"></span></h5>
                      <p>Stok : <?php echo $product[0]['stok'] ?></p>
                      <!-- <p class="mt-3">To achieve this, it would be necessary to have uniform pronunciation</p> -->
                      <div class="row">
                        <div class="col-3">
                          <input type="number" name="qty" id="qty" class="form-control" value="1" maxlength="3" min="0">
                        </div>
                      </div>
                      <?php echo form_close(); ?>
                      <hr class="my-4">

                    </div>
                  </div>
                </div>
                <!-- end row -->

                <div class="mt-4">
                  <h5 class="font-size-14 mb-3">Product description: </h5>
                  <div class="product-desc">
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link" id="desc-tab" data-bs-toggle="tab" href="#desc" role="tab">Description</a>
                      </li>
                    </ul>
                    <div class="tab-content border border-top-0 p-4">

                      <div class="tab-pane active" id="desc" role="tabpanel">
                        <div>
                          <p>
                            <?php echo $product[0]['deskripsi']; ?>
                          </p>

                          <div>

                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- end card -->
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

<!-- Call Modal -->
<!-- </?= $this->load->view('dapur/modal/modal_catatan'); ?> -->



<script>
  $(document).ready(function() {
    $('.datatable').DataTable({
      "ordering": false,
      scrollX: true
    });
  });
</script>