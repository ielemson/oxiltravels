<?= $this->extend('layouts/homeLayout'); ?>
<?= $this->section('content'); ?>

<?=$this->include('includes/header')?>
      <!-- Swiper-->
      <?=$this->include('includes/banner')?>
      <!-- Contact information-->
      <!-- Tours Content Section-->
      <section class="section section-xl bg-default">
        <div class="container">
         <?php if(count($tours)> 0):?>
            <div class="row-sm row-40 row-md-50 justify-content-center">
            <?php foreach($tours as $tour):?>
            <div class="col-sm-12 col-md-12 wow fadeInRight">
              <!-- Product Big-->
              <article class="product-big">
                <div class="unit flex-column flex-md-row align-items-md-stretch">
                  <div class="unit-left"><a class="product-big-figure" href="<?= base_url('tour/'.$tour['slug']);?>"><img src="<?=base_url('frontend/images/location')?>/<?=$tour['img']?>" alt="" width="600" height="366"/></a></div>
                  <div class="unit-body">
                    <div class="product-big-body">
                      <h5 class="product-big-title"><a href="<?= base_url('tour/'.$tour['slug']);?>"><?=$tour['title']?></a></h5>
                      <div class="group-sm group-middle justify-content-start">
                        <div class="product-big-rating"><span class="icon material-icons-star"></span><span class="icon material-icons-star"></span><span class="icon material-icons-star"></span><span class="icon material-icons-star"></span><span class="icon material-icons-star_half"></span></div><a class="product-big-reviews" href="#"></a>
                      </div>
                      <p class="product-big-text"><?= substr($tour['content'],0,50)?></p><a class="button button-black-outline button-ujarak" href="<?= base_url('tour/'.$tour['slug']);?>">Buy This Tour</a>
                      <div class="product-big-price-wrap"><span class="product-big-price">$0</span></div>
                    </div>
                  </div>
                </div>
              </article>
            </div>

        
            <!-- <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item page-item-control disabled"><a class="page-link" href="#" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item page-item-control"><a class="page-link" href="#" aria-label="Next"><span class="icon" aria-hidden="true"></span></a></li>
              </ul>
            </nav> -->
          </div>
          <?php endforeach;?>
        <?php endif;?>
        </div>
      </section>
      <!-- Tours Content Section-->
    

<?= $this->endSection(); ?>
 <!-- Page Header-->
 