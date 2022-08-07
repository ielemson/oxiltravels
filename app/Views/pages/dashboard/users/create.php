<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/dashboard/includes/sidebar'); ?>
<div id="body" class="active">
    <!-- navbar navigation component -->
    <?= $this->include('pages/dashboard/includes/navbar') ?>
    <!-- end of navbar navigation -->
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3>Create User
                    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                </h3>
            </div>

            <div class="col-md-12 mx-auto">
                <?= $this->include('includes/alerts'); ?>
            </div>

            <div class="col-md-12 col-lg-12" style="padding-bottom: 20px;">
                <div class="card">
                    <div class="card-header">All fields are required</div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="<?=base_url('admin/user/store')?>" novalidate accept-charset="utf-8">
                           <?=csrf_field()?>
                        <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name"  required>
                                    <!-- <small class="form-text text-muted">required.</small> -->
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    <!-- <small class="form-text text-muted">Enter a valid email address.</small> -->
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="address" class="form-label">Role</label>
                                    <select class="form-select" name="role" required>
                                        <option value="">Select</option>
                                        <option value="admin">Admin</option>
                                        <option value="customer">Customer</option>    
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>

                                <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="New Password" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                            </div>
                            </div>

                           <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create User</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <?= $this->endSection(); ?>