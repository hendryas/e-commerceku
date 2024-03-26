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

<?php
function format_rupiah($number)
{
  return 'Rp ' . number_format($number, 0, ',', '.');
}
?>
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
              <h4 class="mb-sm-0">Products</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                  <li class="breadcrumb-item active">Products</li>
                </ol>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div>

                  <div class="row">
                    <div class="col-md-6">
                      <div>
                        <h5>Semua Produk</h5>
                        <!-- <ol class="breadcrumb p-0 bg-transparent mb-2">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Fashion</a></li>
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Clothing</a></li>
                          <li class="breadcrumb-item active">T-shirts</li>
                        </ol> -->
                      </div>
                    </div>

                    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="assets/images/product_barang/fantech-alto-mh91.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="..." class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div> -->
                    <div class="card">
                      <div class="card-body">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active"></li>
                            <!-- <li data-bs-target="#carouselExampleFade" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExampleFade" data-bs-slide-to="2"></li> -->
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block img-fluid w-100" src="<?= base_url(); ?>assets/images/carousel-travel-pack.jpg" alt="First slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- <div class="col-md-6">
                      <div class="form-inline float-md-end">
                        <div class="search-box ms-2">
                          <div class="position-relative">
                            <input type="text" class="form-control rounded" placeholder="Search...">
                            <i class="mdi mdi-magnify search-icon"></i>
                          </div>
                        </div>
                      </div>
                    </div> -->

                  </div>

                  <div class="row g-0 mt-5">

                    <?php foreach ($product as $p) : ?>
                      <div class="col-xl-4 col-sm-6">
                        <?php
                        echo form_open('cart/add');
                        echo form_hidden('id', $p['id_barang']);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $p['harga']);
                        echo form_hidden('name', $p['nama_barang']);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>
                        <div class="product-box">
                          <div class="product-img">

                            <div class="product-like">

                            </div>
                            <img src="<?= base_url('assets/images/product_barang/') . $p['image']; ?>" alt="img-1" class="img-fluid mx-auto d-block" style="width: 200px;">
                          </div>

                          <div class="text-center">
                            <p class="font-size-12 mb-3"></p>
                            <h5 class="font-size-15"><a href="<?php echo base_url('detailbarang/detail/') . $p['id_barang'] ?>" class="text-dark"><?php echo $p['nama_barang'] ?></a></h5>
                            <?php
                            $amount = $p['harga'];
                            $formatted_amount = format_rupiah($amount);
                            ?>
                            <h5 class="mt-3 mb-0"><?php echo $formatted_amount; ?></h5>

                            <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light mt-3">
                              Add Cart <i class="fas fa-cart-plus align-middle ms-2"></i>
                            </button>
                          </div>
                        </div>
                        <?php echo form_close(); ?>
                      </div>
                    <?php endforeach; ?>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- end row -->

      </div> <!-- container-fluid -->
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



<script>
  $(document).ready(function() {
    $('.datatable').DataTable({
      "ordering": false,
      scrollX: true
    });
  });
</script>