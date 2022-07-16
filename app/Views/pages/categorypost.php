<?= $this->extend('layouts/homeLayout'); ?>
<?= $this->section('content'); ?>

<?=$this->include('includes/header')?>
      <!-- Breadcrumbs -->
  <?=$this->include('includes/banner')?>
      <!-- Why choose us-->
      
     <?php if(count($posts) > 0):?>
           <!-- Grid blog-->
      <section class="section section-xl bg-default text-md-left">
        <div class="container">
          <div class="row row-60">
          <?php foreach ($posts as $key => $post):?>
            <div class="col-sm-6 col-lg-4 wow fadeInLeft">
              <!-- Post Modern-->
              <article class="post post-modern"><a class="post-modern-figure" href="<?= base_url('post/'.$post['slug']);?>"><img src="<?=base_url('frontend/images/post')?>/<?=$post['file']?>" alt="" width="370" height="307"/>
                  <div class="post-modern-time">
                    <time datetime="2020-07-04"><span class="post-modern-time-number"><?=  date("d", strtotime($post['created_at']));?></span><span class="post-modern-time-month"><?=  date("M", strtotime($post['created_at']));?></span></time>
                  </div></a>
                <h5 class="post-modern-title"><a href="<?= base_url('post/'.$post['slug']);?>"><?=$post['title']?></a></h5>
                <p class="post-modern-text"><?=character_limiter($post['content'], 100)?></p>
              </article>
            </div>
            <?php endforeach; ?>
          
          </div>
         
    
        </div>
      </section>
     <?php endif; ?>
     
<?= $this->endSection(); ?>
 <!-- Page Header-->
 