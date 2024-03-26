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
            <h4 class="card-title mb-4">Rekap Pesanan</h4>

            <div class="row">
              <div class="col-lg-12 mx-auto">
                <div class="card m-b-30">
                  <div class="card-body">

                    <h4 class="mt-0 header-title">Upload Bukti Pembayaran</h4>
                    <p class="text-muted m-b-30 font-14">
                      Jika sudah melakukan pembayaran, silahkan upload bukti pembayaran anda di form dibawah ini.
                    </p>

                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="row">
                      <div class="col-lg-12">
                        <form class="form-horizontal auth-form my-4" enctype="multipart/form-data" method="POST" action="<?php echo base_url('pesanansaya/bayarpesanan/') . encrypt_url($DataPesanan['id']); ?>">

                          <div class="form-group">
                            <label for="name">Atas Nama</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="no_order" name="no_order" placeholder="Nomer Order" value="<?= $DataPesanan['no_order']; ?>" hidden>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemilik Rekening" value="<?php echo set_value('name'); ?>" required>
                            </div>
                            <small class="text-danger"><?php echo form_error('name'); ?></small>
                            <small>Tulis Nama Pemilik Bank</small>
                          </div>

                          <div class="form-group mt-3">
                            <label for="nama_bank">Nama Bank</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="<?php echo set_value('nama_bank'); ?>" required>
                            </div>
                            <small class="text-danger"><?php echo form_error('nama_bank'); ?></small>
                            <small>Tulis Nama Bank</small>
                          </div>

                          <div class="form-group mt-3">
                            <label for="no_rek">No. Rekening</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="Nomer Rekening" value="<?php echo set_value('no_rek'); ?>" required>
                            </div>
                            <small class="text-danger"><?php echo form_error('no_rek'); ?></small>
                            <small>Tulis Nomer Rekening Bank</small>
                          </div>

                          <div class="form-group mt-3">
                            <label class="control-label">Bukti Bayar</label>
                            <div class="card shadow-lg">
                              <div class="card-body">
                                <h4 class="mt-0 header-title">File Upload</h4>
                                <p class="text-muted mb-3">Upload gambar disini</p>
                                <input type="file" id="input-file-now" name="image" class="dropify" required />
                              </div>
                              <!--end card-body-->
                            </div>
                            <!--end card-->
                            <small>Upload foto Maksimal 3MB</small>
                            <!--end form-group-->
                          </div>
                          <!--end form-group-->

                          <div class="form-group mb-0 row">
                            <div class="col-6">
                              <button class="btn btn-sm btn-warning btn-round btn-block waves-effect waves-light" onclick="history.back()">Go Back</button>
                              <button class="btn btn-sm btn-primary btn-round btn-block waves-effect waves-light ml-5" type="submit">Submit</button>
                            </div>
                            <!--end col-->
                          </div>
                          <!--end form-group-->
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- end col -->
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
    $('.datatable').DataTable({
      "ordering": false,
      scrollX: true
    });
  });
</script>