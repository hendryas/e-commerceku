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
                        <h4 class="card-title mb-4">List User</h4>

                        <a href="#" class="btn btn-sm btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#newTambahData">Tambah User</a>

                        <?php echo $this->session->flashdata('message'); ?>

                        <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">

                                    <th>E-mail</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($user_management as $pst) : ?>
                                    <tr class="text-center">

                                        <td><?php echo $pst['email']; ?></td>
                                        <td><?php echo $pst['name']; ?></td>
                                        <td><?php echo $pst['role']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($pst['date_created'])); ?>
                                            <span class="text-danger"><?php echo date('H:i', strtotime($pst['date_created'])); ?></span>
                                        <td>

                                            <a href="#"><span class="btn btn-sm btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $pst['id']; ?>">Edit</span></a>

                                            <a class="btn-hapus" href="<?php echo base_url('admin/deleteuser/') . $pst['id']; ?>"><span class="btn btn-sm btn-danger waves-effect waves-light ml-3">Delete</span></a>
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

<!-- START TAMBAH MODAL -->
<div class="modal fade" id="newTambahData" tabindex="-1" aria-labelledby="newTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTambahDataLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>admin/adduser" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="nama">Nama Akun</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Akun" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label for="phone">No HP</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No HP" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label for="role_id">Role</label>
                        <select name="role_id" id="role_id" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select Role</option>
                            <?php foreach ($role as $rl) : ?>
                                <option value="<?php echo $rl['id']; ?>"><?php echo $rl['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="is_active">Aktif Akun</label>
                        <select name="is_active" id="is_active" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select Active</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END TAMBAH MODAL -->

<!-- START EDIT MODAL -->
<?php
foreach ($user_management as $pst) :  ?>
    <div class="modal fade" id="editModal<?php echo $pst['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>admin/edituser" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo $pst['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" autocomplete="off" value="<?php echo $pst['email']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" autocomplete="off" value="<?php echo $pst['name']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <select name="role_id" id="role_id" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Role</option>
                                <?php foreach ($role as $rl) : ?>
                                    <option value="<?php echo $rl['id']; ?>"><?php echo $rl['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
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
<!-- END EDIT MODAL -->


<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "ordering": false,
            scrollX: true
        });
    });
</script>