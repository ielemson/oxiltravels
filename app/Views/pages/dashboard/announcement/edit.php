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
                            <h3>Announcement
                                   <a href="<?=base_url('admin/dashboard')?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                            </h3>
                     </div>
                     <div class="box box-primary">
                            <div class="box-body">
                                  Edit announcement
                            </div>
                     </div>

                     <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Edit new announcement</div>
                                <div class="card-body">
                                    <form id="paymentForm" action="<?=base_url('admin/announcement/update/'.$announcement['id'])?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                         <?= csrf_field() ?>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-6">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="announcement title" value="<?=$announcement['title']?>" required>
                                                 <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter your post title.</div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" class="form-select" required>
                                                    <option value="" selected>Choose...</option>
                                                    <option value="1" <?= $announcement['status']  == 1 ? 'selected':'' ?>>Active</option>
                                                    <option value="2" <?= $announcement['status']  == 2 ? 'selected':'' ?>>Inactive</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select post status.</div>
                                            </div>
                                        </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="post" class="form-label">Announcement</label>
                                                <textarea id="summernote" class="form-control" name="announcement" required placeholder="post content"><?=$announcement['announcement']?></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Post content is required.</div>
                                            </div>

                                           <div class="row g-2">
                                           <div class="mb-3 col-md-6">
                                                <label for="file" class="form-label">Announcement image</label>
                                                <input type="file" class="form-control" name="img">
                                                 <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select post image.</div>
                                            </div>
                                         
                                           </div>
                                            <!-- <div class="mb-3 col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Update Announcement</button>
                                           </div> -->

                                           <div class="row g-2">
                                          <div class="mb-3 col-md-6">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Update  Announcement</button>
                                           </div>
                                            <div class="mb-3 col-md-6">
                                            <img src="<?=base_url('frontend/images/announcements')?>/<?=$announcement['img']?>" width="80" height="80"/>
                                           </div>
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