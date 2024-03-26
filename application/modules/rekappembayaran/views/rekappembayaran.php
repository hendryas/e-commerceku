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
                  <li class="breadcrumb-item active">Rekap Pembayaran</li>
                </ol>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <!-- Coding Content Here -->
        <div class="card">
          <div class="card-body">

            <h4 class="card-title mb-4">List Rekap Pembayaran</h4>

            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-justified" role="tablist">
              <li class="nav-item waves-effect waves-light">
                <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                  <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                  <span class="d-none d-sm-block">Pesanan Saya</span>
                </a>
              </li>
              <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab" aria-selected="false">
                  <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                  <span class="d-none d-sm-block">Pesanan di Proses</span>
                </a>
              </li>
              <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab" aria-selected="false">
                  <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                  <span class="d-none d-sm-block">Pesanan di Terima</span>
                </a>
              </li>
              <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-bs-toggle="tab" href="#settings-1" role="tab" aria-selected="false">
                  <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                  <span class="d-none d-sm-block">Pesanan Selesai</span>
                </a>
              </li>
            </ul>

            <!-- Tab Pesanan -->
            <div class="tab-content p-3 text-muted">
              <div class="tab-pane active" id="home-1" role="tabpanel">

                <?php echo $this->session->flashdata('message'); ?>

                <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>Nama</th>
                      <th>No. Order</th>
                      <th>Tanggal</th>
                      <th>Total Bayar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($belum_bayar as $bb) : ?>
                      <tr class="text-center">
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $bb['name']; ?></td>
                        <td><?php echo $bb['no_order']; ?></td>
                        <td><?php echo $bb['tgl_order']; ?></td>
                        <td>
                          <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                          <?php if ($bb['status_pembayaran'] == 0) : ?>
                            <span class="badge badge-boxed  badge-soft-danger">Belum Bayar</span>
                          <?php else : ?>
                            <span class="badge badge-boxed  badge-soft-success">Sudah Bayar</span> <br>
                            <span class="badge badge-boxed  badge-soft-primary">Menunggu diverifikasi</span>
                          <?php endif; ?>
                        </td>
                        <?php if ($bb['status_pembayaran'] == 0) : ?>
                          <td> <a href="<?= base_url('pesanansaya/bayar/' . encrypt_url($bb['id'])); ?>" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light">Bayar</span></a></td>
                        <?php else : ?>
                          <td> <button class="btn btn-sm btn-danger waves-effect waves-light" disabled>Menunggu Verifikasi</button></td>
                        <?php endif; ?>
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              <!-- Di Kirim -->
              <div class="tab-pane" id="profile-1" role="tabpanel">

                <?php echo $this->session->flashdata('message'); ?>

                <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>Nama</th>
                      <th>No. Order</th>
                      <th>Tanggal</th>
                      <th>Total Bayar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($diproses as $bb) : ?>
                      <tr class="text-center">
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $bb['name']; ?></td>
                        <td><?php echo $bb['no_order']; ?></td>
                        <td><?php echo $bb['tgl_order']; ?></td>
                        <td>
                          <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                          <?php if ($bb['status_pembayaran'] == 0) : ?>
                            <span class="badge badge-boxed  badge-soft-danger">Belum Bayar</span>
                          <?php else : ?>
                            <span class="badge badge-boxed  badge-soft-success">Terverifikasi</span> <br>
                            <span class="badge badge-boxed  badge-soft-primary">Diproses/Dikemas</span>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              <!-- Di Terima -->
              <div class="tab-pane" id="messages-1" role="tabpanel">

                <?php echo $this->session->flashdata('message'); ?>

                <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>Nama</th>
                      <th>No. Order</th>
                      <th>Tanggal</th>
                      <th>Total Bayar</th>
                      <th>No.Resi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($dikirim as $bb) : ?>
                      <tr class="text-center">
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $bb['name']; ?></td>
                        <td><?php echo $bb['no_order']; ?></td>
                        <td><?php echo $bb['tgl_order']; ?></td>
                        <td>
                          <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                          <span class="badge badge-boxed  badge-soft-warning">Dikirim</span>
                        </td>
                        <td>
                          No.Resi : <?= $bb['no_resi']; ?> <br>
                          <button data-bs-toggle="modal" data-bs-target="#newDiterimaModal<?php echo $bb['id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light">Diterima</button>
                        </td>
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              <!-- Di Selesai -->
              <div class="tab-pane" id="settings-1" role="tabpanel">

                <?php echo $this->session->flashdata('message'); ?>

                <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>Nama</th>
                      <th>No. Order</th>
                      <th>Tanggal</th>
                      <th>Total Bayar</th>
                      <th>No.Resi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($diterima as $bb) : ?>
                      <tr class="text-center">
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $bb['name']; ?></td>
                        <td><?php echo $bb['no_order']; ?></td>
                        <td><?php echo $bb['tgl_order']; ?></td>
                        <td>
                          <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                          <span class="badge badge-boxed  badge-soft-success">Selesai</span>
                        </td>
                        <td>
                          No.Resi : <?= $bb['no_resi']; ?> <br>
                        </td>
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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

<!-- START MODAL DITERIMA -->
<?php foreach ($dikirim as $bb) : ?>
  <div class="modal fade" id="newDiterimaModal<?php echo $bb['id']; ?>" tabindex="-1" aria-labelledby="newDiterimaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newDiterimaModalLabel">Pesanan diterima</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('rekappembayaran/diterima/') . encrypt_url($bb['id']); ?>" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              Apakah anda yakin pesanan sudah diterima....?
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Ya</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END MODAL DITERIMA -->



<script>
  $(document).ready(function() {
    $('.datatable').DataTable({
      "ordering": false,
      scrollX: true
    });
  });
</script>