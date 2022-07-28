<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'API DELETED SUCCESSFULLY');	
}
if($_REQUEST['id']==3)
{
array_push($valid->success_msg,'API Detail updated successfully');	
}	
}

if(isset($_REQUEST['action']))
{

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->com_table,$_REQUEST['name']);
	echo "<script>window.location='topm_sites.php?id=2'</script>";
}	
}


?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Manage Coupons</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                       
                        <ol class="breadcrumb">
                            <li class="active"><a href="top_sites.php" class="btn btn-theme btn-xs btn-push" style="color:white">Add New Sites</a> </li>
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
											<th>Title</th>
											<th>Link</th>

											<th>Logo</th>
												
											
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									$now = date('Y-m-d');
									$page = $qury->pagination("*",$qury->com_table,20,$_SERVER['PHP_SELF']," WHERE ".$qury->com_table."_status = '4'","");
									
									
									$com_select = $qury->selectr("*",$qury->prefix.$qury->com_table," WHERE ".$qury->com_table."_status='4' $page[0]");
										foreach($com_select as $com)
										{
											echo "<tr><td>".$i."</td><td>".ucwords($com[$qury->com_table.'_name'])."</td>
											<td>".ucwords($com[$qury->com_table.'_link'])."</td>

											<td><img src='../logo/".$com[$qury->com_table.'_image']."' class='image-responsive' style='width:100px; height:50px;'/></td>
											<td> <a  href='topm_sites.php?action=delete&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->com_table.'_id'])."' class='btn btn-push btn-danger btn-xs'><i class='fa fa-trash-o'></i></a> </td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                             <th class="text-center border-right">SNo</th>
											<th>Title</th>
											<th>Link</th>

											<th>Logo</th>
												
											
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
