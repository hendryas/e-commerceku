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
                  <li class="breadcrumb-item active">Laporan Bulanan</li>
                </ol>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <!-- Coding Content Here -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Cetak Laporan Bulanan</h4>
            <p>Untuk melihat laporan bulanan, silahkan lakukan cetak laporan dibawah ini.</p>
            <form method="post" action="<?= base_url('report/report_bulanan') ?>">
              <div class="form-group mb-3">
                <label for="tanggal">Tanggal</label>
                <div class="row">
                  <div class="col-3">
                    <input type="month" class="form-control" name="tanggal" id="tanggal" required>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <div style="margin-right: 20px;">
                  <button class="btn btn-sm btn-info waves-effect waves-light mb-3 mt-3 p-2" name="btn_submit" value="lihat_data">
                    <i class="ri-add-line align-middle me-2"></i> Lihat Data
                  </button>
                </div>
                <div>
                  <button type="submit" class="btn btn-sm btn-success waves-effect waves-light mb-3 mt-3 ml-3 p-2" name="btn_submit" value="cetak_laporan">
                    <i class="ri-add-line align-middle me-2"></i> Cetak Laporan
                  </button>
                </div>
              </div>
            </form>
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