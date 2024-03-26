<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo/logo_inaku.png'); ?>">

    <!-- DataTables -->
    <link href="<?= base_url('assets/assets_one/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/assets_one/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/assets_one/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url('assets/assets_one/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Lightbox css -->
    <link href="<?= base_url('assets/assets_one/libs/magnific-popup/magnific-popup.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/assets_one/css/bootstrap.min.css'); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/assets_one/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/assets_one/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

    <script src="<?= base_url('assets/assets_one/libs/jquery/jquery.min.js'); ?>"></script>

    <!-- Sweet Alert-->
    <link href="<?= base_url('assets/assets_one/libs/sweetalert2/sweetalert2.min.css'); ?>" rel="stylesheet" type="text/css" />

    <script src="<?= base_url('assets/assets_one/libs/jquery-loading-overlay-2.1.7/dist/loadingoverlay.min.js'); ?>"></script>

    <script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .datepicker {
            z-index: 9999 !important
        }

        .dataTables_filter input {
            border-radius: 8px;
            width: 250px !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

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
</head>

<body data-sidebar="dark">