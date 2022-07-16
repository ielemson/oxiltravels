<!DOCTYPE html>

<html class="wide wow-animation" lang="en">
  <head>
    <title>Oxil Travel - <?=$title ?? ''?></title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="<?=base_url('frontend/images/favicon.png')?>" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="<?=base_url('frontend/css/fonts.css')?>">
    <link rel="stylesheet" href="<?=base_url('frontend/css/style.css')?>">
        <!-- ========================= SECTION CSS  ========================= -->
        <?= $this->renderSection('extra-css'); ?>
    <!-- ========================= SECTION CSS END ===================== -->
    <!-- <style>
    .ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}
    </style> -->
  </head>
  <body>
    <!-- <div class="ie-panel">
      <a href="">
      <img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div> -->
    
      <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    <div class="page">
     <!-- ========================= SECTION MAIN  ========================= -->
     <?= $this->renderSection('content'); ?>
    <!-- ========================= SECTION MAIN END// ===================== -->
      <!-- Page Footer-->
    <?=$this->include('includes/footer');?>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="<?=base_url('frontend/js/core.min.js')?>"></script>
    <script src="<?=base_url('frontend/js/script.js')?>"></script>
    <script src="<?=base_url('frontend/js/lib/jquery.validate.js')?>"></script>
    <script src="<?=base_url('frontend/js/moment.js')?>"></script>
    <!-- ========================= SECTION JS  ========================= -->
    <?= $this->renderSection('extra-js'); ?>
    <!-- ========================= SECTION JS END ===================== -->
  </body>
</html>