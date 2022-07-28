<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'Category DELETED SUCCESSFULLY');	
}	
}

if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->mcat_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.location='category_manage.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->mcat_table,$_REQUEST['name']);
	echo "<script>window.location='category_manage.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Category Setting </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Category </li>
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
                                            <th>Category Name</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									
									$page = $qury->pagination("*",$qury->mcat_table,20,$_SERVER['PHP_SELF'],"","");
									$cat_select = $qury->selectr("*",$qury->prefix.$qury->mcat_table," ORDER BY ".$qury->mcat_table."_name $page[0]");
										foreach($cat_select as $cat)
										{
										echo "<tr><td>".$i."</td><td>".ucwords($cat[$qury->mcat_table.'_name'])."</td>
										
										<td>".$project->status($cat[$qury->mcat_table.'_status'])."</td><td> <a  href='mcategory_add.php?action=edit&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->mcat_table.'_id'])."' class='btn btn-push btn-info btn-xs'><i class='fa fa-pencil'></i></a></td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
                                            <th>Category Name</th>
											<th>Status</th>
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