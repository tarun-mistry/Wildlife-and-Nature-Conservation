<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'Slider DELETED SUCCESSFULLY');	
}	
}

if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->sli_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.location='slider_manage.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->sli_table,$_REQUEST['name']);
	echo "<script>window.location='slider_manage.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Slider Setting </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Slider </li>
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
                                            <th>Slider </th>
											
											<th>Url</th>
											<th>Image</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									
									$page = $qury->pagination("*",$qury->sli_table,20,$_SERVER['PHP_SELF'],"","");
									$sli_select = $qury->selectr("*",$qury->prefix.$qury->sli_table," ORDER BY ".$qury->sli_table."_id $page[0]");
										foreach($sli_select as $cat)
										{
											echo "<tr><td>".$i."</td><td>".ucwords($cat[$qury->sli_table.'_title'])."</td>
											<td>".$cat[$qury->sli_table.'_url']."</td>
											<td><img src='../upload/".$cat[$qury->sli_table.'_images']."' style='width:70px; height:70px;' /></td>
											<td>".$project->status($cat[$qury->sli_table.'_status'])."</td><td><a href='slider_add.php?action=edit&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->sli_table.'_id'])."' class='btn btn-push btn-info btn-xs'><i class='fa fa-pencil'></i> </a> <a  href='slider_manage.php?action=delete&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->sli_table.'_id'])."' class='btn btn-push btn-danger btn-xs'><i class='fa fa-trash-o'></i></a> <div class='btn-group'>
                                            <button type='button' class='btn btn-teal btn-push btn-xs'><i class='fa fa-cogs'></i></button>
                                            <button aria-expanded='false' type='button' class='btn btn-xs btn-push btn-teal dropdown-toggle' data-toggle='dropdown'>
                                                <span class='caret'></span>
                                                <span class='sr-only'>Toggle Dropdown</span>
                                            </button>
                                            <ul class='dropdown-menu' role='menu'>
                                                <li><a href='slider_manage.php?action=status&status=active&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->sli_table.'_id'])."'>Active</a></li>
                                                <li><a href='slider_manage.php?action=status&status=block&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->sli_table.'_id'])."'>Block</a></li>
                                                <li><a href='slider_manage.php?action=status&status=pending&name=".$qury->encrypt_decrypt('encrypt',$cat[$qury->sli_table.'_id'])."'>Pending</a></li>
                                                
                                            </ul>
                                        </div></td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
										<th class="text-center border-right">SNo</th>
                                            <th>Slider </th>
											
											<th>Url</th>
											<th>Image</th>
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
