<nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="<?=base_url('frontend/images/oxil-global.png')?>" alt="oxyl global logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="<?=base_url('user/dashboard')?>"><i class="fas fa-home"></i> Dashboard</a>
                </li>

                <div class="dropdown-divider"></div>
                <li>
                <a href="<?=base_url('user/dashboard/announcement')?>"><i class="fas fa-info-circle"></i>Announcements</a>
                </li>
                
                <div class="dropdown-divider"></div> 
                <li>
                    <a href="<?=base_url('admin/payments')?>"><i class="fas fa-cog"></i>Payments</a>
                </li>
                <div class="dropdown-divider"></div> 
                <li>
                    <a href="#pagesmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i> Posts</a>
                    <ul class="collapse list-unstyled" id="pagesmenu">
                       
                        <li>
                            <a href="<?=base_url('admin/post')?>"><i class="fas fa-info-circle"></i>View</a>
                        </li>

                        <!-- <li>
                            <a href="<?=base_url('admin/post/index')?>"><i class="fas fa-exit"></i>Logout</a>
                        </li> -->
                        
                    </ul>
                </li>
                <div class="dropdown-divider"></div> 
                <li>
                    <a href="<?=base_url('logout')?>"><i class="fas fa-sign-out-alt text-danger"></i>Logout</a>
                </li>
            </ul>
    </nav>