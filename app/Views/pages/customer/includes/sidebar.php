<nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="<?=base_url('frontend/images/oxil-global.png')?>" alt="oxyl global logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="<?=base_url('user/dashboard')?>"><i class="fas fa-home"></i> Dashboard</a>
                </li>

                <!-- <div class="dropdown-divider"></div> -->
                <li>
                <a href="<?=base_url('user/settings')?>"><i class="fas fa-user-cog"></i>Profile</a>
                </li>
                
                <div class="dropdown-divider"></div> 
                <li>
                    <a href="<?=base_url('user/payments')?>"><i class="fas fa-money-check"></i>Payments</a>
                </li>
                <div class="dropdown-divider"></div> 
                <li>
                    <a href="#pagesmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i> Posts</a>
                    <ul class="collapse list-unstyled" id="pagesmenu">
                       
                        <li>
                            <a href="<?=base_url('user/posts')?>"><i class="fas fa-info-circle"></i>View</a>
                        </li>
                        
                    </ul>
                </li>
                <div class="dropdown-divider"></div> 
                <li>
                    <a href="#ticketmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i> Ticket</a>
                    <ul class="collapse list-unstyled" id="ticketmenu">
                       
                        <li>
                            <a href="<?=base_url('user/tickets')?>"><i class="fas fa-info-circle"></i>View</a>
                        </li>
                        <li>
                            <a href="<?=base_url('user/ticket/create')?>"><i class="fas fa-info-circle"></i>Create</a>
                        </li>
                        
                    </ul>
                </li>
                <div class="dropdown-divider"></div> 
                <li>
                    <a href="<?=base_url('logout')?>"><i class="fas fa-sign-out-alt text-danger"></i>Logout</a>
                </li>
            </ul>
    </nav>