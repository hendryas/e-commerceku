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
            <h4 class="card-title mb-4">List Barang</h4>

            <a href="#" class="btn btn-sm btn-success waves-effect waves-light mb-3 mt-3" data-bs-toggle="modal" data-bs-target=".newAddModal">
              <i class="ri-add-line align-middle me-2"></i> Tambah
            </a>

            <?php echo $this->session->flashdata('message'); ?>

            <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr class="text-center">
                  <th>#</th>
                  <th>Kategori</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Deskripsi Barang</th>
                  <th>Warna Barang</th>
                  <th>Stok Barang</th>
                  <th>Foto Barang</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($product as $p) : ?>
                  <tr class="text-center">
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $p['kategori']; ?></td>
                    <td><?php echo $p['nama_barang']; ?></td>
                    <td>Rp.<?php echo number_format($p['harga'], 0); ?></td>
                    <td><?php echo $p['deskripsi']; ?></td>
                    <td><?php echo $p['warna']; ?></td>
                    <td><?php echo $p['stok']; ?></td>
                    <td> <img src="<?php echo base_url('assets/images/product_barang/') . $p['image']; ?>" width="200" height="150" alt="Gambar Product"> </td>
                    <td>
                      <a href="#" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#newEditModal<?php echo $p['id_barang']; ?>">Edit</span></a>
                      <a class="btn-hapus" href="<?php echo base_url('barang/deleteproduct/') . encrypt_url($p['id_barang']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
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

<!-- START TAMBAH MENU MODAL -->
<div class="modal fade newAddModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newAddModalLabel">Tambah Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(); ?>barang/add" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori" autocomplete="off">
          </div>
          <div class="form-group mt-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off">
          </div>
          <div class="form-group mt-3">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Barang" autocomplete="off">
          </div>
          <div class="form-group mt-3">
            <label for="deskripsi">Deskripsi Barang</label><br>
            <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
          </div>
          <div class="form-group mt-3">
            <label for="warna">Warna</label>
            <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna Barang" autocomplete="off">
          </div>
          <div class="form-group mt-3">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok Barang" autocomplete="off">
          </div>
          <div class="form-group mt-3">
            <label class="control-label">Upload Foto</label>
            <div class="card shadow-lg">
              <div class="card-body">
                <h4 class="mt-0 header-title">File Upload</h4>
                <p class="text-muted mb-3">Upload gambar disini</p>
                <input type="file" id="input-file-now" name="image" class="dropify" accept="image/png, image/jpeg" required />
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
            <small>Upload foto ukuran 4x6 Maksimal 3MB | Ukuran 420x420</small>
            <!--end form-group-->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-dismiss="modal">
            <i class="ri-close-line align-middle me-2"></i> Close
          </button>
          <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END TAMBAH MENU MODAL -->

<!-- START EDIT Product MODAL -->
<?php
foreach ($product as $p) :  ?>
  <div class="modal fade" id="newEditModal<?php echo $p['id_barang']; ?>" tabindex="-1" aria-labelledby="newEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newEditModalLabel">Edit Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(); ?>barang/editproduct" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_barang" value="<?php echo $p['id_barang']; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="kategori">Kategori</label><br>
              <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori" autocomplete="off" value="<?= $p['kategori'] ?>" required>
            </div>
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label><br>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" value="<?= $p['nama_barang'] ?>" required>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label><br>
              <input type="number" class="form-control" id="harga" min="0" name="harga" placeholder="Harga" autocomplete="off" value="<?= $p['harga'] ?>" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Barang</label><br>
              <textarea class="form-control" name="deskripsi" rows="5" required><?php echo $p['harga'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="warna">Warna</label><br>
              <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna" autocomplete="off" value="<?= $p['warna'] ?>" required>
            </div>
            <div class="form-group">
              <label for="stok">Stok</label><br>
              <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" autocomplete="off" onkeypress="isInputNumber(event)" value="<?= $p['stok'] ?>" required>
            </div>
            <div class="form-group">
              <label class="control-label">Preview Foto</label>
              <br>
              <img src="<?php echo base_url('assets/images/product_barang/') . $p['image']; ?>" width="200" height="150" alt="Gambar Product">
            </div>
            <div class="form-group">
              <label class="control-label">Upload Foto</label>
              <div class="card shadow-lg">
                <div class="card-body">
                  <h4 class="mt-0 header-title">File Upload</h4>
                  <p class="text-muted mb-3">Upload gambar disini</p>
                  <input type="file" id="input-file-now" name="image" class="dropify" accept="image/png, image/jpeg" />
                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
              <small>Upload foto ukuran 4x6 Maksimal 3MB | Ukuran 420x420</small>
              <!--end form-group-->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-dismiss="modal">
              <i class="ri-close-line align-middle me-2"></i> Close
            </button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END EDIT Product MODAL -->


<script>
  $(document).ready(function() {
    $('.datatable').DataTable({
      "ordering": false,
      scrollX: true
    });
  });
</script>