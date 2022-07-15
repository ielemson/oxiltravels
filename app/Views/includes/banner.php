<section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-60">
          <div class="container">
            <h2 class="breadcrumbs-custom-title"><?=$title_1 ?? ''?></h2>
            <ul class="breadcrumbs-custom-path">
              <li><a href="<?=base_url('/')?>">Home</a></li>
              <li class="<?=$banner_active ?? ''?>"><?=$title_2 ?? ''?></li>
            </ul>
          </div>
          <div class="box-position" style='background-image: url("<?=base_url("frontend/images/$banner_img")?>");'></div>
        </div>
      </section>