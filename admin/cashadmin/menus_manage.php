<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'MENU DELETED SUCCESSFULLY');	
}	
}

if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->mnu_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.location='menus_manage.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->mnu_table,$_REQUEST['name']);
	echo "<script>window.location='menus_manage.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Menus Setting </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Menus </li>
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
                                            <th>Menu Name</th>
											<th>Order</th>
											<th>Position</th>
											<th>Type</th>
											<th>Parent</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									$menu_select = $qury->selectr("*",$qury->prefix.$qury->mnu_table," ");
										foreach($menu_select as $menu)
										{
											echo "<tr><td>".$i."</td><td>".ucwords($menu[$qury->mnu_table.'_name'])."</td><td>".$menu[$qury->mnu_table.'_order']."</td><td>".$project->menu_position($menu[$qury->mnu_table.'_loc'])."</td><td>".$project->type($menu[$qury->mnu_table.'_type'])."</td><td>".ucwords($qury->web_parent($qury->mnu_table,$menu[$qury->mnu_table.'_parent']))."</td><td>".$project->status($menu[$qury->mnu_table.'_status'])."</td><td><a href='menus_add.php?action=edit&name=".$qury->encrypt_decrypt('encrypt',$menu[$qury->mnu_table.'_id'])."' class='btn btn-push btn-info btn-xs'><i class='fa fa-pencil'></i> </a> <a  href='menus_manage.php?action=delete&name=".$qury->encrypt_decrypt('encrypt',$menu[$qury->mnu_table.'_id'])."' class='btn btn-push btn-danger btn-xs'><i class='fa fa-trash-o'></i></a> <div class='btn-group'>
                                            <button type='button' class='btn btn-teal btn-push btn-xs'><i class='fa fa-cogs'></i></button>
                                            <button aria-expanded='false' type='button' class='btn btn-xs btn-push btn-teal dropdown-toggle' data-toggle='dropdown'>
                                                <span class='caret'></span>
                                                <span class='sr-only'>Toggle Dropdown</span>
                                            </button>
                                            <ul class='dropdown-menu' role='menu'>
                                                <li><a href='menus_manage.php?action=status&status=active&name=".$qury->encrypt_decrypt('encrypt',$menu[$qury->mnu_table.'_id'])."'>Active</a></li>
                                                <li><a href='menus_manage.php?action=status&status=block&name=".$qury->encrypt_decrypt('encrypt',$menu[$qury->mnu_table.'_id'])."'>Block</a></li>
                                                <li><a href='menus_manage.php?action=status&status=pending&name=".$qury->encrypt_decrypt('encrypt',$menu[$qury->mnu_table.'_id'])."'>Pending</a></li>
                                                
                                            </ul>
                                        </div></td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
                                            <th>Menu Name</th>
											<th>Order</th>
											<th>Position</th>
											<th>Type</th>
											<th>Parent</th>
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
<script src="<?php echo $qury->siteurl(); ?>ckeditor/ckeditor.js" type="text/javascript"></script>