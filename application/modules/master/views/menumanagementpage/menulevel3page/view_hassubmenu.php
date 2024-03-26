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

                        <a href="#" class="btn btn-sm btn-success waves-effect waves-light mb-3 mt-3" data-bs-toggle="modal" data-bs-target=".newSubMenuModal">
                            <i class="ri-add-line align-middle me-2"></i> Tambah
                        </a>

                        <?php echo $this->session->flashdata('message'); ?>

                        <table class="datatable table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Submenu Level 2</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $sm['title']; ?></td>
                                        <td><?php echo $sm['title2']; ?></td>
                                        <td><?php echo $sm['url']; ?></td>
                                        <td><?php echo $sm['icon']; ?></td>
                                        <?php if ($sm['is_active'] == 1) : ?>
                                            <td>
                                                <p>Aktif</p>
                                            </td>
                                        <?php elseif ($sm['is_active'] == 0) : ?>
                                            <td>
                                                <p>Tidak Aktif</p>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-rounded btn-outline-success waves-effect waves-light"><span data-bs-toggle="modal" data-bs-target="#newEditSubmenuModal<?php echo $sm['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus btn btn-sm btn-rounded btn-outline-danger waves-effect waves-light" href="<?php echo base_url('master/menulevel3/deletemenulevel3/') . encrypt_url($sm['id']); ?>"><span>Delete</span></a>
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
<div class="modal fade newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Sub Menu Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/menulevel3" method="POST">
                <div class="modal-body">
                    <div class="form-group mt-2">
                        <label for="url">Sub Menu Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label for="url">Menu Level 2</label>
                        <select name="has_sub_menu_id" id="has_sub_menu_id" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select SubMenu Level 2</option>
                            <?php foreach ($has_sub_menu as $hsm) : ?>
                                <option value="<?php echo $hsm['id']; ?>"><?php echo $hsm['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="url">Submenu URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label for="url">Sub Menu Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label for="url">Aktif</label>
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
foreach ($subMenu as $sm) :  ?>
    <div class="modal fade" id="newEditSubmenuModal<?php echo $sm['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newEditMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditSubmenuModalLabel">Edit Sub Menu Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/menulevel3/editmenulevel3" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="id" type="hidden" value="<?php echo $sm['id']; ?>">
                            <input name="menu_id" type="hidden" value="<?php echo $sm['has_sub_menu_id']; ?>">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" autocomplete="off" value="<?php echo $sm['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="url">Menu Level 2</label>
                            <select name="has_sub_menu_id" id="has_sub_menu_id" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select SubMenu Level 2</option>
                                <?php foreach ($has_sub_menu as $hsm) : ?>
                                    <option value="<?php echo $hsm['id']; ?>"><?php echo $hsm['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="url">Submenu URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" autocomplete="off" value="<?php echo $sm['url']; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label for="url">Submenu Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" autocomplete="off" value="<?php echo $sm['icon']; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <div class="form-check">
                                <label for="url">Aktif</label>
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