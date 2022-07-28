<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'MEMBERS DELETED SUCCESSFULLY');	
}	
}
if(isset($_REQUEST['name']))
{
	$mid = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);
$members = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$mid."'");
$profile = $qury->selectfetch("*",$qury->prefix.$qury->prof_table," WHERE ".$qury->prof_table."_members='".$mid."'");
}
if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->mem_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.location='members_manage.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->mem_table,$_REQUEST['name']);
	echo "<script>window.location='members_manage.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Members Detail </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Members </li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
						<table class="table-reponsive table table-theme table-bordered">
						<thead>
						<tr><th colspan="4">Member Profile</th></tr>
						</thead>
						<tbody>
						<tr><td><strong>First Name </strong></td> <td><?php echo ucwords($members[$qury->mem_table.'_name']); ?></td> <td><strong>Last Name</strong></td>  <td><?php echo ucwords($members[$qury->mem_table.'_lname']); ?></td> </tr>
						</tbody>
						<tbody>
						<tr><td><strong>Email </strong></td> <td><?php echo $members[$qury->mem_table.'_email']; ?></td> <td><strong>Gender</strong></td>  <td><?php echo $profile[$qury->prof_table.'_gender']; ?></td> </tr>
						
						<tr><td><strong>Contact </strong></td> <td><?php echo $members[$qury->mem_table.'_contact']; ?></td> <td><strong>Alternate Contact</strong></td>  <td><?php echo $profile[$qury->prof_table.'_contact']; ?></td> </tr>
						
						<tr><td><strong>Country </strong></td> <td><?php echo $profile[$qury->prof_table.'_country']; ?></td> <td><strong>State</strong></td>  <td><?php echo $profile[$qury->prof_table.'_state']; ?></td> </tr>
						
						<tr><td><strong>City </strong></td> <td><?php echo $profile[$qury->prof_table.'_city']; ?></td> <td><strong>Address</strong></td>  <td><?php echo $profile[$qury->prof_table.'_address'].' - '.$profile[$qury->prof_table.'_pincode']; ?></td> </tr>
						
						<tr><td><strong>Joindate </strong></td> <td><?php echo $members[$qury->mem_table.'_joindate']; ?></td> <td><strong>Last Login</strong></td>  <td><?php echo $members[$qury->mem_table.'_lastlogin']; ?></td> </tr>
						
						
						</tbody>
						<tfoot>
                                        <tr>
                                            <th colspan="4"></th>
                                            
                                        </tr>
                                    </tfoot>
						</table>
						</div>
						</div>
						
						<br/><br/>
						<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h3>Order Details</h3>
						<table class="table-reponsive table table-theme table-bordered">
						<thead>
						<tr>
                                            <th class="text-center border-right">SNo</th>
                                            <th>Title</th>
											<th>Category</th>
											<th>ProductId</th>
											<th>Merchant</th>
											<th>Amount</th>
											<th>Commision</th>
											<th>Commision Rate</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
						</thead>
						<tbody>
						<?php $i=1;  
						$rpt_select = $qury->two_join($qury->rpt_table,$qury->ckactv_table, $qury->rpt_table."_affExparam1", $qury->ckactv_table."_refid", "INNER JOIN", " WHERE ".$qury->ckactv_table."_members='".$mid."' ORDER BY ".$qury->rpt_table."_id DESC"); 
						
						foreach($rpt_select as $rpt)
										{
										
											echo "<tr><td>".$i."</td><td>".ucwords($rpt[$qury->rpt_table.'_title'])."</td><td> ".ucwords($rpt[$qury->rpt_table.'_category'])."</td><td>".$rpt[$qury->rpt_table.'_productid']."</td><td>".$rpt[$qury->rpt_table.'_company']."</td><td>".$rpt[$qury->rpt_table.'_sales']."</td><td>".$rpt[$qury->rpt_table.'_commision']."</td><td>".$rpt[$qury->rpt_table.'_commisionrate']."</td><td>".$rpt[$qury->rpt_table.'_status']."</td><td> <a  href='view_reports.php?action=view&name=".$qury->encrypt_decrypt('encrypt',$rpt[$qury->rpt_table.'_id'])."' class='btn btn-push btn-info btn-xs'><i class='fa fa-eye'></i></a> </td></tr>";
											
										$i++;
										}
						
						?>
						</tbody>
						<tfoot>
                                        <tr>
                                           <th class="text-center border-right">SNo</th>
                                            <th>Title</th>
											<th>Category</th>
											<th>ProductId</th>
											<th>Merchant</th>
											<th>Amount</th>
											<th>Commision</th>
											<th>Commision Rate</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </tfoot>
						</table>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
