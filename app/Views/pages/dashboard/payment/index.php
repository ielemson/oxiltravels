<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/dashboard/includes/sidebar'); ?>
<div id="body" class="active">
       <!-- navbar navigation component -->
       <?= $this->include('pages/dashboard/includes/navbar') ?>
       <!-- end of navbar navigation -->
       <div class="content">
              <div class="container">
                     <div class="page-title">
                            <h3>User Payments
                                   <a href="<?=base_url('admin/dashboard')?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Gender</th>
                                                <th>Education</th>
                                                <th>Education Yr</th>
                                                <th>DOB</th>
                                                <th>Kin</th>
                                                <th>Kin Address</th>
                                                <th>Payment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;  if(count($payments)> 0):?>
                                            <?php foreach($payments as $payment):?> 
                                                <tr>
                                                <td><?=$i?></td>
                                                <td><?=$payment['name']?></td>
                                                <td><?=$payment['email']?></td>
                                                <td><?=$payment['phone']?></td>
                                                <td><?=$payment['gender']?></td>
                                                <td><?=$payment['education']?></td>
                                                <td><?=$payment['education_yr']?></td>
                                                <td><?=$payment['dob']?></td>
                                                <td><?=$payment['kin']?></td>
                                                <td><?=$payment['kin_address']?></td>
                                                <td>
                                                <a href="<?=base_url('frontend/images/payment')?>/<?=$payment['payment']?>" data-lightbox="<?=$payment['name'];?>">
                                                <img src="<?=base_url('frontend/images/payment')?>/<?=$payment['payment']?>" alt="<?=$payment['name'];?>" width="50" height="50" />
                                            </a>
                                                
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