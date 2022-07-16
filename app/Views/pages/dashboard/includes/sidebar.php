<nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="<?=base_url('frontend/images/logo-main.png')?>" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="<?=base_url('admin/dashboard')?>"><i class="fas fa-home"></i> Dashboard</a>
                </li>
           
                <!-- <li>
                    <a href="<?=base_url('admin/anouncement')?>"><i class="fas fa-bullhorn"></i></a>
                </li> -->
                <div class="dropdown-divider"></div>
                <li>
                    <a href="#announcement" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-bullhorn"></i> Announcement</a>
                    <ul class="collapse list-unstyled" id="announcement">
                        <li>
                            <a href="<?=base_url('admin/announcement/create')?>"><i class="fas fa-file"></i>Create Announcement</a>
                        </li>
                       
                        <li>
                            <a href="<?=base_url('admin/announcement')?>"><i class="fas fa-info-circle"></i>View Announcement</a>
                        </li>
                        
                    </ul>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                    <a href="<?=base_url('admin/users')?>"><i class="fas fa-user-friends"></i>Users</a>
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
                            <a href="<?=base_url('admin/post/category/create')?>"><i class="fas fa-file"></i>Create Category</a>
                        </li>
                        <li>
                            <a href="<?=base_url('admin/post/create')?>"><i class="fas fa-file"></i>Create Post</a>
                        </li>
                        <li>
                            <a href="<?=base_url('admin/post/index')?>"><i class="fas fa-info-circle"></i>View</a>
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