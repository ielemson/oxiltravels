<div class="row">
<div class="page-title">
                        <h3>Posts</h3>
                    </div>
    <?php if(count($posts) > 0):?>
       <?php foreach($posts as $post):?>
        <div class="col-md-4">
                            <div class="card mb-3">
                                <a href="<?= base_url('post/'.$post['slug']);?>" target="_blank">
                                <img class="card-img-top" src="/frontend/images/post/<?=$post['file']?>" alt="post" style="width:100%; height:35vh">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><strong><?=$post['title']?></strong></h5>
                                    <p class="card-text">
                                    <?=substr($post['content'],0,100)?>
                                    </p> 
                                    <p class="card-text"><small class="text-muted"><?=date("M-Y", strtotime($post['created_at']));?></small></p>
                                      <a href="<?= base_url('post/'.$post['slug']);?>" class="btn btn-primary" target="_blank">Read More</a>
                                   </div>
                            </div>
                        </div>
        <?php endforeach ?>
        <?php endif ?>
</div>