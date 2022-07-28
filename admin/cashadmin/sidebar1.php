<aside id="sidebar-left" class="sidebar-circle">

                <!-- Start left navigation - profile shortcut -->
                <div class="sidebar-content">
                    <div class="media">
                        <a class="pull-left has-notif avatar" href="#">
                            <img src="assets/img/250.png" alt="admin">
                            <i class="online"></i>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Hello, <span><?php echo $fetch[$qury->mem_table.'_username']; ?></span></h4>
                            <small><?php echo $fetch[$qury->mem_table.'_name']; ?></small>
                        </div>
                    </div>
                </div><!-- /.sidebar-content -->
                <!--/ End left navigation -  profile shortcut -->

                <!-- Start left navigation - menu -->
                <ul class="sidebar-menu">

                    <!-- Start navigation - dashboard -->
                    <li class="active">
                        <a href="dashboard.php">
                            <span class="icon"><i class="fa fa-home"></i></span>
                            <span class="text">Dashboard</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    
                    <li class="sidebar-category">
                        <span>Pages</span>
                        <span class="pull-right"><i class="fa fa-trophy"></i></span>
                    </li>
                    
                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-file-o"></i></span>
                            <span class="text">Pages</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="privacy.php">Privacy Policy</a></li>
                            <li><a href="term_condition.php">Term & Condition</a></li>
                            <li><a href="contact.php">Contact us</a></li>
                            <li><a href="faq_manage.php">Faq/Support</a></li>
                        </ul>
                    </li>
					
					<li class="sidebar-category">
                        <span>Companies Detail</span>
                        <span class="pull-right"><i class="fa fa-trophy"></i></span>
                    </li>
                    
                    <li class="submenu">
                        <a href="api_integrate.php">
                            <span class="icon"><i class="fa fa-file-o"></i></span>
                            <span class="text">Api Integration</span>
                            <span class="arrow"></span>
                        </a>
                        
                    </li>
					
					
                  
                    <li class="sidebar-category">
                        <span>Products</span>
                        <span class="pull-right"><i class="fa fa-magic"></i></span>
                    </li>
                    <!--/ End category ui kit-->

                    <!-- Start navigation - forms -->
                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Categories</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            
                            <li><a href="category_manage.php">Manage Category</a></li>
                            
                            
                        </ul>
                    </li>
					
					 <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Products</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            
                            <li><a href="prod_manage.php">Manage Products</a></li>
                           <li><a href="dotd_manage.php">Manage DOTD Offers</a></li>
                             <li><a href="alloffer_manage.php">Manage All Offers</a></li>
                        </ul>
                    </li>
                    <!--/ End navigation - forms -->
					
					
					
                    <li class="sidebar-category">
                        <span>Members</span>
                        <span class="pull-right"><i class="fa fa-magic"></i></span>
                    </li>
                   
                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Members</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="members_manage.php">Manage Members</a></li>
                            
                            
                        </ul>
                    </li>
					
					 <li class="sidebar-category">
                        <span>Order Reports</span>
                        <span class="pull-right"><i class="fa fa-magic"></i></span>
                    </li>
                   
                    <li class="submenu">
                        <a href="order_reports.php">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Manage Reports</span>
                            <span class="arrow"></span>
                        </a>
                       
                    </li>
					
					<li class="submenu">
                        <a href="search_reports.php">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Search Reports</span>
                            <span class="arrow"></span>
                        </a>
                       
                    </li>
					
					
					
					<li class="sidebar-category">
                        <span>Transactions & Activity</span>
                        <span class="pull-right"><i class="fa fa-magic"></i></span>
                    </li>
                   
                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Transaction</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="trans_recent.php">Recent Transactions</a></li>
                            <li><a href="trans_missing.php">Missing Transactions</a></li>
                            
                        </ul>
                    </li>
					
					 <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Activity</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="click_activity.php">Click Activity</a></li>
                        </ul>
                    </li>
                    

					
					<!-- Start category ui kit-->
                    <li class="sidebar-category">
                        <span>Media</span>
                        <span class="pull-right"><i class="fa fa-magic"></i></span>
                    </li>
                    <!--/ End category ui kit-->

                    <!-- Start navigation - forms -->
                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Sliders</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="slider_manage.php">Manage Sliders</a></li>
                            <li><a href="slider_add.php">New Sliders</a></li>
                            
                        </ul>
                    </li>
					
					<li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Media & Partner</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="media_manage.php">Manage Partner</a></li>
                            <li><a href="media_add.php">New Partner</a></li>
                            
                        </ul>
                    </li>
                    
                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-list-alt"></i></span>
                            <span class="text">Advertisement</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="ads_manage.php">Manage Ads</a></li>
                            <li><a href="ads_add.php">New Ads</a></li>
                            
                        </ul>
                    </li>
                    <!--/ End navigation - forms -->
					
                   
                </ul><!-- /.sidebar-menu -->
                <!--/ End left navigation - menu -->

                
            </aside><!-- /#sidebar-left -->
            <!--/ END SIDEBAR LEFT -->
