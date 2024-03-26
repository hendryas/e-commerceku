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
                        <h4 class="card-title mb-4">List Menu Level 2</h4>

                        <a href="#" class="btn btn-sm btn-success waves-effect waves-light mb-3 mt-3" data-bs-toggle="modal" data-bs-target=".newHasSubMenuModal">
                            <i class="ri-add-line align-middle me-2"></i> Tambah
                        </a>

                        <?php echo $this->session->flashdata('message'); ?>

                        <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Active</th>
                                    <th>Status Submenu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($hassubmenu as $hsm) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $hsm['title']; ?></td>
                                        <td><?php echo $hsm['menu']; ?></td>
                                        <td><?php echo $hsm['url']; ?></td>
                                        <td><?php echo $hsm['icon']; ?></td>
                                        <?php if ($hsm['is_active'] == 1) : ?>
                                            <td>
                                                <p>Aktif</p>
                                            </td>
                                        <?php elseif ($hsm['is_active'] == 0) : ?>
                                            <td>
                                                <p>Tidak Aktif</p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($hsm['status_sub'] == 1) : ?>
                                            <td>
                                                <p>Tidak Ada Submenu Level 3</p>
                                            </td>
                                        <?php elseif ($hsm['status_sub'] == 0) : ?>
                                            <td>
                                                <p>Ada Submenu Level 3</p>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-rounded btn-outline-success waves-effect waves-light"><span data-bs-toggle="modal" data-bs-target="#newEditHasSubmenuModal<?php echo $hsm['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus btn btn-sm btn-rounded btn-outline-danger waves-effect waves-light" href="<?php echo base_url('master/menulevel2/deletemenulevel2/') . encrypt_url($hsm['id']); ?>"><span>Delete</span></a>
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

<!-- START TAMBAH SUBMENU MODAL -->
<div class="modal fade newHasSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newHasSubMenuModalLabel">Tambah Submenu Level 2 Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo base_url(); ?>master/menulevel2" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <p>Jika diberi submenu level 3 ,mohon isikan kolom url dengan tanda #</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu level 2 title" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="menu_id">Select Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?php echo $m['id']; ?>"><?php echo $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_sub">Status Submenu</label>
                        <select name="status_sub" id="status_sub" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select Status Submenu</option>
                            <option value="0">Beri Submenu Level 3</option>
                            <option value="1">Tidak Ada Submenu Level 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu level 2 url" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu level 2 icon" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
<!-- END TAMBAH SUBMENU MODAL -->

<!-- START EDIT SUBMENU MODAL -->
<?php
foreach ($hassubmenu as $hsm) :  ?>
    <div class="modal fade" id="newEditHasSubmenuModal<?php echo $hsm['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newEditHasSubmenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditHasSubmenuModalLabel">Edit Submenu Level 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/menulevel2/editmenulevel2" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <p>Jika diberi submenu level 3 ,mohon isikan kolom url dengan tanda #</p>
                        </div>
                        <div class="form-group">
                            <label for="menu_id">Title</label>
                            <input name="id" type="hidden" value="<?php echo $hsm['id']; ?>">
                            <input name="menu_id" type="hidden" value="<?php echo $hsm['menu_id']; ?>">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu level 2 title" autocomplete="off" value="<?php echo $hsm['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="menu_id">Select Menu</label>
                            <select name="menu_id" id="menu_id" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?php echo $m['id']; ?>"><?php echo $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_sub">Status Submenu</label>
                            <select name="status_sub" id="status_sub" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Status Submenu</option>
                                <option value="0">Beri Submenu Level 3</option>
                                <option value="1">Tidak Ada Submenu Level 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu level 2 url" autocomplete="off" value="<?php echo $hsm['url']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu level 2 icon" autocomplete="off" value="<?php echo $hsm['icon']; ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
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
<!-- END EDIT SUBMENU MODAL -->

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "ordering": false,
            scrollX: true
        });
    });
</script>