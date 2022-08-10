<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/dashboard/includes/sidebar'); ?>
<div id="body" class="active">
    <!-- navbar navigation component -->
    <?= $this->include('pages/dashboard/includes/navbar') ?>
    <!-- end of navbar navigation -->
    <div class="content mt-5">

        <div class="container">
            <h3>User Payments
                <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
            </h3>
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">User Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="system-tab" data-bs-toggle="tab" href="#system" role="tab" aria-controls="system" aria-selected="false">Program</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Payment</a>
                            </li>


                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <h5 class="mb-0">User Name:</h5>
                                <p class="text-muted"><?= $user['name'] ?></p>
                                <p class="mb-0">Email</p>
                                <p class="text-muted"><?= $user['email'] ?></p>
                                <p class="mb-0">Address</p>
                                <p class="text-muted"><?= $biodata['address'] ?></p>
                                <p class="mb-0">State</p>
                                <p class="text-muted"><?= $biodata['state'] ?></p>
                                <p class="mb-0">Country</p>
                                <p class="text-muted"><?= $biodata['country'] ?></p>
                                <p class="mb-0">Next of Kin</p>
                                <p class="text-muted"><?= $biodata['nexofkin'] ?></p>
                                <p class="mb-0">Next of Kin Address</p>
                                <p class="text-muted"><?= $biodata['nexofkin_address'] ?></p>
                                <p class="mb-0">Education</p>
                                <p class="text-muted"><?= $biodata['education'] ?></p>
                                <p class="mb-0">Year Graduated</p>
                                <p class="text-muted"><?= $biodata['education_yr'] ?></p>
                            </div>
                            <div class="tab-pane fade" id="system" role="tabpanel" aria-labelledby="system-tab">
                                <div class="col-md-6">
                                    <h5>Program Title:</h5>
                                    <p class="text-muted"><?= $program['title'] ?></p>
                                    <h5>Program Cost:</h5>
                                    <p class="text-muted"><?= $program['price'] ?></p>
                                    <h5>Start Date:</h5>
                                    <p class="text-muted"><?= $program['start_date'] ?></p>
                                    <h5>End Date:</h5>
                                    <p class="text-muted"><?= $program['end_date'] ?></p>
                                    <h5>Details:</h5>
                                    <p class="text-muted"><?= $program['details'] ?></p>
                                    <h5>Image:</h5>
                                    <img src="<?= base_url('frontend/images/programs') ?>/<?= $program['img'] ?>" class="text-muted" />
                                </div>
                            </div>
                            <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                                <div class="col-md-6">
                                    <p class="text-muted">Payment</p>
                                    <?php if ($payment['status'] == 2) : ?>
                                        <button class="btn btn-danger btn-sm btn-block mb-5">Payment has been delcined Click the Reverse Button below to Approve</button>
                                        <?php elseif($payment['status'] == 1):?>
                                        <button class="btn btn-success btn-sm btn-block mb-5">Payment has been approved Click the Revoke Button below to Decline</button>
                                        <?php endif; ?>


                                    <img src="<?= base_url('frontend/images/payment') ?>/<?= $payment['payment_img'] ?>" style="width:100%; height:35vh" />
                                    <?php if ($payment['status'] == 0) : ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="<?= base_url('admin/payment/approve') ?>" method="POST" accept-charset="utf-8">
                                                    <?= csrf_field() ?>
                                                    <div class="mb-3 text-end">
                                                        <input type="hidden" name="id" value="<?= $payment['id'] ?>">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-success mt-3 btn-block" type="submit"><i class="fas fa-check"></i> Approve Payment</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="<?= base_url('admin/payment/approve') ?>" method="POST" accept-charset="utf-8">
                                                    <?= csrf_field() ?>
                                                    <div class="mb-3 text-end">
                                                        <input type="hidden" name="id" value="<?= $payment['id'] ?>">
                                                        <input type="hidden" name="status" value="2">
                                                        <button class="btn btn-warning mt-3 btn-block" type="submit"><i class="fas fa-times"></i> Decline Payment </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php elseif ($payment['status'] == 1) : ?>
                                        <form action="<?= base_url('admin/payment/approve') ?>" method="POST" accept-charset="utf-8">
                                            <?= csrf_field() ?>
                                            <div class="mb-3 text-end">
                                                <input type="hidden" name="id" value="<?= $payment['id'] ?>">
                                                <input type="hidden" name="status" value="2">
                                                <button class="btn btn-danger mt-3 btn-block" type="submit"><i class="fas fa-times"></i> Revoke Approval</button>
                                            </div>
                                        </form>
                                    <?php elseif($payment['status'] == 2): ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="<?= base_url('admin/payment/approve') ?>" method="POST" accept-charset="utf-8">
                                                    <?= csrf_field() ?>
                                                    <div class="mb-3 text-end">
                                                        <input type="hidden" name="id" value="<?= $payment['id'] ?>">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-success mt-3 btn-block" type="submit"><i class="fas fa-check"></i> Reverse Decline</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <div class="mb-3 text-end">
                                                        <input type="hidden" name="id" value="<?= $payment['id'] ?>">
                                                        <input type="hidden" name="status" value="2"/>
                                                        <input type="hidden" name="u_email" value="<?= $user['email'] ?>"/>
                                                        <input type="hidden" name="p_title" value="<?= $program['title'] ?>"/>
                                                        <button class="btn btn-danger mt-3 btn-block" type="submit"><i class="fas fa-times"></i> Payment Declined </button>
                                                    </div>
                                              
                                            </div>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>