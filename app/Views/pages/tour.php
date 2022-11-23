<?= $this->extend('layouts/homeLayout'); ?>
<?= $this->section('content'); ?>

<?=$this->include('includes/header')?>
      <!-- Swiper-->
      <?=$this->include('includes/banner')?>
      <!-- Contact information-->
      <!-- Tours Content Section-->
      <section class="section section-sm section-first bg-default">
        <div class="container">
          <div class="row row-50 justify-content-center">
            <div class="col-md-6 col-lg-7">
              <div class="row row-30 row-lg-40" data-lightgallery="group">
                <div class="col-12">
                  <div class="oh-desktop">
                    <!-- Thumbnail Joan-->
                    <article class="thumbnail thumbnail-joan wow slideInRight"><a class="thumbnail-joan-figure" href="<?=base_url('frontend/images/location')?>/<?=$tour['img']?>" data-lightgallery="item"><img src="<?=base_url('frontend/images/location')?>/<?=$tour['img']?>" alt="" width="700" height="518"/></a>
                      <div class="thumbnail-joan-caption">
                        <h5 class="thumbnail-joan-title"><?=$tour['title']?></h5>
                      </div>
                    </article>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-md-6 col-lg-5">
              <div class="single-project single-project-4">
                <div class="single-tour-title">
                  <h4 class="title-decoration-lines-bottom"><?=$tour['title']?><br class="d-none d-lg-block"><span></span></h4>
                </div>
                <div class="single-tour-price">
                  <div class="product-big-price-wrap"><span class="product-big-price">$0</span></div>
                </div>
                <p class="text-gray-500"><?=$tour['content']?></p>
                <div class="divider divider-30"></div>
                <ul class="list list-description d-inline-block d-md-block">
                  <li><span>Country:</span><span><?=$tour['title']?></span></li>
                  <li><span>Cost:</span><span>890$</span></li>
                  <li><span>Type:</span><span>Seasonal</span></li>
                  <li><span>Category:</span><span>Exotic Tours</span></li>
                </ul>
                <div class="divider divider-30"></div>
                <div class="group-md group-middle justify-content-sm-start"><span class="social-title">Share</span>
                  <div>
                    <ul class="list-inline list-inline-sm social-list">
                      <li><a class="icon fa fa-facebook" href="#"></a></li>
                      <li><a class="icon fa fa-twitter" href="#"></a></li>
                      <li><a class="icon fa fa-google-plus" href="#"></a></li>
                      <li><a class="icon fa fa-instagram" href="#"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Tours Content Section-->
    

<?= $this->endSection(); ?>
 <!-- Page Header-->
 