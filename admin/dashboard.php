<?php require_once 'header.php'; ?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-home"></i>Dashboard </h2>
                   </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
<div class="col-md-6">
					<div class="table-responsive mb-20">
                                <table class="table table-striped table-theme table-responsive">
                                    <thead>
                                    <caption style="font-size:20px;color:purple;">New Complaints <a href="complaints_manage.php" style="font-size:15px;" >( View All )</a></caption>
                                        <tr>
                                            <th class="text-center">SNo</th>
                                            <th>Complaint</th>
											
											<th>Description</th>
											<th>Date</th>
											<th>View</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									$mem_select = $qury->selectr("*",$qury->prefix.$qury->comp_table," ORDER BY ".$qury->comp_table."_date DESC LIMIT 5 ");
										foreach($mem_select as $user)
										{
											echo "<tr><td>".$i."</td><td>".ucwords($user[$qury->comp_table.'_complaint'])."</td><td>".$user[$qury->comp_table.'_desc']."</td><td>".$user[$qury->comp_table.'_date']."</td><td><a href='complaint_view.php?action=view&name=".$qury->encrypt_decrypt('encrypt',$user[$qury->comp_table.'_id'])."' class='btn btn-push btn-warning btn-xs'><i class='fa fa-eye'></i> </a> </td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                  
                                </table>            
   
                </div>  
</div>				

<div class="col-md-6">
					<div class="table-responsive mb-20">
                                <table class="table table-striped table-theme table-responsive">
                                    <thead>
                                    <caption style="font-size:20px;color:purple;">New Volunteer Requests <a href="volunteer_manage.php" style="font-size:15px;" >( View All )</a></caption>
                                        <tr>
                                            <th class="text-center">SNo</th>
                                            <th>Name</th>
											
											<th>Phone No</th>
											<th>Joindate</th>
											<th>View</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									$vol_select = $qury->selectr("*",$qury->prefix.$qury->vol_table ," ORDER BY ".$qury->vol_table."_date DESC LIMIT 5 ");
										foreach($vol_select as $vol)
										{
											$user_id= $vol[$qury->vol_table.'_username']; 
											$user3 = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$user_id."'");
																		{
											echo "<tr><td>".$i."</td><td>".$user3[$qury->mem_table.'_fname']."</td><td>".$vol[$qury->vol_table.'_phone']."</td><td>".$vol[$qury->vol_table.'_date']."</td><td><a href='volunteer_view.php?action=view&name=".$qury->encrypt_decrypt('encrypt',$user3[$qury->mem_table.'_id'])."' class='btn btn-push btn-warning btn-xs'><i class='fa fa-eye'></i> </a> </td></tr>";
											
										$i++;
										}
										}
									?>
									</tbody>
                                  
                                </table>            
   
                </div>  
</div>				
<div class="clearfix"></div>

<div class="col-md-6">
					<div class="table-responsive mb-20">
                                <table class="table table-striped table-theme table-responsive">
                                    <thead>
                                    <caption style="font-size:20px;color:purple;">Adoption Requests <a href="cashback_manage.php" style="font-size:15px;" >( View All )</a></caption>
                                        <tr>
                                            <th class="text-center">SNo</th>
                                            <th  style="text-align:center;">User Name </th>
											
											<th  style="text-align:center;">Amount</th>
											<th  style="text-align:center;">View</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align:center;">
									<?php $j=1; 
									$fetch_ani = $qury->selectr("*",$qury->prefix.$qury->adopt_table," WHERE ".$qury->adopt_table."_int='1' ORDER BY ".$qury->adopt_table."_date DESC   ");
								foreach($fetch_ani as $adopt)
										{
												$anim = $adopt[$qury->adopt_table."_animal_id"];
								   $userr = $adopt[$qury->adopt_table."_username"];
								   $user33 = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$userr."'");
								   
								$user2 = $qury->selectfetch("*",$qury->prefix.$qury->animal_table," WHERE ".$qury->animal_table."_id='".$anim."'");
								{

							echo "<tr><td>".$j."</td><td>".$user33[$qury->mem_table.'_fname']."</td>
								<td> ".$user2[$qury->animal_table.'_name']."</td>
								<td><a href='cash_view.php?action=view&name=".$qury->encrypt_decrypt('encrypt',$anim)."' class='btn btn-push btn-warning btn-xs'><i class='fa fa-eye'></i> </a> </td></tr>";
										$j++;
										}}
											
							
									?>
									</tbody>
                                  
                                </table>            
   
                </div>  
</div>				



<div class="col-md-6">
					<div class="table-responsive mb-20">
                                <table class="table table-striped table-theme table-responsive">
                                    <thead>
                                    <caption style="font-size:20px;color:purple;">New Events <a href="members_manage.php" style="font-size:15px;" >( View All )</a></caption>
                                        <tr>
                                            <th class="text-center">SNo</th>
                                            <th>Name</th>
											
											<th>Email</th>
											<th>Joindate</th>
											<th>View</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									$mem_select = $qury->selectr("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_type!=1 ORDER BY ".$qury->mem_table."_joindate DESC LIMIT 5 ");
										foreach($mem_select as $user)
										{
											echo "<tr><td>".$i."</td><td>".ucwords($user[$qury->mem_table.'_name'])."</td><td>".$user[$qury->mem_table.'_email']."</td><td>".$user[$qury->mem_table.'_joindate']."</td><td><a href='members_view.php?action=view&name=".$qury->encrypt_decrypt('encrypt',$user[$qury->mem_table.'_id'])."' class='btn btn-push btn-warning btn-xs'><i class='fa fa-eye'></i> </a> </td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                  
                                </table>            
   
                </div>  
</div>				
</div>   
   <!-- /.body-content -->
               
<?php require_once 'footer.php'; ?>