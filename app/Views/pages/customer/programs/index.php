<div class="row">
    <div class="page-title">
        <h3>Ongoing Program</h3>
    </div>
    <?php if (count($programs) > 0) : ?>
        <?php foreach ($programs as $program) : ?>
            <div class="col-md-4">
    <div class="card card-01">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            
        <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="<?= base_url('frontend/images/programs') ?>/<?= $program['img'] ?>" alt="img" style="width:100%; height:250px">
                </div>
               
            </div>
           
        </div>
        <div class="card-body">
            <span class="badge-box"><i class="fa fa-star"></i></span>
            <h4 class="card-title"><b><?= $program['title'] ?></b></h4>
            <p class="card-text">Cost <b>&#x20A6;<?= $program['price'] == 0 ? 'Free':$program['price'] ?></b></p>
            <p class="card-text">Duration : <b><?= date("M-Y", strtotime($program['start_date']));?> to : <?= date("M-Y", strtotime($program['end_date']));?></b></p>
            <a href="<?= base_url('user/program/apply') ?>/<?= $program['id'] ?>/<?= $program['slug'] ?>" class="btn btn-default text-uppercase">Apply</a>
            
        </div>
    </div>
</div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="alert alert-primary">
            <h5 class="alert-title"><i class="fas fa-info"></i> Heads Up!</h5>
            No ongoing Programs. Check back later.
        </div>
    <?php endif; ?>
</div>



</div>

<?= $this->section('extra_style'); ?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');
    .btn-default {
        background: #006EFF;
        width: 100%;
        color: #fff;
        font-weight: 700;
        text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2);
        font-size: 14px;
    }

    .card {
        box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.3);
        border: none;
        margin-bottom: 30px;
    }

    /* .card:hover{
transform: scale(1.05);
transition: all 1s ease;
z-index: 999;
} */
    .card-01 .card-body {
        position: relative;
        padding-top: 40px;
    }

    .card-01 .badge-box {
        position: absolute;
        top: -20px;
        left: 50%;
        width: 100px;
        height: 100px;
        margin-left: -50px;
        text-align: center;
    }

    .card-01 .badge-box i {
        background: #006EFF;
        color: #fff;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        font-size: 20px;
    }

    .card-01 .height-fix {
        height: 455px;
        overflow: hidden;
    }

    .card-01 .height-fix .card-img-top {
        width: auto !important;
    }

    .profile-box {
        background-size: cover;
        float: left;
        width: 100%;
        text-align: center;
        padding: 30px 0;
        position: relative;
        overflow: hidden;
    }



    .profile-box img {
        width: 170px;
        height: 170px;
        position: relative;
        border: 5px solid #fff;
    }

    .social-box i {
        border: 1px solid #006EFF;
        color: #006EFF;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        line-height: 30px;
    }

    .social-box i:hover {
        background: #DFC717;
        color: #fff;
    }

    .social-box a {
        margin: 0 5px;
    }

    .video-foreground {
        float: left;
        width: 100%;
        height: 500px;
    }

    .card-01.height-fix .card-img-overlay {
        top: unset;
        color: #fff;
        background: -moz-linear-gradient(top, rgba(26, 96, 111, 0) 0%, rgba(26, 96, 111, 0) 1%, rgba(24, 87, 104, 0.91) 31%, rgba(21, 65, 89, 0.91) 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(top, rgba(26, 96, 111, 0) 0%, rgba(26, 96, 111, 0) 1%, rgba(24, 87, 104, 0.91) 31%, rgba(21, 65, 89, 0.91) 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, rgba(26, 96, 111, 0) 0%, rgba(26, 96, 111, 0) 1%, rgba(24, 87, 104, 0.91) 31%, rgba(21, 65, 89, 0.91) 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#001a606f', endColorstr='#e8154159', GradientType=0);
    }

    .card-01.height-fix .fa {
        color: #fff;
        font-size: 22px;
        margin-right: 18px;
    }

    ;
</style>

<?= $this->endSection(); ?>