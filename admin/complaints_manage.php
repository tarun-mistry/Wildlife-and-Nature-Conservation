<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'Complaint DELETED SUCCESSFULLY');	
}	
}

if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->status($qury->comp_table,$_REQUEST['status']);
echo "<script>window.location='complaints_manage.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->comp_table,$_REQUEST['name']);
	echo "<script>window.location='complaints_manage.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Complaints Manage </h2>
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
                                           <th>Complaint</th>
											<th>Description</th>
											<th>Date</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
											$mem_select = $qury->selectr("*",$qury->prefix.$qury->comp_table ," ORDER BY ".$qury->comp_table."_date DESC");
										foreach($mem_select as $user)
										{
											echo "<tr><td>".$i."</td><td>".ucwords($user[$qury->comp_table.'_complaint'])."</td>
											<td>".$user[$qury->comp_table.'_desc']."</td>
											<td>".$user[$qury->comp_table.'_date']."</td>
											<td>".$project->status($user[$qury->comp_table.'_status'])."</td>
											
											<td><a href='complaint_view.php?action=view&name=".$qury->encrypt_decrypt('encrypt',$user[$qury->comp_table.'_id'])."' class='btn btn-push btn-warning btn-xs'><i class='fa fa-eye'></i> </a> 
											
										   <a  href='complaints_manage.php?action=delete&name=".$qury->encrypt_decrypt('encrypt',$user[$qury->comp_table.'_id'])."' class='btn btn-push btn-danger btn-xs'><i class='fa fa-trash-o'></i></a> <div class='btn-group'>
                                            <button type='button' class='btn btn-teal btn-push btn-xs'><i class='fa fa-cogs'></i></button>
                                            <button aria-expanded='false' type='button' class='btn btn-xs btn-push btn-teal dropdown-toggle' data-toggle='dropdown'>
                                                <span class='caret'></span>
                                                <span class='sr-only'>Toggle Dropdown</span>
                                            </button>
                                            <ul class='dropdown-menu' role='menu'>
                                                <li><a href='complaints_manage.php?action=status&status=pending'>Pending</a></li>
                                                <li><a href='complaints_manage.php?action=status&status=solved'>Solved</a></li>
                                                <li><a href='complaints_manage.php?action=status&status=cancel'>Cancel</a></li>
                                                
                                            </ul>
                                        </div></td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
                                           <th>Complaint</th>
											<th>Description</th>
											<th>Date</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
