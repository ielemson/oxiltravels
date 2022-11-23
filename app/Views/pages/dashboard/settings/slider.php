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
                <h3>App settings -Edit Slider
                    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <a class="btn btn-sm btn-outline-primary" href="<?= base_url('/') ?>" target="_blank" rel="noopener noreferrer"> View Page</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="paymentForm" action="<?= base_url('admin/settings/slider/update') ?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-6">

                                    <p class="text-muted">
                                        Slider</p>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Title-1</label>
                                        <input type="text" name="title_1" class="form-control" value="<?= $slider['title_1'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title-2</label>
                                        <input type="text" name="title_2" class="form-control" value="<?= $slider['title_2'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Image</label>
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                    <div class="mb-3 text-end">
                                    <input type="hidden" name="id" value="<?=$slider['id']?>">
                                        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Update Slider</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img class="card-img-top" src="<?= base_url('frontend/images/sliders') ?>/<?= $slider['img'] ?>" alt="sliders" style="width:100%; height:250px;">
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