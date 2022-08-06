<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/customer/includes/sidebar'); ?>
<div id="body" class="active">
    <!-- navbar navigation component -->
    <?= $this->include('pages/customer/includes/navbar') ?>
    <!-- end of navbar navigation -->
    <div class="content">
        <div class="container">
            <div class="col-md-12 mx-auto">
                <?= $this->include('includes/alerts'); ?>
            </div>
            <div class="page-title">
                <h3>Posts
                    <a href="<?= base_url('user/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i>Dashboard</a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    All Posts
                </div>
            </div>
            <div class="row">
                <?php if (count($posts) > 0) : ?>
                    <?php foreach ($posts as $post) : ?>
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img class="card-img-top thumbnail" src="<?= base_url('frontend/images/post') ?>/<?= $post['file'] ?>" alt="post">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $post['title'] ?></h5>
                                    <p class="card-text"><?= substr($post['content'],0,150)?></p>
                                    <p class="card-text"><small class="text-muted"> <?=date("M-Y", strtotime($post['created_at']))?></small></p>
                                </div>
                                <div class="card-footer text-end ">
                                    
                                <a href="<?= base_url('post/'.$post['slug']);?>" class="btn btn-primary" target="_blank">Read More</a>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">Notification Alerts</div>
                            <div class="card-body">
                                <p class="card-title"></p>
                                <div class="alert alert-danger" role="alert">No post to display</div>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>

