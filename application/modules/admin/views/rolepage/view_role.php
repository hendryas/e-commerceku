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
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $r['role']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/role/roleaccess/') . encrypt_url($r['id']); ?>"><span class="btn-sm btn-rounded btn btn-outline-warning waves-effect waves-light">access</span></a>
                                            <a href="#"><span class="btn btn-sm btn-rounded btn-outline-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#newEditRoleModal<?php echo $r['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus btn btn-sm btn-rounded btn-outline-danger waves-effect waves-light" href="<?php echo base_url('admin/role/deleterole/') . encrypt_url($r['id']); ?>"><span>Delete</span></a>
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

<!-- START TAMBAH ROLE MODAL -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Role Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>admin/role" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama Role" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END TAMBAH ROLE MODAL -->

<!-- START EDIT Role MODAL -->
<?php
foreach ($role as $r) :  ?>
    <div class="modal fade" id="newEditRoleModal<?php echo $r['id']; ?>" tabindex="-1" aria-labelledby="newEditRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditRoleModalLabel">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>admin/role/editrole" method="POST">
                    <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_role">Nama Role</label><br>
                            <input type="text" class="form-control" id="nama_role" name="nama_role" placeholder="Nama Role" autocomplete="off" value="<?php echo $r['role']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- END EDIT Role MODAL -->

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "ordering": false,
            scrollX: true
        });
    });
</script>