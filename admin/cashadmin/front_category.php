<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'COmpanUpdated Successfully');	
}
if($_REQUEST['id']==3)
{
array_push($valid->success_msg,'API Detail updated successfully');	
}	
}

if(isset($_REQUEST['action']))
{

if($_REQUEST['action'] == 'yes')
{
$cat = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);	
$data = array(
$qury->cpn_table.'_front' => 1
);
$qury->update($qury->prefix.$qury->cpn_table,$data," WHERE ".$qury->cpn_table."_offer_name='".$cat."'");
echo "<script>window.location='front_category.php?id=2'</script>";
}	

if($_REQUEST['action'] == 'no')
{
$cat = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);	
$ndata = array(
$qury->cpn_table.'_front' => 2
);
$qury->update($qury->prefix.$qury->cpn_table,$ndata," WHERE ".$qury->cpn_table."_offer_name='".$cat."'");
echo "<script>window.location='front_category.php?id=2'</script>";
}
}


?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Manage Front Category</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                       
                        
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
											<th>Category</th>
											<th>Front Show</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									$now = date('Y-m-d');
									
									$com_select = $qury->selectr("*",$qury->prefix.$qury->cpn_table,"  WHERE ".$qury->cpn_table."_offer_name !='' GROUP BY ".$qury->cpn_table."_offer_name");
										foreach($com_select as $com)
										{
											if($com[$qury->cpn_table.'_front']==1)
											{
												$fo = 'Yes';
											}
											else{
												$fo = 'No';
											}
											echo "<tr><td>".$i."</td><td>".ucwords($com[$qury->cpn_table.'_offer_name'])."</td>
											<td>".$fo."</td>

											
											<td> <a  href='front_category.php?action=no&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->cpn_table.'_offer_name'])."' class='btn btn-push btn-danger btn-xs'><i class='fa  fa-times'></i></a>
											
											<a  href='front_category.php?action=yes&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->cpn_table.'_offer_name'])."' class='btn btn-push btn-success btn-xs'><i class='fa  fa-check'></i></a>

											</td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
											<th>Category</th>
											<th>Front Show</th>
                                           <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
							<ul class="pagination">
							
							</ul>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
