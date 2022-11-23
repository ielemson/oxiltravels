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
                <h3>Settings</h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="system-tab" data-bs-toggle="tab" href="#system" role="tab" aria-controls="system" aria-selected="false">System</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="slider-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Slider</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="attributions-tab" data-bs-toggle="tab" href="#attributions" role="tab" aria-controls="attributions" aria-selected="false">Sliders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="appearance-tab" data-bs-toggle="tab" href="#appearance" role="tab" aria-controls="appearance" aria-selected="false">Social Media</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <form id="paymentForm" action="<?= base_url('admin/settings/update/general') ?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="title" class="form-label">Contact Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter contact email" value="<?= $setting['email'] ?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">required</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Enter contact number" value="<?= $setting['phone'] ?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">required</div>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="title" class="form-label">Resumption Time</label>
                                        <input type="time" class="form-control" name="open" placeholder="Start Date" value="<?= $setting['resume'] ?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">required</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Closing Time</label>
                                        <input type="time" class="form-control" name="close" placeholder="Start Date" value="<?= $setting['close'] ?>" required>

                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">required</div>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="post" class="form-label">Contact Address</label>
                                    <textarea id="" class="form-control" name="address" required placeholder="enter contact address"><?= $setting['address'] ?></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                                <div class="custom-control custom-switch">
                                    <div class="mb-3 col-md-12">
                                        <!-- <input type="hidden" name="general" value="1"> -->
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i>Update Settings</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade" id="system" role="tabpanel" aria-labelledby="system-tab">
                            <form id="paymentForm" action="<?= base_url('admin/settings/update') ?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label for="site-title" class="form-label">Site Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="site-description" class="form-label">Site Description</label>
                                    <textarea class="form-control" name="description" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Site Logo</label>
                                    <input class="form-control" name="logo" type="file" id="formFile1" required>
                                    <small class="text-muted">The image must have a maximum size of 1MB</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Favicon</label>
                                    <input class="form-control" name="favicon" type="file" id="formFile2" required>
                                    <small class="text-muted">The image must have a maximum size of 1MB</small>
                                </div>

                                <div class="custom-control custom-switch">
                                    <div class="mb-3 col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i>Update Settings</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="slider-tab">
                            <form id="paymentForm" action="<?= base_url('admin/settings/slider') ?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="col-md-6">

                                    <p class="text-muted">
                                        Slider</p>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Title-1</label>
                                        <input type="text" name="title_1" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title-2</label>
                                        <input type="text" name="title_2" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Image</label>
                                        <input type="file" name="img" class="form-control" required>
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="attributions" role="tabpanel" aria-labelledby="attributions-tab">
                          <?php if(count($sliders) > 0):?>
                         

                           <div class="row">
                             <?php foreach($sliders as $slider):?>
                           <div class="col-md-4">
                            <div class="card mb-3">
                                <img class="card-img-top" src="<?=base_url('frontend/images/sliders')?>/<?=$slider['img']?>" alt="sliders" style="width:100%; height:250px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$slider['title_1']?></h5>
                                    <p class="card-text"><?=$slider['title_2']?></p>
                                    
                                      <div class="btn-group mx-auto">
                                <!-- <a href="#" class="btn btn-default text-uppercase">view</a> -->
                                <a href="<?=base_url('admin/settings/slider/edit')?>/<?=$slider['id']?>" class="btn btn-warning text-uppercase">edit</a>
                                <a href="<?=base_url('admin/settings/slider/destroy')?>/<?=$slider['id']?>" class="btn btn-danger text-uppercase">delete</a>
                            </div>
                                </div>
                              
                            </div>
                        </div> 
                                <?php endforeach; ?>
                           </div>
               
                        <?php endif;?>
                                  
                        </div>
                        <div class="tab-pane fade" id="appearance" role="tabpanel" aria-labelledby="appearance-tab">
                            <form id="paymentForm" action="<?= base_url('admin/settings/update/url') ?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="title" class="form-label">facebook</label>
                                        <input type="url" class="form-control" name="facebook" pattern="https?://.+" placeholder="facebook url" value="<?= $setting['facebook'] ?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">required</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Twitter</label>
                                        <input type="url" class="form-control" name="twitter" pattern="https?://.+" placeholder="twitter url" value="<?= $setting['twitter'] ?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">required</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Instagram</label>
                                        <input type="url" class="form-control" name="instagram" pattern="https?://.+" placeholder="instagram url" value="<?= $setting['instagram'] ?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">required</div>
                                    </div>
                                </div>
                                <div class="custom-control custom-switch">
                                    <div class="mb-3 col-md-12">
                                    <input type="hidden" name="url" value="1">
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
        $("#pricing").change(function() {

            let pricing = $("#pricing").val();

            if (pricing == 0) {
                // $("#price").slideUp();
                $("#bank").slideUp();
                $("#account").slideUp();
                $("#setbank").val('');
                $("#setaccount").val('');
                $(".price").attr("required", false);

            } else {
                $("#price").slideDown();
                $("#account").slideDown();
                $("#bank").slideDown();
                $(".price").attr("required", true);
            }
        });
    });
</script>
<?= $this->endSection(); ?>