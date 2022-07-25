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
                <h3>Users
                    <a href="<?= base_url('admin/announcement/create') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-bullhorn"></i> Create Announcement</a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    All Posts
                </div>
            </div>
            <div class="row">
                <?php if (count($announcements) > 0) : ?>
                    <?php foreach ($announcements as $announcement) : ?>
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img class="card-img-top thumbnail" src="<?= base_url('frontend/images/announcements') ?>/<?= $announcement['img'] ?>" alt="announcement" width="200" height="200">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $announcement['title'] ?></h5>
                                    <p class="card-text"><small class="text-muted"> <?= date("d-M-Y", strtotime($announcement['created_at'])); ?></small></p>
                                </div>
                                <div class="card-footer text-end btn-group">
                                    <a href="<?= base_url('admin/announcement/edit/' . $announcement['id']) ?>" class="btn btn-info btn-sm text-black"><i class="fa fa-edit"></i></a>
                                    <button data-id="<?= $announcement['id']; ?>" class="delete btn btn-danger btn-sm text-black"><i class="fa fa-trash"></i></button>
                                    <button data-content="<?= $announcement['announcement']; ?>" data-file="<?= $announcement['img']; ?>" data-title="<?= $announcement['title'];  ?>" class="viewContent btn btn-primary btn-sm text-black"><i class="fa fa-eye"></i></button>
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
                                <div class="alert alert-danger" role="alert">No announcement to display</div>

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

<?= $this->section('extra_js'); ?>
<script>
    $(".delete").click(function() {
        var attr = $(this).attr("data-id");
        $.confirm({
            type: 'red',
            title: 'Confirm!',
            content: 'Delete item?',
            buttons: {
                confirm: function() {
                    // let num = $(this).attr("data-id")
                    var id = {
                        'id': attr
                    }
                    $.ajax({
                        url: "<?= base_url('admin/announcement/destroy') ?>",
                        type: "POST",
                        data: id,
                        dataType: "json",
                        success: function(res) {
                            if (res.success == true) {
                                $.alert('Item removed');
                                setTimeout(function() {
                                    window.location.reload()
                                }, 2000);
                            } else {
                                $.alert('Error!');
                            }
                        }
                    });
                },
                cancel: function() {
                    $.alert('Canceled!');
                },

            }
        });
    });

    // view content function
    $(".viewContent").click(function() {
        var content = $(this).attr("data-content");
        var title = $(this).attr("data-title");
        var img = $(this).attr("data-file");
        $.dialog({
            type: 'blue',
            title: `<h5>${title.toLocaleUpperCase()}</h5>`,
            content: `<p>${content}</p> <br/> <img src="/frontend/images/announcements/${img}"/>`,
        });
    });
</script>
<?= $this->endSection(); ?>