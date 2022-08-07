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
                <h3>Programs
                    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                  <a class="btn btn-sm btn-outline-primary" href="<?=base_url('admin/programs/create')?>"> Create Program</a>
                </div>
            </div>
            <div class="row">
               <?php if(count($programs) > 0):?>
                <?php foreach($programs as $program):?>
                    <div class="col-md-4">
                    <div class="card card-01">
                        <img class="card-img-top" src="<?=base_url('frontend/images/programs')?>/<?=$program['img']?>" alt="program" style="width:100%; height:250px;">
                        <div class="card-body">
                            <span class="badge-box"><i class="fa fa-check"></i></span>
                            <h4 class="card-title"><?=$program['title']?></h4>
                            <p class="card-text"><?=substr($program['details'],0,150)?></p>
                            <div class="btn-group mx-auto">
                                <a href="#" class="btn btn-default text-uppercase">view</a>
                                <a href="<?=base_url('admin/program/edit')?>/<?=$program['id']?>" class="btn btn-warning text-uppercase">edit</a>
                                <a href="<?=base_url('admin/program/destroy')?>/<?=$program['id']?>" class="btn btn-danger text-uppercase">delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
               <?php else: ?>
                <div class="alert alert-primary">
                                        <h5 class="alert-title"><i class="fas fa-info"></i> Heads Up</h5>
                                       No program has been added, kindly added a new program.
                                    </div>
               <?php endif;?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>

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