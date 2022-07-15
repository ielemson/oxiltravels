<?php if (session()->has('success')) : ?>

<div class="border-success border-left border-width-4 px-2 py-2 mx-2 mb-3 alert_btn bg-white text-black shadow-sm animated flipInX delay-02s" role="alert">
      <i class="fas fa-exclamation opacity-05 mr-3"></i>
      <?=session('success')?>
</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
<div class="border-danger border-left border-width-4 px-2 py-2 mx-2 mb-3 alert_btn bg-white text-black shadow-sm animated flipInX delay-02s" role="alert">
      <i class="fas fa-exclamation opacity-05 mr-3"></i>
      <?=session('error')?>
</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>

<?php foreach (session('errors') as $error) : ?>

<div class="border-danger border-left border-width-4 px-2 py-2 mx-2 mb-3 alert_btn bg-white text-black shadow-sm animated flipInX delay-02s" role="alert">
<i class="fas fa-exclamation opacity-05 mr-3"></i>
<?=$error?>
</div>
<?php endforeach ?>

<?php endif ?>