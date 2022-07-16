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
                    <a href="<?= base_url('admin/post/create') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Create Post</a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    All Posts
                </div>
            </div>
            <div class="row">
                <?php if(count($posts) > 0):?> 
                    <?php foreach($posts as $post):?>
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img class="card-img-top thumbnail" src="<?=base_url('frontend/images/post')?>/<?=$post['file']?>" alt="post">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$post['title']?></h5>
                                    <!-- <p class="card-text"><?=$post['content']?></p> -->
                                    <p class="card-text"><small class="text-muted"><?=$post['created_at']?></small></p>
                                </div>
                                <div class="card-footer text-end btn-group">
                                            <a href="<?=base_url('admin/post/edit/'.$post['id'])?>" class="btn btn-info btn-sm text-black"><i class="fa fa-edit"></i></a>
                                            <button  data-id="<?=$post['id'];?>" class="delete btn btn-danger btn-sm text-black"><i class="fa fa-trash"></i></button>
                                        </div>
                            </div>
                            
                        </div>
                        <?php endforeach;?>
                        <?php else: ?>
                            <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Notification Alerts</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <div class="alert alert-danger" role="alert">No post to display</div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>

<?=$this->section('extra_js');?>
<script>
$( ".delete" ).click(function() {
 var attr = $(this).attr("data-id");
    $.confirm({
    title: 'Confirm!',
    content: 'Delete Post?',
    buttons: {
        confirm: function () {
            // let num = $(this).attr("data-id")
            var id = {'id': attr}
            $.ajax({
                url: "<?=base_url('admin/post/destroy')?>",
                type: "POST",
                data: id,
                dataType: "json",
                success: function(res) {
                 if(res.success == true){
                    $.alert('Post removed');
                    setTimeout(function(){
                    window.location.href="<?=base_url('admin/post/index')?>"
                    }, 2000);
                 }else{
                    $.alert('Error!');
                 }
                }
            });
        },
        cancel: function () {
            $.alert('Canceled!');
        },
       
    }
});
});
</script>
<?=$this->endSection();?>