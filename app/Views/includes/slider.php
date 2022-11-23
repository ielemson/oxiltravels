
<?php if(count($sliders) > 0):?>
    <section class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-direction="vertical">
        <div class="swiper-wrapper text-left">
        <?php foreach($sliders as $slider):?> 
          <div class="swiper-slide context-dark" data-slide-bg="<?=base_url('frontend/images/sliders')?>/<?=$slider['img']?>">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0"><?=$slider['title_1']?></h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span></span><span class="font-weight-bold"><?=$slider['title_2']?></span></h2><a class="button button-default-outline button-ujarak" target="_blank" href="<?=base_url('contact')?>" data-caption-animate="fadeInLeft" data-caption-delay="0">Get in touch</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?> 
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination"></div>
</section>

<?php endif;?>
