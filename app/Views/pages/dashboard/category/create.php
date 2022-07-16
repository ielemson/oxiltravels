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
                            <h3>Users
                                   <a href="<?=base_url('admin/dashboard')?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                            </h3>
                     </div>
                     <div class="box box-primary">
                            <div class="box-body">
                                  Create Post Category
                            </div>
                     </div>

                     <div class="col-lg-6">
                     <div class="col-md-12 mx-auto">
<?= $this->include('includes/alerts'); ?>
</div>
         
                            <div class="card">
                                <div class="card-header">Create new post category</div>
                                <div class="card-body">
                                    <form id="paymentForm" action="<?=base_url('admin/post/category/save')?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                         <?= csrf_field() ?>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="title" class="form-label">Category</label>
                                                <input type="text" class="form-control" name="name" placeholder="post category" required>
                                                 <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter your post category.</div>
                                            </div>
                                           
                                            
                                            <div class="mb-3 col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Post</button>
                                           </div>
                                        </div>
                                
                                    </form>
                            </div>
                        </div>
                        </div>
              </div>
       </div>
</div>
<?= $this->endSection(); ?>

