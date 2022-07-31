<div class="row">
    <?php if(count($posts) > 0):?>
       <?php foreach($posts as $post):?>
        <div class="col-md-3">
                            <div class="card mb-3">
                                <img class="card-img-top" src="/frontend/images/post/<?=$post['file']?>" alt="post" style="width:100%; height:35vh">
                                <div class="card-body">
                                    <h5 class="card-title">A card with image on top</h5>
                                    <p class="card-text">A fluid card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
        <?php endforeach ?>
        <?php endif ?>
</div>