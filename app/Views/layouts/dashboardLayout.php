<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Oxil Travels</title>
    <link rel="icon" href="<?=base_url('frontend/images/favicon.png')?>" type="image/x-icon">
    <link href="<?=base_url("dashboard/assets/fontawesome/css/fontawesome.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("dashboard/assets/fontawesome/css/solid.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("dashboard/assets/fontawesome/css/brands.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("dashboard/assets/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("dashboard/assets/css/master.css")?>" rel="stylesheet">
    <link href="<?=base_url("dashboard/assets/css/lightbox.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("dashboard/assets/flagiconcss/css/flag-icon.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("dashboard/assets/datatables/datatables.min.css")?>" rel="stylesheet">
   
    <?= $this->renderSection('extra_style'); ?>
</head>

<body>
    <div class="wrapper">
        <!-- ========================= SECTION MAIN  ========================= -->
         <?= $this->renderSection('content'); ?>
        <!-- ========================= SECTION MAIN END// ========================= -->
    </div>
    </div>
    <script src="<?=base_url("dashboard/assets/jquery/jquery.min.js")?>"></script>
    <script src="<?=base_url("dashboard/assets/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
    <script src="<?=base_url("dashboard/assets/chartsjs/Chart.min.js")?>"></script>
    <script src="<?=base_url("dashboard/assets/js/dashboard-charts.js")?>"></script>
    <script src="<?=base_url("dashboard/assets/js/script.js")?>"></script>
    <script src="<?=base_url("dashboard/assets/js/form-validator.js")?>"></script>
    <script src="<?=base_url("dashboard/assets/datatables/datatables.min.js")?>"></script>
    <script src="<?=base_url("dashboard/assets/js/initiate-datatables.js")?>"></script>
    <script src="<?=base_url("dashboard/assets/js/lightbox.min.js")?>"></script>
</body>

</html>
