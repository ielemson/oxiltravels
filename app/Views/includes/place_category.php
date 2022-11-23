

<?php if(count($locations) > 0):?>
<section class="section section-lg section-top-1 bg-gray-4">
        <div class="container offset-negative-1">
          <div class="box-categories cta-box-wrap">
            <div class="box-categories-content">
              <div class="row justify-content-center">

              <?php foreach($locations as $location):?>
                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="<?= base_url('tour/'.$location['slug']);?>"><img src="<?=base_url('frontend/images/location')?>/<?=$location['img']?>" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title"><?=$location['title']?></h5>
                    </li>
                  </ul>
                </div>
                
              <?php endforeach; ?>

              </div>
            </div>
          </div><a class="link-classic wow fadeInUp" href="<?=base_url('tours')?>">Other Tours<span></span></a>
          <!-- Owl Carousel-->
        </div>
      </section>
      
<?php endif;?>