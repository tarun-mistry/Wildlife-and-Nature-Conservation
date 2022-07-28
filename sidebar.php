 <div class="col-md-3 md-margin-bottom-40">
			<?php if($users[$qury->mem_table.'_profilepic']=='')
			{
			echo '<img class="img-responsive profile-img margin-bottom-20" src="images/profile.png" alt="default">';	
			}
			else{
			?>
                <img class="img-responsive profile-img margin-bottom-20" src="profile/<?php echo $users[$qury->mem_table.'_profilepic']; ?>" alt="">
			<?php } ?>
                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    <li class="list-group-item <?php if(basename($_SERVER['PHP_SELF'])=='dashboard.php'){ echo 'active';} ?>">
                        <a href="dashboard.php" style="color:#fff;"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                   
				  <li class="list-group-item">
                        <a href="logout.php"><i class="fa fa-cog"></i> Logout</a>
                    </li>
                </ul>

                <div class="margin-bottom-50"></div>

                 <div style="height:100px;"></div>
            </div>