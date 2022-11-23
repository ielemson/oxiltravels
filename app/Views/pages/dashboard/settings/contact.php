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
                <h3>App settings
                    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                <a class="btn btn-sm btn-outline-primary" href="<?=base_url('/')?>" target="_blank" rel="noopener noreferrer"> View Page</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="paymentForm" action="<?= base_url('admin/programs/store') ?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="title" class="form-label">Contact Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter contact email" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter contact number" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="title" class="form-label">Resumption Time</label>
                                    <input type="time" class="form-control" name="open" placeholder="Start Date" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Closing Time</label>
                                    <input type="time" class="form-control" name="close" placeholder="Start Date" required>
                                    
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="post" class="form-label">Contact Address</label>
                                <textarea id="" class="form-control" name="address" required placeholder="enter contact address"></textarea>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">required.</div>
                            </div>
                            <div class="custom-control custom-switch">
 
                          
                            <div class="mb-3 col-md-12">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i>Update Settings</button>
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