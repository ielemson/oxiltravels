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
                            <h3>Createe  Partner
                                   <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                            </h3>
                     </div>
                     <div class="box box-primary">
                            <div class="box-body">
                                   Create Partner
                            </div>
                     </div>
                     <div class="row">
                     <div class="col-lg-6">
                            <div class="col-md-12 mx-auto">
                                   <?= $this->include('includes/alerts'); ?>
                            </div>

                            <div class="card">
                                   <div class="card-header">Create new  Partner</div>
                                   <div class="card-body">
                                          <form id="paymentForm" method="POST" action="<?= base_url('admin/partner/save') ?>" class="needs-validation" novalidate  accept-charset="utf-8" enctype="multipart/form-data">
                                                 <?= csrf_field() ?>
                                                 <div class="row g-2">
                                                        <div class="mb-3 col-md-12">
                                                               <label for="title" class="form-label">Partner</label>
                                                               <input type="file" class="form-control" name="img" required>
                                                               <div class="valid-feedback">Looks good!</div>
                                                               <div class="invalid-feedback">Please enter your partner image.</div>
                                                        </div>


                                                        <div class="mb-3 col-md-12">
                                                               <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Create Partner</button>
                                                        </div>
                                                 </div>

                                          </form>
                                   </div>
                            </div>

                          
                     </div>
                     <div class="col-lg-6">
                            <div class="col-md-12 mx-auto">
                                   <?= $this->include('includes/alerts'); ?>
                            </div>

                            <div class="card">
                                   <div class="card-header">Partner List</div>
                                   <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Partner Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                      
                                            <?php if(count($images)>0):?>
                                                 <tbody>
                                               
                                                   
                                                    <?php foreach($images as $image):?>
                                                         <tr>
                                                        <td>
                                                            <img src="<?=base_url('frontend/images/partner')?>/<?=$image['img']?>" width="50" height="50">
                                                        </td>
                                                    <td>
                                                        <a href="<?=base_url('admin/partner/destroy')?>/<?=$image['id']?>" class="btn btn-danger btn-sm delete">delete</a>
                                                    </td> 
                                                 </tr>
                                                        <?php endforeach; ?>
                                                        <?php else: ?>
                                                          <tr>
                                                      
                                                    <td>
                                                    <i class="alert-info p-2"> No Partner found</i> 

                                                    </td> 
                                                 </tr>
                                                 <?php endif; ?>
                                               
                                          
                                            </tbody>
                                                 
                                        </table>
                                    </div>
                                   </div>
                            </div>

                          
                     </div>
                     </div>
                     
              </div>
       </div>
</div>
<?= $this->endSection(); ?>

