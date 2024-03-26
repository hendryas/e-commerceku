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
                  <span class="d-none d-sm-block">Pesanan Masuk</span>
                </a>
              </li>

              <!-- Pesanan Di Proses -->
              <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab" aria-selected="false">
                  <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                  <span class="d-none d-sm-block">Pesanan Di Proses</span>
                </a>
              </li>

              <!-- Pesanan Dikirim -->
              <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab" aria-selected="false">
                  <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                  <span class="d-none d-sm-block">Pesanan Di Kirim</span>
                </a>
              </li>

              <!-- Pesanan Selesai -->
              <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-bs-toggle="tab" href="#settings-1" role="tab" aria-selected="false">
                  <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                  <span class="d-none d-sm-block">Pesanan Di Terima</span>
                </a>
              </li>
            </ul>


            <div class="tab-content p-3 text-muted">
              <!-- Pesanan Masuk -->
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
                        <?php if ($bb['status_pembayaran'] == 1) : ?>
                          <td>
                            <a href="<?= base_url('pembayarancustomer/proses/' . encrypt_url($bb['id'])); ?>" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light">Proses</span></a>
                            <a class="btn btn-sm btn-primary waves-effect waves-light text-white" data-bs-toggle="modal" data-bs-target="#newCekBuktiModal<?php echo $bb['id']; ?>">Cek Bukti Bayar</a>
                          </td>
                        <?php else : ?>
                          <td> <button class="btn btn-sm btn-danger waves-effect waves-light" disabled>Belum Bayar</button></td>
                        <?php endif; ?>
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              <!-- Pesanan Di Proses -->
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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pesanan_diproses as $bb) : ?>
                      <tr class="text-center">
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $bb['name']; ?></td>
                        <td><?php echo $bb['no_order']; ?></td>
                        <td><?php echo $bb['tgl_order']; ?></td>
                        <td>
                          <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                          <span class="badge badge-boxed  badge-soft-primary">Diproses/Dikemas</span>
                        </td>
                        <?php if ($bb['status_pembayaran'] == 1) : ?>
                          <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#newKirimModal<?php echo $bb['id']; ?>" class="mr-3"> <span class="btn btn-sm btn-success waves-effect waves-light"><i class="far fa-paper-plane"></i> Dikirim</span></a>
                          </td>
                        <?php endif; ?>
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              <!-- Pesanan Di Kirim -->
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
                    <?php foreach ($pesanan_dikirim as $bb) : ?>
                      <tr class="text-center">
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $bb['name']; ?></td>
                        <td><?php echo $bb['no_order']; ?></td>
                        <td><?php echo $bb['tgl_order']; ?></td>
                        <td>
                          <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                          <span class="badge badge-boxed  badge-soft-warning">Dikirim</span>
                        </td>
                        <td>No.Resi : <?= $bb['no_resi']; ?></td>
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              <!-- Pesanan Selesai -->
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
                    <?php foreach ($pesanan_diterima as $bb) : ?>
                      <tr class="text-center">
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $bb['name']; ?></td>
                        <td><?php echo $bb['no_order']; ?></td>
                        <td><?php echo $bb['tgl_order']; ?></td>
                        <td>
                          <b>Rp. <?php echo number_format($bb['grand_total'], 0); ?></b> <br>
                          <span class="badge badge-boxed  badge-soft-success">Selesai</span>
                        </td>
                        <td>No.Resi : <?= $bb['no_resi']; ?></td>
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

<!-- START CEK BUKTI PEMBAYARAN MODAL -->
<?php foreach ($belum_bayar as $bb) : ?>
  <div class="modal fade newCekBuktiModal" id="newCekBuktiModal<?php echo $bb['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <!-- <div class="modal fade" id="newCekBuktiModal</?php echo $bb['id']; ?>" tabindex="-1" aria-labelledby="newCekBuktiModalLabel" aria-hidden="true"> -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newCekBuktiModalLabel">Bukti Pembayaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="menu">Gambar Bukti Pembayaran</label> <br>
            <img src="<?php echo base_url('assets/images/bukti_bayar/') . $bb['bukti_bayar']; ?>" width="400" height="250" alt="Gambar Product">
          </div>
          <div class="form-group mt-3">
            <label for="name">Atas Nama</label>
            <div class="input-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemilik Rekening" value="<?= $bb['atas_nama']; ?>" readonly>
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="nama_bank">Nama Bank</label>
            <div class="input-group">
              <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="<?= $bb['nama_bank']; ?>" readonly>
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="no_rek">No. Rekening</label>
            <div class="input-group">
              <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="Nomer Rekening" value="<?= $bb['no_rek']; ?>" readonly>
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="total_bayar">Total Bayar</label>
            <div class="input-group">
              <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="Total Bayar" value="<?= number_format($bb['grand_total'], 0); ?>" readonly>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-dismiss="modal">
          <i class="ri-close-line align-middle me-2"></i> Close
        </button>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END CEK BUKTI PEMBAYARAN MODAL -->

<!-- START KIRIM MODAL -->
<?php foreach ($pesanan_diproses as $bb) : ?>
  <div class="modal fade" id="newKirimModal<?php echo $bb['id']; ?>" tabindex="-1" aria-labelledby="newKirimModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newKirimModalLabel">No. Order : <?= $bb['no_order']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url('pembayarancustomer/kirim/') . encrypt_url($bb['id']); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="no_resi">No.Resi</label>
              <div class="input-group">
                <input type="text" class="form-control" id="no_resi" name="no_resi" placeholder="Nomor Resi" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light" data-bs-dismiss="modal">
              Kirim
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END KIRIM MODAL -->



<script>
  $(document).ready(function() {
    $('.datatable').DataTable({
      "ordering": false,
      scrollX: true
    });
  });
</script>