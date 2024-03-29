<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer">
                <div class="rd-navbar-aside">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand"><a class="brand" href="<?= base_url('/') ?>"><img src="<?= base_url('frontend/images/oxil-global.png') ?>" alt="" width="188" height="19" /></a></div>
                    </div>
                    <div class="rd-navbar-aside-right rd-navbar-collapse">
                        <ul class="rd-navbar-corporate-contacts">
                            <li>
                                <div class="unit unit-spacing-xs">
                                    <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                                    <div class="unit-body">
                                        <p><?=$setting['resume']?><span>am</span> — <?=$setting['close']?><span>pm</span></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="unit unit-spacing-xs">
                                    <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                                    <div class="unit-body"><a class="link-phone" href="tel:<?=$setting['phone']?>"><?=$setting['phone']?></a></div>
                                </div>
                            </li>
                            <li>
                                <div class="unit unit-spacing-xs">
                                    <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                                    <div class="unit-body"><a class="link-phone" href="mailto:<?=$setting['email']?>"><?=$setting['email']?></a></div>
                                </div>
                            </li>
                            <!-- </ul><a class="button button-md button-default-outline-2 button-ujarak" href="<?= base_url('customer/register') ?>">Signup</a> -->
                    </div>
                </div>
            </div>

            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <div class="rd-navbar-nav-wrap">
                        <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                            <li><a class="icon fa fa-facebook" href="<?=$setting['facebook']?>" target="_blank" rel="noopener noreferrer"></a></li>
                            <li><a class="icon fa fa-twitter" href="<?=$setting['twitter']?>" target="_blank" rel="noopener noreferrer"></a></li>
                            <li><a class="icon fa fa-instagram" href="<?=$setting['instagram']?>" target="_blank" rel="noopener noreferrer"></a></li>
                        </ul>
                        <!-- RD Navbar Nav-->
                        <ul class="rd-navbar-nav">
                            <li class="rd-nav-item <?= $active_nav_index ?? '' ?>"><a class="rd-nav-link" href="<?= base_url('/') ?>">Home</a>
                            </li>
                            <li class="rd-nav-item <?= $active_nav_about ?? '' ?>"><a class="rd-nav-link" href="<?= base_url('about') ?>">About</a>

                            </li>
                            <?php if (!isset($_SESSION['role'])) : ?>
                            <li class="rd-nav-item <?= $active_nav_login ?? '' ?>"><a class="rd-nav-link" href="#">Account</a>
                                <!-- RD Navbar Dropdown-->
                                <ul class="rd-menu rd-navbar-dropdown">
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url('auth/login') ?>">Login</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url('auth/register') ?>">Register</a></li>
                                </ul>
                            </li>
                            <?php endif;?>
                            <li class="rd-nav-item"><a class="rd-nav-link" href="#">Gallery</a></li>

                            <li class="rd-nav-item <?= $active_nav_contact ?? '' ?>"><a class="rd-nav-link" href="<?= base_url('contact') ?>">Contact Us</a>
                            </li>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>

                                <li class="rd-nav-item"><a class="rd-nav-link" href="#">Admin</a>

                                    <ul class="rd-menu rd-navbar-dropdown">
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url('logout') ?>">Logout</a></li>
                                    </ul>
                                </li>
                            <?php elseif(isset($_SESSION['role']) && $_SESSION['role'] == "customer") : ?>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="#">User</a>

                            <ul class="rd-menu rd-navbar-dropdown">
                                <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url('user/dashboard') ?>">Dashboard</a></li>
                                <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url('user/logout') ?>">Logout</a></li>
                            </ul>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>