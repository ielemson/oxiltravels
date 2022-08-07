<?php if(count($posts) > 0):?>
  <section class="section section-sm section-last bg-default">
        <div class="container">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Latest Blog Posts</span></h3>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-posts owl-posts-2" data-items="1" data-md-items="2" data-autoplay="5000" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut">
          <?php foreach($posts as $post):?> 
          <!-- Post Aria-->
            <article class="post post-aria post-aria-2"><a class="post-aria-figure" href="<?= base_url('post/'.$post['slug']);?>"><img src="<?=base_url('frontend/images/post')?>/<?=$post['file']?>" alt="<?=$post['title']?>" width="568" height="492"/></a>
              <div class="post-aria-footer">
                <h4 class="post-aria-title"><a href="<?= base_url('post/'.$post['slug']);?>"><?=$post['title']?></a></h4>
                <div class="post-aria-time">
                  <time class="date_val" onload="format(<?=$post['created_at']?>)"> <?= date("M-Y", strtotime($post['created_at']));?>  </time>
                </div>
                <ul class="list-inline group-sm post-aria-list-social">
                  <li><a class="icon fa fa-facebook" href="#"></a></li>
                  <li><a class="icon fa fa-twitter" href="#"></a></li>
                  <li><a class="icon fa fa-google-plus" href="#"></a></li>
                  <li><a class="icon fa fa-instagram" href="#"></a></li>
                </ul>
              </div>
            </article>
          <?php endforeach;?>
         
          </div>
        </div>
</section>
<?php endif;?>

 
<?= $this->section('extra-js');?>
 <script type="text/javascript">  
  $().ready(function() {  
 let timeval =  $('.date.val').text()
console.log(timeval)
  });  
</script>  
 <?= $this->endSection()?>