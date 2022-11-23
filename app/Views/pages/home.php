<?= $this->extend('layouts/homeLayout'); ?>
<?= $this->section('content'); ?>

<?=$this->include('includes/header')?>
      <!-- Swiper-->
      <?=$this->include('includes/slider')?>
      <!-- Section Box Categories-->
       <?=$this->include('includes/place_category');?>

      <!-- Discover New Horizons-->
      <?=$this->include('includes/discover');?>

      <!--	Our Services-->
      <?=$this->include('includes/services');?>
  
      <!--Sign up form 25% Discoung-->
      <?=$this->include('includes/signup')?>
      <!-- Latest blog posts-->
      <?=$this->include('includes/blogs');?>
      <!--	Instagrram wondertour-->
      <!-- announcement page-->
      <?=$this->include('includes/announcement');?>
      <!--announcement page--->
      <!-- partner page-->
      <?=$this->include('includes/partner');?>
      <!--partner page--->
    
<?= $this->endSection(); ?>
 <!-- Page Header-->
 
