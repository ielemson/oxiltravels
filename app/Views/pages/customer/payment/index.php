<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/customer/includes/sidebar'); ?>
<div id="body" class="active">
       <!-- navbar navigation component -->
       <?= $this->include('pages/customer/includes/navbar') ?>
       <!-- end of navbar navigation -->
       <div class="content">
              <div class="container">
                     <div class="page-title">
                            <h3>Your Payment History
                                   <a href="<?=base_url('user/dashboard')?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                            </h3>
                     </div>
                     <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Payment List</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Program</th>
                                                <th>Cost</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;  if(count($payments)> 0):?>
                                            <?php foreach($payments as $payment):?> 
                                                <tr>
                                                <td><?=$i?></td>
                                                <td><?=$payment['payment_for']?></td>
                                                <td>&#x20A6; <?=$payment['cost']?></td>
                                                <td> <?php if($payment['status'] == 1):?>
                                                    <button class="btn btn-sm btn-success">approved</button>
                                                    <?php elseif($payment['status'] == 0):?>
                                                    <button class="btn btn-sm btn-primary">pending</button>
                                                    <?php elseif($payment['status'] == 2):?>
                                                        <button class="btn btn-sm btn-danger">declined:: <small>contact admin</small> </button>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                               <?php if($payment['payment_img']): ?>
                                                 <a href="<?=base_url('frontend/images/payment')?>/<?=$payment['payment_img']?>" data-lightbox="<?=$payment['payment_for'];?>">
                                                <img src="<?=base_url('frontend/images/payment')?>/<?=$payment['payment_img']?>" alt="<?=$payment['payment_for'];?>" width="50" height="50" />
                                                </a>
                                                <?php else:?>
                                                ---
                                                <?php endif;?>
                                                </td>
                                                
                                            </tr>
                                                <?php $i++; endforeach ?>
                                                <?php endif?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
              </div>
       </div>
</div>
<?= $this->endSection(); ?>