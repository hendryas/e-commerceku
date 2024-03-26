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

            <?php
            $timestamp1 = strtotime($tanggal);
            // $formattedDate1 = date("d-m-Y", $timestamp1);
            $formattedDate1 = date('F Y', $timestamp1);
            ?>
            <h4 class="card-title mb-4">Laporan Bulanan <?php echo $formattedDate1; ?></h4>

            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title text-center">Data Penjualan Pada Bulan <?php echo $formattedDate1; ?></h4>
                  <br>

                  <div class="table-responsive">
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Penerima</th>
                          <th>No Order</th>
                          <th>Tanggal Order</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($report_produk as $report) : ?>
                          <tr class="table-warning">
                            <th scope="row"><?php echo $no; ?>.</th>
                            <td><?php echo $report['nama_penerima']; ?></td>
                            <td><?php echo $report['no_order']; ?></td>
                            <td><?php echo $report['tgl_order']; ?></td>
                            <td>Rp<?php echo  number_format($report['grand_total']); ?></td>
                          </tr>
                          <?php $no++; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>

                  </div>

                  <a href="<?= base_url('report') ?>" class="btn btn-sm btn-info waves-effect waves-light mb-3 mt-3 ml-3 p-2" name="btn_submit" value="cetak_laporan">
                    <i class="fas fa-ad fas fa-angle-left me-2"></i> Kembali
                  </a>
                </div>
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