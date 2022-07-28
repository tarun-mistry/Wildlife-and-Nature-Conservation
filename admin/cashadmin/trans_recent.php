<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'Transaction DELETED SUCCESSFULLY');	
}	
}

if(isset($_REQUEST['action']))
{


if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->trans_table,$_REQUEST['name']);
	echo "<script>window.location='trans_recent.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Confirm Transaction </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Transaction </li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php include '../alert.php'; ?>
						<div class="table-responsive mb-20">
                                <table class="table table-striped table-theme table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
                                            <th>User Name</th>
											<th>Type</th>
											<th>Amount</th>
											<th>Refid</th>
											<th>Refid</th>
											<th>Date</th>
											
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									
									$page = $qury->pagination("*",$qury->cash_table,20,$_SERVER['PHP_SELF']," WHERE ".$qury->cash_table."_status='2'","");
									
									$trans_select = $qury->selectr("*",$qury->prefix.$qury->cash_table," WHERE ".$qury->cash_table."_status='2' ORDER BY ".$qury->cash_table."_id DESC $page[0]");
										foreach($trans_select as $trans)
										{
										$user = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$trans[$qury->cash_table.'_user']."'");

										
											
											echo "<tr><td>".$i."</td><td>".ucwords($user[$qury->mem_table.'_name'])." ".ucwords($user[$qury->mem_table.'_lname'])."</td><td>".$trans[$qury->cash_table.'_type']."</td><td>".$trans[$qury->cash_table.'_amount']."</td><td>".$trans[$qury->cash_table.'_refid']."</td><td>".$trans[$qury->cash_table.'_refidsec']."</td><td>".$trans[$qury->cash_table.'_date']."</td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                           <th class="text-center border-right">SNo</th>
                                            <th>User Name</th>
											<th>Type</th>
											<th>Amount</th>
											<th>Refid</th>
											<th>Refid</th>
											<th>Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
							
							<ul class="pagination"><?php echo $page[1]; ?></ul>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
