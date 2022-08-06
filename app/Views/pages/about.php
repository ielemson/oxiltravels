<?= $this->extend('layouts/homeLayout'); ?>
<?= $this->section('content'); ?>

<?=$this->include('includes/header')?>
      <!-- Breadcrumbs -->
  <?=$this->include('includes/banner')?>
      <!-- Why choose us-->
      <section class="section section-sm section-first bg-default text-md-left">
        <div class="container">
          <div class="row row-50 justify-content-center align-items-xl-center">
            <div class="col-md-10 col-lg-5 col-xl-6"><img src="<?=base_url("frontend/images/about_us_together.jpg")?>" alt="" width="519" height="564"/>
            </div>
            <div class="col-md-10 col-lg-7 col-xl-6">
              <h1 class="text-spacing-25 font-weight-normal title-opacity-9">Why choose us</h1>
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-4">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-4-1" data-toggle="tab">About Us</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-2" data-toggle="tab">Skills</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-3" data-toggle="tab">Mission</a></li>
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-4-1">
                    <p>Oxyl Global is a global brand that has been in existence since 2018
                      Oxyl Global provides up-to-date information and tips on the latest available tours and opportunities around the globe that all ages can take advantage of and further their personal and professional development.
                    </p>
                    <!-- Linear progress bar-->
                   
                  </div>
                  <div class="tab-pane fade" id="tabs-4-2">
                    <div class="row row-40 justify-content-center text-center inset-top-10">
                      <p>Why visit Oxyl Global?
                    We’re always excited to provide you with only the latest and most active programs & Opportunities you can apply for. We’re born to bear your travel burdens</p>
                    </div>
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Get in touch</a><a class="button button-black-outline button-width-xl-230" href="#">Read more</a></div>
                  </div>
                  <div class="tab-pane fade" id="tabs-4-3">
                    <p>We assist you in getting the best-personalized Tourism visas, Skilled work visas, and student visas to EU states, Netherland, the United States, Canada, and the United Kingdom.
Whichever opportunity you are looking for, whether it’s a Job, that can quickly help you get started in life and improve your current financial situation, or a school opportunity, that will make you much more marketable for an even better job, we’re here to help you get the right solution.

The good thing is, whether you get an admission or a job, you win!</p>
                    
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Get in touch</a><a class="button button-black-outline button-md" href="#">Download presentation</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Latest Projects-->
      <section class="section section-sm section-fluid bg-default">
        <div class="container">
          <h3>Destinations</h3>
        </div>
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-classic owl-timeline" data-items="1" data-md-items="2" data-lg-items="3" data-xl-items="4" data-margin="30" data-autoplay="false" data-nav="true" data-dots="true">
          <div class="owl-item">
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="<?=base_url('frontend/images/gallery-image-11-420x308.jpg')?>" alt="" width="420" height="308"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href=" <?=base_url('frontend/images/gallery-image-11-420x308.jpg')?>" data-lightgallery="item"><img src="images/gallery-image-11-420x308.jpg" alt="" width="420" height="308"/></a>
              </div>
            </article>
            <div class="thumbnail-mary-description">
              <h5 class="thumbnail-mary-project"><a href="single-tour.html">France</a></h5><span class="thumbnail-mary-decor"></span>
              <h5 class="thumbnail-mary-time">
              </h5>
            </div>
          </div>
         
          <div class="owl-item">
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="<?=base_url('frontend/images/gallery-image-13-420x308.jpg')?>" alt="" width="420" height="308"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="<?=base_url('frontend/images/gallery-image-13-420x308.jpg')?>" data-lightgallery="item"><img src="images/gallery-image-13-420x308.jpg" alt="" width="420" height="308"/></a>
              </div>
            </article>
            <div class="thumbnail-mary-description">
              <h5 class="thumbnail-mary-project"><a href="single-tour.html">Egypt</a></h5><span class="thumbnail-mary-decor"></span>
              <h5 class="thumbnail-mary-time">
              </h5>
            </div>
          </div>

        </div>
      </section>
    
     
<?= $this->endSection(); ?>
 <!-- Page Header-->
 