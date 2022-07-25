<?php if ($announcement) : ?>
    <div id="announcementModal" class="modal" data-easein="bounceIn" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                       
                    </div>
                <div class="modal-body">
                <?php if($announcement['img']):?>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?=base_url('frontend/images/announcements/'.$announcement['img'])?>" />
                        </div>
                        <div class="col-md-8">
                            <div class="">
                                <h5 class="card-title"><?=$announcement['title']?></h5>
                                <p class="card-text">
                               <?=$announcement['announcement']?> 
                               </p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <h5 class="card-title"><?=$announcement['title']?></h5>
                    <p class="card-text">
                               <?=$announcement['announcement']?> 
                               </p>
                <?php endif; ?>
                  
                </div>
                <div class="modal-footer">
                        <button class="btn btn-warning btn-sm" data-dismiss="modal" aria-hidden="true">
                            Close
                        </button>
                        
                    </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?= $this->section('extra-js') ?>
<script>
    $(document).ready(function() {
        $("#announcementModal").modal('show');
    });
</script>
<?= $this->endSection() ?>



<?= $this->section('extra-css') ?>
<style>
    /* .modal-dialog {
        transform: translate(0, -50%);
        top: 50%;
        margin: 0 auto;
    } */
</style>
<?= $this->endSection() ?>