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
            <h4 class="card-title mb-4">Profile User</h4>

            <div class="row">
              <div class="col-6">
                <div>
                  <h5 class="font-size-14"></h5>
                  <a class="image-popup-no-margins" href="<?= base_url('assets/img/profiles/default.png'); ?>">
                    <img class="img-fluid" alt="img-3" src="<?= base_url('assets/img/profiles/default.png'); ?>" width="170">
                  </a>
                  <div class="card mt-3">
                    <div class="card-body">
                      <h4 class="card-title">Data User</h4>

                      <div class="table-responsive">
                        <table class="table mb-0">

                          <thead>
                            <tr>
                              <th>Nama</th>
                              <th><?php echo $user['name'] ?></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Email</th>
                              <td><?php echo $user['email']; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                    </div>
                  </div>
                </div>
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

<!-- Call Modal -->
<!-- </?= $this->load->view('dapur/modal/modal_catatan'); ?> -->


<script>
  $(document).ready(function() {
    $('.datatable').DataTable({
      "ordering": false,
      scrollX: true
    });
  });
</script>