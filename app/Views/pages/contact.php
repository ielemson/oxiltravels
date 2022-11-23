<?= $this->extend('layouts/homeLayout'); ?>
<?= $this->section('content'); ?>

<?=$this->include('includes/header')?>
      <!-- Swiper-->
      <?=$this->include('includes/banner')?>
      <!-- Contact information-->
      <section class="section section-sm section-first bg-default">
        <div class="container">
          <div class="row row-30 justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="tel:<?=$setting['phone']?>"><?=$setting['phone']?></a></p>
                </div>
              </article>
           
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-up104"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="#"><?=$setting['address']?></a></p>
                </div>
              </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="mailto:<?=$setting['email']?>"><?=$setting['email']?></a></p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Form and Gmap-->
      <section class="section section-sm section-last bg-default text-md-left">
        
        <div class="container">
          <div class="mx-auto">
          <?= $this->include('includes/alerts'); ?>
          </div>
          <div class="row row-50">
            <div class="col-lg-6 section-map-small">
              <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-styles="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FFBB00&quot;},{&quot;saturation&quot;:43.400000000000006},{&quot;lightness&quot;:37.599999999999994},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FFC200&quot;},{&quot;saturation&quot;:-61.8},{&quot;lightness&quot;:45.599999999999994},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FF0300&quot;},{&quot;saturation&quot;:-100},{&quot;lightness&quot;:51.19999999999999},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FF0300&quot;},{&quot;saturation&quot;:-100},{&quot;lightness&quot;:52},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#0078FF&quot;},{&quot;saturation&quot;:-13.200000000000003},{&quot;lightness&quot;:2.4000000000000057},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#00FF6A&quot;},{&quot;saturation&quot;:-1.0989010989011234},{&quot;lightness&quot;:11.200000000000017},{&quot;gamma&quot;:1}]}]">
                <div class="">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.340008302901!2d3.344558214849923!3d6.604602624047326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b922dd5e3e3fd%3A0x5b4165e2dda05f45!2s139%20Obafemi%20Awolowo%20Way%2C%20Alausa%20101233%2C%20Ikeja!5e0!3m2!1sen!2sng!4v1657789552958!5m2!1sen!2sng" width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
                </div>
                <ul class="google-map-markers">
                  <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker.png"></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <h4 class="text-spacing-50">Get in Touch</h4>
              <form  action="<?= base_url('contact/sendemail') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="row row-14 gutters-14">
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-first-name" type="text" name="fname" required>
                      <label class="form-label" for="contact-first-name">First Name</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-last-name" type="text" name="lname" required>
                      <label class="form-label" for="contact-last-name">Last Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email" type="email" name="email" required>
                      <label class="form-label" for="contact-email">E-mail</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-message">Message</label>
                      <textarea class="form-input" id="contact-message" name="message" required></textarea>
                    </div>
                  </div>
                </div>
                <button class="button button-primary button-pipaluk" type="submit">Send Message</button>
              </form>
            </div>
          </div>
        </div>
      </section>

<?= $this->endSection(); ?>
 <!-- Page Header-->
 