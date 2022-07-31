<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>

<div class="auth-content">
<div class="col-md-12 mx-auto">
<?= $this->include('includes/alerts'); ?>
</div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="<?=base_url('frontend/images/logo-main.png')?>" alt="admin logo">
                    </div>
                    <h6 class="mb-4 text-muted">Login to your dashboard</h6>
                    <form class="needs-validation" action="<?= base_url('auth/admin/login'); ?>" method="POST" novalidate accept-charset="utf-8">
                    <?= csrf_field() ?>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email adress</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your email</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your password</div>
                        </div>
                        <!-- <div class="mb-3 text-start">
                            <div class="form-check">
                              <input class="form-check-input" name="remember" type="checkbox" value="" id="check1">
                              <label class="form-check-label" for="check1">
                                Remember me on this device
                              </label>
                            </div>
                        </div> -->
                        <button class="btn btn-primary shadow-2 mb-4">Login</button>
                        <a href="<?=base_url('/')?>" class="btn btn-info text-white shadow-2 mb-4">Home</a>
                    </form>
                    <!-- <p class="mb-2 text-muted">Forgot password? <a href="forgot-password.html">Reset</a></p> -->
                    <!-- <p class="mb-0 text-muted">Don't have account yet? <a href="<?=base_url('register')?>">Signup</a></p> -->
                </div>
            </div>
        </div>
<?= $this->endSection(); ?>

<?= $this->section('extra_style');?>
<link href="<?=base_url("dashboard/assets/css/auth.css")?>" rel="stylesheet">
<?= $this->endSection();?>