<div class="row">
    <div class="page-title">
        <h3>Ongoing Program</h3>
    </div>
    <?php if (count($programs) > 0) : ?>
        <?php foreach ($programs as $program) : ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img class="card-img-top" src="<?= base_url('frontend/images/programs') ?>/<?= $program['img'] ?>" alt="<?= $program['title'] ?>" style="width:100%; height:35vh">
                    <div class="card-body">
                        <h5 class="card-title"><?= $program['title'] ?></h5>
                        <p class="card-text">Cost &#x20A6; <?= $program['price'] == 0 ? 'Free' : $program['price'] ?></p>
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary">view</a>
                            &nbsp;
                            <a href="<?= base_url('user/program/apply') ?>/<?= $program['id'] ?>/<?= $program['slug'] ?>" class="btn btn-success">Apply</a>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
    <div class="alert alert-primary">
    <h5 class="alert-title"><i class="fas fa-info"></i> Heads Up!</h5>
    No ongoing Programs. Check back later.
    </div>
    <?php endif; ?>
</div>

</div>