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
                <h3>Create Programs
                    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                <a class="btn btn-sm btn-outline-primary" href="<?=base_url('admin/programs')?>"> View Programs</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="paymentForm" action="<?= base_url('admin/programs/store') ?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Program title" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="" selected>Choose...</option>
                                        <option value="1">Ongoing</option>
                                        <option value="0">Concluded</option>
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="title" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">End Date</label>
                                    <input type="date" class="form-control" name="end_date" placeholder="Start Date" required>
                                    
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                                </div>
                            </div>

                           <div class="row">
                           <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Pricing</label>
                                    <select name="pricing" id="pricing" class="form-select" required>
                                        <option value="" selected>Choose...</option>
                                        <option value="1">Paid</option>
                                        <option value="0" selected>Free</option>
                                    </select>
                                    
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                            </div>
                            <div class="mb-3 col-md-6" id="price">
                                    <label for="price" class="form-label">Set Price</label>
                                    <input type="number" class="form-control price" name="price" value="0" required>

                                    
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                            </div>

                            <!-- bank input -->
                            <div class="mb-3 col-md-6" id="bank">
                                    <label for="title" class="form-label">Bank Name</label>
                                    <input type="text"  class="form-control" name="bank" placeholder="Bank name" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                            </div>
                            <div class="mb-3 col-md-6" id="account">
                                    <label for="title" class="form-label">Bank Account</label>
                                    <input type="text"  class="form-control" name="account" placeholder="Bank account" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                            </div>
                           </div>

                            <div class="mb-3 col-md-12">
                                <label for="post" class="form-label">Program Details</label>
                                <textarea id="summernote" class="form-control" name="details" required placeholder="post content"></textarea>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">required.</div>
                            </div>
                            <div class="custom-control custom-switch">
 
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="file" class="form-label">Program image</label>
                                    <input type="file" class="form-control" name="img">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please select post image.</div>
                                </div>

                            </div>
                            <div class="mb-3 col-md-12">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Create Program</button>
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

<?= $this->section('extra_js'); ?>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            // tabsize: 2,
            height: 100
        });

// $("#price").hide();
$("#bank").hide();
$("#account").hide();
$("#pricing").change(function(){

let pricing = $("#pricing").val();
  
if(pricing == 0){
                // $("#price").slideUp();
                $("#bank").slideUp();
                $("#account").slideUp();
                $("#setbank").val('');
                $("#setaccount").val('');
                $(".price").attr("required", false);
                
            } else{
                $("#price").slideDown();
                $("#account").slideDown();
                $("#bank").slideDown();
                $(".price").attr("required", true);
            }
});
    });
</script>
<?= $this->endSection(); ?>