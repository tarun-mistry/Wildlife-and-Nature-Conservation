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

	$name = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);
$members = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$name."'");
$profile = $qury->selectfetch("*",$qury->prefix.$qury->prof_table," WHERE ".$qury->prof_table."_members='".$name."'");
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
                    <h2><i class="fa fa-user"></i>Cashback </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Cashback </li>
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
						<tr><th colspan="4">Member Details</th></tr>
						</thead>
						<tbody>
						<tr><td><st	rong>First Name </strong></td> <td><?php echo ucwords($members[$qury->mem_table.'_name']); ?></td> <td><strong>Last Name</strong></td>  <td><?php echo ucwords($members[$qury->mem_table.'_lname']); ?></td> </tr>
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
						<h3>Cashback Details</h3>
						<table class="table-reponsive table table-theme table-bordered">
						<thead>
						<tr>
                                            <th>Amount</th><th>Type</th>
                                          					<th>Category</th>
											<th>Date</th>
                                           <th>Action</th>
                                            
                                        </tr>
						</thead>
						<tbody>
						<?php $i=1; 
									$cash_select = $qury->selectr("*",$qury->prefix.$qury->cash_table," WHERE ".$qury->cash_table."_user=".$name."' ");
										foreach($cash_select as $cash)
										{
											echo "<tr>
	<td>".ucwords($cash[$qury->cash_table.'_amount'])." Rs.</td><td>".$cash[$qury->cash_table.'_type']."</td><td>".$cash[$qury->cash_table.'_company']."</td>
			<td>".$cash[$qury->cash_table.'_date']."</td>
			</tr>";
										$i++;
										}
									
									?>
						</tbody>
						
						</table>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
