<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<div class="auth-content">
<div class="col-md-12 mx-auto">
<div class="row">
<?= $this->include('includes/alerts'); ?>
</div>
</div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="dashboard/assets/img/bootstraper-logo.png" alt="logo">
                    </div>
                    <h6 class="mb-4 text-muted">Create new account</h6>
                    <form class="needs-validation" action="<?= base_url('register'); ?>" method="POST" novalidate accept-charset="utf-8">
                    <?= csrf_field() ?>
                    <div class="mb-3 text-start">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                             <div class="valid-feedback">Looks good!</div>
                             <div class="invalid-feedback">Please enter your full name.</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email adress</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                            <small class="form-text text-muted">Enter a valid email address.</small>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your email address.</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter password</div>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password_confirm" required>
                            <div class="valid-feedback">Looks good!</div>
                             <div class="invalid-feedback">Please confirm your password.</div>
                        </div>
                        <!-- 
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Confirm password" required>
                        </div> 
                        -->
                        <div class="mb-3 text-start">
                            <div class="form-check">
                              <input class="form-check-input" name="confirm" type="checkbox" value="" id="check1">
                              <label class="form-check-label" for="check1">
                                I agree to the <a href="#" tabindex="-1">terms and policy</a>.
                              </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Register</button>
                    </form>
                    <p class="mb-0 text-muted">Allready have an account? <a href="<?=base_url('login')?>">Log in</a></p>
                </div>
            </div>    
</div>
<?= $this->endSection(); ?>

<?= $this->section('extra_style');?>
<link href="<?=base_url("dashboard/assets/css/auth.css")?>" rel="stylesheet">
<?= $this->endSection();?>