<nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="<?=base_url('frontend/images/logo-main.png')?>" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="<?=base_url('admin/dashboard')?>"><i class="fas fa-home"></i> Dashboard</a>
                </li>
           
                <li>
                    <a href="<?=base_url('admin/users')?>"><i class="fas fa-bullhorn"></i>Announcement</a>
                </li>
                <li>
                    <a href="<?=base_url('admin/users')?>"><i class="fas fa-user-friends"></i>Users</a>
                </li>
                <li>
                    <a href="<?=base_url('admin/payments')?>"><i class="fas fa-cog"></i>Payments</a>
                </li>
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
                        
                    </ul>
                </li>
                
            </ul>
    </nav>