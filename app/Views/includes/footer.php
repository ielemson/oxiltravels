<footer class="section footer-corporate context-dark">
        <div class="footer-corporate-inset">
          <div class="container">
            <div class="row row-40 justify-content-lg-between">
              <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Contact us</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body"><a class="link-phone" href="tel:<?=$setting['phone']?>"><?=$setting['phone']?></a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                          <div class="unit-body"><a class="link-aemail" href="mailto:<?=$setting['email']?>"><?=$setting['email']?></a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                          <div class="unit-body"><a class="link-location" href="#"><?=$setting['address']?></a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-5 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInDown" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Popular Blogs</h6>
                    <!-- Post Minimal 2-->
                    <?php if(count($footerposts) > 0):?>
                    <?php foreach($footerposts as $post):?>
                      
                    <article class="post post-minimal-2">
                      <p class="post-minimal-2-title"><a href="<?= base_url('post/'.$post['slug']);?>"><?=$post['title']?></a></p>
                      <div class="post-minimal-2-time">
                        <time datetime="2020-05-04"><?= date("M-Y", strtotime($post['created_at']));?></time>
                      </div>
                    </article>
                  <?php endforeach; ?>
                  <?php endif;?>
                  </div>
                </div>
              </div>
              <div class="col-sm-11 col-md-7 col-lg-5 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInLeft" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Quick links</h6>
                    <ul class="row-6 list-0 list-marked list-marked-md list-marked-secondary list-custom-2">
                      <li><a href="<?=base_url('about')?>">About us</a></li>
                      <li><a href="<?=base_url('/')?>">Our Tours</a></li>
                      <li><a href="<?=base_url('/')?>">Our Team</a></li>
                      <li><a href="<?=base_url('/')?>">Gallery</a></li>
                      <li><a href="<?=base_url('/')?>">Blog</a></li>
                    </ul>
                    <!-- <div class="group-md group-middle justify-content-sm-start"><a class="button button-lg button-primary button-ujarak" href="#">Get in touch</a></div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-corporate-bottom-panel">
          <div class="container">
            <div class="row justfy-content-xl-space-berween row-10 align-items-md-center2">
              <div class="col-sm-6 col-md-4 text-sm-right text-md-center">
                <div>
                  <ul class="list-inline list-inline-sm footer-social-list-2">
                  <li><a class="icon fa fa-facebook" href="<?=$setting['facebook']?>" target="_blank" rel="noopener noreferrer"></a></li>
                            <li><a class="icon fa fa-twitter" href="<?=$setting['twitter']?>" target="_blank" rel="noopener noreferrer"></a></li>
                            <li><a class="icon fa fa-instagram" href="<?=$setting['instagram']?>" target="_blank" rel="noopener noreferrer"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 order-sm-first">
                <!-- Rights-->
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> <span>Oxyl Global</span>. All rights reserved<span>.</span>
                </p>
              </div>
              <div class="col-sm-6 col-md-4 text-md-right">
                <p class="rights"><a href="<?=base_url('/')?>">Privacy Policy</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>

