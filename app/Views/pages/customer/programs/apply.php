<?php

use App\Models\Program;
?>
<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/customer/includes/sidebar'); ?>
<div id="body" class="active">
    <!-- navbar navigation component -->
    <?= $this->include('pages/customer/includes/navbar') ?>
    <!-- end of navbar navigation -->
    <div class="content">
        <div class="container">
            <div class="col-md-12 mx-auto">
                <?= $this->include('includes/alerts'); ?>
            </div>
            <div class="page-title">
                <h3>Programs
                    <a href="<?= base_url('user/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    Apply for this program
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="paymentForm" action="<?= base_url('user/program/apply') ?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="col-md-12">
                            <div class="card mb-3">
                                <img class="card-img-top" src="<?=base_url('frontend/images/programs')?>/<?=$program['img']?>" alt="program image" style="width:100%; height:65vh">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?=strtoupper($program['title'])?></b></h5>
                                    <p class="card-text"><?=$program['details']?></p>
                                    <p class="card-text"><b>Cost: &#x20A6; <?= $program['price'] == 0 ? 'Free' : $program['price'] ?></b></p>
                                    <p class="card-text"><b>From : <?=date("M-Y", strtotime($program['start_date']))?> To: <?=date("M-Y", strtotime($program['end_date']))?></b> </p>
                                    <p class="card-text"><b> Status : <?= $payment ? '<span class="text-success">Applied</span>' : '<span class="text-danger">Not Applied</span>' ?></b> </p>
                                    <?php if($program['price'] > 0):?>
                                        <p class="card-text">
                                    Kindly make payment in the account details below and upload proof
                                    <br/>
                                    <em><b>Bank Name: <?=$program['bank']?> </b></em>
                                    <br/>
                                    <em><b>Account : <?=$program['account']?> </b></em>  
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                       <?php if(!$payment):?>
                        
                        <?php if($program['price'] > 0):?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="file" class="form-label">Upload Payment</label>
                                    <input type="file" class="form-control" name="img" required>
                                    <input type="hidden" class="form-control" name="pid" value="<?=$program['id']?>">
                                    <input type="hidden" class="form-control" name="ptitle" value="<?=$program['title']?>">
                                    <input type="hidden" class="form-control" name="price" value="<?=$program['price']?>">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please upload payment.</div>
                                </div>

                            </div>
                            <?php else:?>
                                <div class="mb-3 col-md-6">
                                    <!-- <label for="file" class="form-label">Uplaod Payment</label> -->
                                    <input type="file" class="form-control imgId" name="img">
                                    <input type="hidden" class="form-control" name="pid" value="<?=$program['id']?>">
                                    <input type="hidden" class="form-control" name="ptitle" value="<?=$program['title']?>">
                                    <input type="hidden" class="form-control" name="price" value="<?=$program['price']?>">

                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please upload payment.</div>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3 col-md-12 btn-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Apply</button>
                                <a href="<?=base_url('user/dashboard')?>" type="submit" class="btn btn-warning btn-block"><i class="fas fa-step-backward"></i> Back</a>
                            </div>
                
                  
                        <?php endif;?>
                        
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('extra_js'); ?>
<script>
    $(document).ready(function() {
  
$(".imgId").hide();

    });
</script>
<?= $this->endSection(); ?>