<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/dashboard/includes/sidebar'); ?>
<div id="body" class="active">
       <!-- navbar navigation component -->
       <?= $this->include('pages/dashboard/includes/navbar') ?>
       <!-- end of navbar navigation -->
       <div class="content">
              <div class="container">
              <div class="col-md-12 mx-auto">
<?= $this->include('includes/alerts'); ?>
</div>
                     <div class="page-title">
                            <h3>Creat New Location
                                   <a href="<?=base_url('admin/post/index')?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-newspaper"></i> All Posts</a>
                            </h3>
                     </div>
                     <div class="box box-primary">
                            <div class="box-body">
                                  Create Location
                            </div>
                     </div>

                     <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Create new location</div>
                                <div class="card-body">
                                    <form id="paymentForm" action="<?=base_url('admin/location/store')?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                         <?= csrf_field() ?>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-6">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="location title" required>
                                                 <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter your location title.</div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" class="form-select" required>
                                                    <option value="" selected>Choose...</option>
                                                    <option value="1">Publish</option>
                                                    <option value="2">Unpublish</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select location status.</div>
                                            </div>
                                        </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="post" class="form-label">Location content</label>
                                                <textarea id="summernote" class="form-control" name="content" required placeholder="location content"></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Location content is required.</div>
                                            </div>

                                           <div class="row g-2">
                                           <div class="mb-3 col-md-6">
                                                <label for="file" class="form-label">Location image</label>
                                                <input type="file" class="form-control" name="img" required>
                                                 <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select location image.</div>
                                            </div>
                                         
                                           </div>
                                            <div class="mb-3 col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Create Post</button>
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

<?=$this->section('extra_js');?>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
  $('#summernote').summernote({
    // tabsize: 2,
        height: 100
  });
});
</script>
<?=$this->endSection();?>