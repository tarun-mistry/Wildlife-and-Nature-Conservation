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
                                    <caption style="font-size:20px;color:purple;">New Users <a href="members_manage.php" style="font-size:15px;" >( View All )</a></caption>
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

<div class="col-md-6">
					<div class="table-responsive mb-20">
                                <table class="table table-striped table-theme table-responsive">
                                    <thead>
                                    <caption style="font-size:20px;color:purple;">Confirmed Cashback <a href="cashback_manage.php" style="font-size:15px;" >( View All )</a></caption>
                                        <tr>
                                            <th class="text-center">SNo</th>
                                            <th>User Id</th>
											
											<th>Amount</th>
											<th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php $i=1; 
									$user= $qury->selectr("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_type!=1 ORDER BY ".$qury->mem_table."_joindate DESC ");
										foreach($mem_select as $user)
										{
										//	$psum = $qury->selectfetch("SUM(".$qury->cash_table."_amount) as pamt" $qury->cash_table."  WHERE ".$qury->cash_table."_user='".$user[$qury->mem_table.'_id']."' AND ".$qury->cash_table."_status='2'");

											$psum = $qury->selectfetch("SUM(".$qury->cash_table."_amount) as pamt",$qury->prefix.$qury->cash_table." WHERE ".$qury->cash_table."_user='".$user[$qury->mem_table.'_id']."' AND ".$qury->cash_table."_status='2'");

											
									//$psum = $this->selectfetch("SUM(".$this->cash_table."_amount) as pamt",$this->prefix.$this->cash_table." WHERE ".$this->cash_table."_user='".$uid."' AND ".$this->cash_table."_status='2'");
		                    if($psum['pamt'] > 0){
								echo "<tr><td>".$i."</td><td>".$user[$qury->mem_table.'_name']."</td>
								<td>".$psum['pamt']."</td>
								<td><a href='cash_view.php?action=view&no=".$qury->encrypt_decrypt('encrypt',$cash[$qury->cash_table.'_id'])."&name=".$qury->encrypt_decrypt('encrypt',$cash[$qury->cash_table.'_user'])."' class='btn btn-push btn-warning btn-xs'><i class='fa fa-eye'></i> </a> </td></tr>";
							}
											
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