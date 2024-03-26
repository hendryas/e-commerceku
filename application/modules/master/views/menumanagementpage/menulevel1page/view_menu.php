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
                        <h4 class="card-title mb-4">List Menu Level 1</h4>

                        <a href="#" class="btn btn-sm btn-success waves-effect waves-light mb-3 mt-3" data-bs-toggle="modal" data-bs-target=".newMenuModal">
                            <i class="ri-add-line align-middle me-2"></i> Tambah
                        </a>

                        <?php echo $this->session->flashdata('message'); ?>

                        <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Url Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $m['menu']; ?></td>
                                        <td><?php echo $m['menu_nama']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-rounded btn-outline-success waves-effect waves-light"><span data-bs-toggle="modal" data-bs-target="#newEditMenuModal<?php echo $m['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus btn btn-sm btn-rounded btn-outline-danger waves-effect waves-light" href="<?php echo base_url('master/menulevel1/deletemenulevel1/') . encrypt_url($m['id']); ?>"><span>Delete</span></a>
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
<div class="modal fade newMenuModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/menulevel1" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu">URL Menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="URL menu" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="menu_nama">Nama Menu</label>
                        <input type="text" class="form-control" id="menu_nama" name="menu_nama" placeholder="Nama menu" autocomplete="off">
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

<!-- START EDIT MENU MODAL -->
<?php
foreach ($menu as $m) :  ?>
    <div class="modal fade" id="newEditMenuModal<?php echo $m['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newEditMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditMenuModalLabel">Edit Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/menulevel1/editmenulevel1" method="POST">
                    <input type="hidden" name="id" value="<?php echo $m['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="menu_edit">URL Menu</label>
                            <input type="text" class="form-control" id="menu_edit" name="menu_edit" placeholder="Nama Menu" autocomplete="off" value="<?php echo $m['menu']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="menu_nama_edit">Nama Menu</label>
                            <input type="text" class="form-control" id="menu_nama_edit" name="menu_nama_edit" placeholder="Nama Menu" autocomplete="off" value="<?php echo $m['menu_nama']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-dismiss="modal">
                            <i class="ri-close-line align-middle me-2"></i> Close
                        </button>
                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- END EDIT MENU MODAL -->

<!-- JS -->
<script src="<?= base_url('assets/js/dapur/script_catatan.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "ordering": false,
            scrollX: true
        });
    });
</script>