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

if(isset($_REQUEST['action']))
{

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->ckactv_table,$_REQUEST['name']);
	echo "<script>window.location='click_activity.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Click Activity </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Activity </li>
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
                                         
											<th>Username</th>
											<th>Refid</th>
											<th>Refid2</th>
											<th>Company</th>
											<th>Date</th>
											
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									$page = $qury->pagination("*",$qury->ckactv_table,20,$_SERVER['PHP_SELF'],"","");
									
									$click_select = $qury->selectr("*",$qury->prefix.$qury->ckactv_table," ORDER BY ".$qury->ckactv_table."_id DESC $page[0]");
										foreach($click_select as $click)
										{
										$user = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$click[$qury->ckactv_table.'_members']."'");

										if(is_numeric($click[$qury->ckactv_table.'_company']))
									{
										$comp = $qury->selectfetch("*",$qury->prefix.$qury->com_table," WHERE ".$qury->com_table."_id='".$click[$qury->ckactv_table.'_company']."'");
									$tt = $comp[$qury->com_table."_name"];
									}
									else{
									$tt = $click[$qury->ckactv_table.'_company'];
									}
										
											echo "<tr><td>".$i."</td><td>".ucwords($user[$qury->mem_table.'_name'])."</td><td>".$click[$qury->ckactv_table.'_refid']."</td><td>".$click[$qury->ckactv_table.'_refidsec']."</td><td>".$tt."</td><td>".$click[$qury->ckactv_table.'_date']."</td><td> <a  href='click_activity.php?action=delete&name=".$qury->encrypt_decrypt('encrypt',$click[$qury->ckactv_table.'_id'])."' class='btn btn-push btn-danger btn-xs'><i class='fa fa-trash-o'></i></a> </td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
											<th>Username</th>
											<th>Refid</th>
											<th>Refid2</th>
											<th>Company</th>
											<th>Date</th>
											<th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
							
							<ul class="pagination">
							<?php echo $page[1]; ?>
							</ul>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
