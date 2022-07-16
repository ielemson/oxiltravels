<?= $this->extend('layouts/homeLayout'); ?>
<?= $this->section('content'); ?>

<?=$this->include('includes/header')?>
      <!-- Breadcrumbs -->
  <?=$this->include('includes/banner')?>
      <!-- Why choose us-->
      
       <!-- Blog Post-->
       <section class="section section-xl bg-default text-left">
        <div class="container">
          <div class="row row-70">
            <div class="col-lg-8">
              <div class="blog-post">
                <!-- Post Classic-->
                <article class="post post-classic">
                  <h4 class="post-classic-title"><?=$post['title']?>
                  </h4>
                  <div class="post-classic-panel group-middle justify-content-start"><a class="badge badge-secondary" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                        <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                      </svg>
                      <div>News</div></a>
                    <!-- <div class="post-classic-comments"><span class="icon fa fa-comments-o"></span><a href="#">14</a></div> -->
                    <div class="post-classic-time"><span class="icon fa fa-clock-o"></span>
                      <time datetime="2020-11-30"> <?= date("d-M-Y", strtotime($post['created_at']));?></time>
                    </div>
                    <div class="post-classic-author">by<a href="#">Admin</a></div>
                  </div>
                  <!-- <p class="post-classic-text"></p> -->
                  <div class="post-classic-figure"><img src="<?=base_url('frontend/images/post')?>/<?=$post['file']?>" alt="" width="770" height="430"/>
                  </div>
                </article>
                <!-- Quote Classic-->
                <article class="quote-classic quote-classic-big">
                  <div class="quote-classic-text">
                    <p class="q"><?=$post['title']?>.</p>
                  </div>
                </article>
                <p><?=$post['content']?>.</p>
                <div class="blog-post-bottom-panel group-md group-justify">
                  <div class="blog-post-tags"><a href="#">News</a><a href="#">Traveling</a><a href="#">Tips</a></div>
                  <div>
                    <div class="group-md group-middle"><span class="social-title">Share</span>
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
              <!-- <div class="blog-post-comments">
                <h5 class="text-spacing-100 font-weight-normal">3 Comments</h5>
                <div class="box-comment">
                  <div class="unit unit-spacing-md flex-column flex-md-row align-items-lg-center">
                    <div class="unit-left"><a class="box-comment-figure" href="#"><img src="images/user-1-119x119.jpg" alt="" width="119" height="119"/></a></div>
                    <div class="unit-body">
                      <div class="group-sm group-justify">
                        <div>
                          <div class="group-sm group-middle">
                            <p class="box-comment-author"><a href="#">John Doe</a></p>
                            <div class="box-comment-reply"><a href="#">Reply</a></div>
                          </div>
                        </div>
                        <div class="box-comment-time">
                          <time datetime="2020-11-30">Nov 30, 2020</time>
                        </div>
                      </div>
                      <p class="box-comment-text">Accumsan lacus vel facilisis volutpat est. Vulputate mi sit amet mauris commodo quis imperdiet. Lobortis elementum nibh tellus molestie nunc non blandit massa enim. Mauris pharetra et ultrices neque ornare aenean.</p>
                    </div>
                  </div>
                  <div class="box-comment">
                    <div class="unit unit-spacing-md flex-column flex-md-row align-items-lg-center">
                      <div class="unit-left"><a class="box-comment-figure" href="#"><img src="images/user-2-119x119.jpg" alt="" width="119" height="119"/></a></div>
                      <div class="unit-body">
                        <div class="group-sm group-justify">
                          <div>
                            <div class="group-sm group-middle">
                              <p class="box-comment-author"><a href="#">Jessica Brown</a></p>
                              <div class="box-comment-reply"><a href="#">Reply</a></div>
                            </div>
                          </div>
                          <div class="box-comment-time">
                            <time datetime="2020-11-30">Nov 30, 2020</time>
                          </div>
                        </div>
                        <p class="box-comment-text">Ut tristique et egestas quis ipsum suspendisse. Id leo in vitae turpis massa sed elementum tempus. Nisl nisi scelerisque eu ultrices vitae auctor eu augue.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-comment">
                  <div class="unit unit-spacing-md flex-column flex-md-row align-items-lg-center">
                    <div class="unit-left"><a class="box-comment-figure" href="#"><img src="images/user-3-119x119.jpg" alt="" width="119" height="119"/></a></div>
                    <div class="unit-body">
                      <div class="group-sm group-justify">
                        <div>
                          <div class="group-sm group-middle">
                            <p class="box-comment-author"><a href="#">Nick Stevens</a></p>
                            <div class="box-comment-reply"><a href="#">Reply</a></div>
                          </div>
                        </div>
                        <div class="box-comment-time">
                          <time datetime="2020-11-30">Nov 30, 2020</time>
                        </div>
                      </div>
                      <p class="box-comment-text">Risus nullam eget felis eget nunc lobortis mattis. Vel pretium lectus quam id leo in. Amet est placerat in egestas. Donec ultrices tincidunt arcu non sodales. Amet volutpat consequat mauris nunc congue nisi vitae .</p>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="blog-post-comments">
                <h5 class="text-spacing-100 font-weight-normal">Add Your Comment</h5>
                <form class="rd-form rd-mailform">
                  <div class="row row-14 gutters-14">
                    <div class="col-sm-6">
                      <div class="form-wrap">
                        <input class="form-input" id="contact-your-name-5" type="text" name="name" data-constraints="@Required"/>
                        <label class="form-label" for="contact-your-name-5">Your Name</label>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-wrap">
                        <input class="form-input" id="contact-email-5" type="email" name="email" data-constraints="@Email @Required"/>
                        <label class="form-label" for="contact-email-5">Your E-mail</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-wrap">
                        <label class="form-label" for="contact-message-5">Message</label>
                        <textarea class="form-input textarea-lg" id="contact-message-5" name="message" data-constraints="@Required"></textarea>
                      </div>
                    </div>
                  </div>
                  <button disabled class="button button-primary button-pipaluk" type="submit">Submit</button>
                </form>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- Post Sidebar-->
              <div class="post-sidebar post-sidebar-inset">
                <div class="row row-lg row-60">
                  <div class="col-sm-6 col-lg-12">
                    <div class="post-sidebar-item">
                      <!-- RD Search Form-->
                      <form class="rd-search form-search form-post-search" action="search-results.html" method="GET">
                        <div class="form-wrap">
                          <label class="form-label" for="search-form">Search the blog...</label>
                          <input class="form-input" id="search-form" type="text" name="s" autocomplete="off">
                          <button class="button-search fl-bigmug-line-search74" type="submit"></button>
                        </div>
                      </form>
                    </div>
                  <?php if(count($categories) > 0):?>
                    <div class="post-sidebar-item">
                      <h5>Categories</h5>
                      <div class="post-sidebar-item-inset">
                        <ul class="list list-categories">
                          <li><a class="active" href="#">All Categories</a></li>
                          <?php foreach($categories as $category):?>
                            <li><a href="<?= base_url('posts/category/'.strtolower($category['name']));?>"><?=$category['name'];?></a></li>
                          <?php endforeach;?>
                        </ul>
                      </div>
                    </div>
                  <?php endif;?>
                    <?php if(count($posts)> 0):?>
                       
                        <div class="post-sidebar-item">
                      <h5>Popular posts</h5>
                      <div class="post-sidebar-item-inset">
                        <!-- Post Minimal--> 
                        <?php foreach($posts as $latest):?>
                        <article class="post post-minimal"><a class="post-minimal-figure" href="<?= base_url('post/'.$latest['slug']);?>"><img src="<?=base_url('frontend/images/post')?>/<?=$latest['file']?>" alt="" width="50" height="50"/></a>
                          <p class="post-minimal-title"><a href="<?= base_url('post/'.$latest['slug']);?>">Top 10 Hotels: Rating by Our Travel Experts</a></p>
                        </article>
                        <?php endforeach; ?>
                      </div>
                    </div>
                            
                    <?php endif; ?>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     
<?= $this->endSection(); ?>
 <!-- Page Header-->
