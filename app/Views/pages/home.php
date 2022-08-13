<?= $this->extend('layouts/homeLayout'); ?>
<?= $this->section('content'); ?>

<?=$this->include('includes/header')?>
      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-direction="vertical">
        <div class="swiper-wrapper text-left">
          <div class="swiper-slide context-dark" data-slide-bg="<?=base_url('frontend/images/slider-4-slide-1-1920x678.jpg')?>">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">`
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Enjoy the Best Destinations with Our Travel Agency</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Explore</span><span class="font-weight-bold"> The World</span></h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft" data-caption-delay="0">Get in touch</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="<?=base_url('frontend/images/slider-4-slide-2-1920x678.jpg')?>">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">A team of professional Travel Experts</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Trust</span><span class="font-weight-bold"> Our Experience</span></h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft" data-caption-delay="0">Get in touch</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="<?=base_url('frontend/images/slider-4-slide-3-1920x678.jpg')?>">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Build your Next Holiday Trip with Us</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Create</span><span class="font-weight-bold"> Your Tour</span></h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft" data-caption-delay="0">Get in touch</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination"></div>
      </section>
      <!-- Section Box Categories-->
      <section class="section section-lg section-top-1 bg-gray-4">
        <div class="container offset-negative-1">
          <div class="box-categories cta-box-wrap">
            <div class="box-categories-content">
              <div class="row justify-content-center">
                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="<?=base_url('/')?>"><img src="<?=base_url('frontend/images/cta-1-368x420.jpg')?>" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Balloon Flights</h5>
                    </li>
                  </ul>
                </div>
                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="<?=base_url('/')?>"><img src="<?=base_url('frontend/images/cta-2-368x420.jpg')?>" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Mountain Holiday</h5>
                    </li>
                  </ul>
                </div>
                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="<?=base_url('/')?>"><img src="<?=base_url('frontend/images/cta-3-368x420.jpg')?>" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Beach Holidays</h5>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div><a class="link-classic wow fadeInUp" href="<?=base_url('/')?>">Other Tours<span></span></a>
          <!-- Owl Carousel-->
        </div>
      </section>
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
 
