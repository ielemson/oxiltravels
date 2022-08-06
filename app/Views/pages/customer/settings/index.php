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
                <h3>Your Profile
                    <a href="<?= base_url('user/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                </h3>
            </div>

            <div class="col-md-12 mx-auto">
                <?= $this->include('includes/alerts'); ?>
            </div>

            <div class="col-md-12 col-lg-12" style="padding-bottom: 20px;">
                <div class="card">
                    <div class="card-header">Edit Your Profile</div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="<?=base_url('user/profile/update')?>" novalidate accept-charset="utf-8">
                           <?=csrf_field()?>
                        <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?=$user['name']?>" required>
                                    <!-- <small class="form-text text-muted">required.</small> -->
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?=$user['email']?>" required>
                                    <!-- <small class="form-text text-muted">Enter a valid email address.</small> -->
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Gender</label>
                                    <select class="form-select" name="gender" value="<?=$biodata['gender'] ?? ''?>" placeholder="1234 Main St, Unit, Building, or Floor" required>
                                        <option value="">Select</option>
                                        <?php if($biodata['gender'] == 'male'): ?>
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                        <?php elseif($biodata['gender'] == 'female'): ?>
                                        <option value="male" >Male</option>
                                        <option value="female" selected>Female</option>
                                        <?php else: ?>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <?php endif ?>
                                       
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="city" class="form-label">D.O.B</label>
                                    <input type="date" class="form-control" name="dob" value="<?=$biodata['dob']?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">rquired.</div>

                                </div>

                            </div>

                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="city" class="form-label">Highest Education Qualification</label>
                                    <input type="text" class="form-control" name="education" placeholder="Education qualification" value="<?=$biodata['education']?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">Year Graduated</label>
                                    <input type="text" class="form-control" name="education_yr" placeholder="Year graduated" value="<?=$biodata['education_yr']?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>

                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="city" class="form-label">Next of Kin</label>
                                    <input type="text" class="form-control" name="nexofkin" value="<?=$biodata['nexofkin']?>" placeholder="Next of Kin" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">Next of Kin Address</label>
                                    <textarea class="form-control" rows="1" name="nexofkin_address" placeholder="Next of Kin Address" required> <?=$biodata['nexofkin_address']?> </textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="city" class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" placeholder="Phone Number" required value="<?=$biodata['phone']?>">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="city" class="form-label">Addres</label>
                                    <textarea  rows="1" class="form-control" name="address" placeholder="Your Residential Adddress" required><?=$biodata['address']?></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                               
                            </div>
                            <div class="row g-2">
                                
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" placeholder="Your State of Origin" value="<?=$biodata['state']?>" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please select a State.</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="Your Country" value="<?=$biodata['country']?>" required>
                                    <input type="hidden" class="form-control" name="bioId" value="<?=$biodata['id']?> " required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">required.</div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">Password Reset</div>
                    <div class="card-body">
                        <!-- <h5 class="card-title">Reset Your Password</h5> -->
                        <form class="needs-validation" method="POST" action="<?=base_url('user/password/update')?>" novalidate accept-charset="utf-8">
                           <?= csrf_field() ?>
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
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->endSection(); ?>