<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/dashboard/includes/sidebar'); ?>
        <div id="body" class="active">
            <!-- navbar navigation component -->
           <?= $this->include('pages/dashboard/includes/navbar')?>
            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>
                    </div>
                    <?= $this->include('pages/dashboard/includes/cards'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="content">
                                            <div class="head">
                                                <h5 class="mb-0">Traffic Overview</h5>
                                                <p class="text-muted">Current year website visitor data</p>
                                            </div>
                                            <div class="canvas-wrapper">
                                                <canvas class="chart" id="trafficflow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="content">
                                            <div class="head">
                                                <h5 class="mb-0">Sales Overview</h5>
                                                <p class="text-muted">Current year sales data</p>
                                            </div>
                                            <div class="canvas-wrapper">
                                                <canvas class="chart" id="sales"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
               
                </div>
            </div>
        </div>
<?= $this->endSection(); ?>