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
                            <h3>Create Tickets
                                   <a href="<?= base_url('user/tickets') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i>View Ticket</a>
                            </h3>
                     </div>
                     <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Create new ticket</div>
                                <div class="card-body">
                                    <form class="needs-validation" method="POST" action="<?=base_url('user/ticket/store')?>" novalidate accept-charset="utf-8">
                                        <?=csrf_field()?>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">Subject</label>
                                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">required</div>
                                            </div>
                                           
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">Priority</label>
                                                <select  class="form-control" name="priority"  required>
                                                    <option value="">Select priority</option>
                                                    <option value="high">High</option>
                                                    <option value="moderate">Moderate</option>
                                                    <option value="low">Low</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">required</div>
                                            </div>
                                           
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Ticket</label>
                                            <textarea class="form-control" id="summernote" name="content" placeholder="enter your complaint here" required></textarea>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">required</div>
                                        </div>
                                     
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Send </button>
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