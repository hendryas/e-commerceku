<!--  -->

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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Silahkan buat menu management anda</h4>
                                <p class="text-muted m-b-30 font-14">
                                    Liat tutorial <a href="#">disini</a>.
                                </p>

                                <?php echo $this->session->flashdata('message'); ?>

                                <h4>Role : <?php echo $role['role']; ?></h4>

                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Menu</th>
                                                <th>Access</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($menu as $m) : ?>
                                                <tr>
                                                    <th scope="row"><?php echo $no; ?></th>
                                                    <td><?php echo $m['menu']; ?></td>
                                                    <td>
                                                        <div class="form-check mb-4">
                                                            <input class="form-check-input" type="checkbox" <?php echo check_access($role['id'], $m['id']); ?> data-role="<?php echo encrypt_url($role['id']); ?>" data-menu="<?php echo $m['id']; ?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
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

<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?php echo base_url('admin/role/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?php echo base_url('admin/role/roleaccess/'); ?>" +
                    roleId; //ini seperti redirect,namun di ajax
            }
        });
    });
</script>