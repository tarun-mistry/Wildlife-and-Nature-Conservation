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
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->com_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.location='api_integrate.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->com_table,$_REQUEST['name']);
	echo "<script>window.location='api_integrate.php?id=2'</script>";
}	
}

if(isset($_REQUEST['UPDATE']))
{
$data =array(
$qury->com_table.'_trackingid' => $_REQUEST['track_id'],
$qury->com_table.'_token' => $_REQUEST['token'],
$qury->com_table.'_apikey' => $_REQUEST['apikey'],
$qury->com_table.'_cashback' => $_REQUEST['cashback']
);
$qury->update($qury->prefix.$qury->com_table,$data," WHERE ".$qury->com_table."_id='".$_REQUEST['a_id']."'");

$cdata = array(
$qury->cat_table."_cashback" =>$_REQUEST['cashback']
);
$qury->update($qury->prefix.$qury->cat_table,$cdata," WHERE ".$qury->cat_table."_companies	='".$_REQUEST['a_id']."'");

$pdata = array(
$qury->prd_table."_cashback" =>$_REQUEST['cashback']
);
$qury->update($qury->prefix.$qury->prd_table,$pdata," WHERE ".$qury->prd_table."_company='".$_REQUEST['a_id']."'");
echo "<script>window.location='api_integrate.php?id=3'</script>";	
}
?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Api Integration</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Company Detail </li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php include '../alert.php'; ?>
						
						<?php 
						if(isset($_REQUEST['action']))
						{
						if($_REQUEST['action']=='edit')
						{
						$apid = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);
						$edit = $qury->selectfetch("*",$qury->prefix.$qury->com_table," WHERE ".$qury->com_table."_id='".$apid."'");
						echo '<div class="panel panel-theme">
				<div class="panel-heading">
				<h2 class="panel-title">'.$edit[$qury->com_table.'_name'].' api detail </h2>
				</div>
				<div class="panel-body">
				
					<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8" onsubmit="return validate_form()" enctype="multipart/form-data"><div class="form-body">
      <div class="form-group"><label for="trackingid" class="control-label">Enter Tracking id</label><input name="track_id" value="'.$edit[$qury->com_table.'_trackingid'].'" id="tracking id" class="form-control rounded" placeholder="Enter Your tracking id" valid="name" type="text">
	  <input value="'.$edit[$qury->com_table.'_id'].'" name="a_id" type="hidden">
	  
	  </div>

	 
	  
		<div class="form-group"><label for="Token" class="control-label">Enter Token/Secrete Key</label>
		  <input name="token" value="'.$edit[$qury->com_table.'_token'].'" id="token" class="form-control rounded" placeholder="Enter Your token" valid="name" type="text">
		</div>
		
		 <div class="form-group"><label for="apikey" class="control-label">Enter AmazonApiKey</label>
		  <input name="apikey" value="'.$edit[$qury->com_table.'_apikey'].'" id="token" class="form-control rounded" placeholder="Enter Your Apikey"  type="text">
		</div>
		
		
		<div class="form-group"><label for="cashback" class="control-label">Enter Cashback</label>
		  <input name="cashback" value="'.$edit[$qury->com_table.'_cashback'].'" id="token" class="form-control rounded" placeholder="Enter Your Cashback" valid="" type="text">
		</div>
		

	
	</div>
	<div class="form-footer">
	<div class="pull-right"><input name="UPDATE" value="UPDATE" class="btn btn-theme mr-5" id="Submit" type="submit"><input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
			<div class="clearfix"></div>
			
			</div></form>				
				</div>
				</div>';
						}							
						}
						
						?>
						
						<div class="table-responsive mb-20">
                                <table class="table table-striped table-theme table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
                                            <th>Company Name</th>
											<th>Logo</th>
											<th>Cashback</th>
											<th>Tracking Id</th>
											<th>Api Key</th>
											<th>Token</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									
									$page = $qury->pagination("*",$qury->com_table,20,$_SERVER['PHP_SELF']," WHERE ".$qury->com_table."_status='1'","");
									
									
									$com_select = $qury->selectr("*",$qury->prefix.$qury->com_table," WHERE ".$qury->com_table."_status='1' ORDER BY ".$qury->com_table."_name $page[0]");
										foreach($com_select as $com)
										{
											echo "<tr><td>".$i."</td><td>".ucwords($com[$qury->com_table.'_name'])."</td>
											<td><img src='../logo/".$com[$qury->com_table.'_logo']."' class='image-responsive' style='width:100px; height:50px;'/></td><td>".$com[$qury->com_table.'_cashback']."</td><td>".$com[$qury->com_table.'_trackingid']."</td>
											<td>".$com[$qury->com_table.'_apikey']."</td>
											<td>".$com[$qury->com_table.'_token']."</td>
											<td>".$project->status($com[$qury->com_table.'_status'])."</td><td><a href='api_integrate.php?action=edit&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->com_table.'_id'])."' class='btn btn-push btn-info btn-xs'><i class='fa fa-pencil'></i> </a> <a  href='api_integrate.php?action=delete&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->com_table.'_id'])."' class='btn btn-push btn-danger btn-xs'><i class='fa fa-trash-o'></i></a> <div class='btn-group'>
                                            <button type='button' class='btn btn-teal btn-push btn-xs'><i class='fa fa-cogs'></i></button>
                                            <button aria-expanded='false' type='button' class='btn btn-xs btn-push btn-teal dropdown-toggle' data-toggle='dropdown'>
                                                <span class='caret'></span>
                                                <span class='sr-only'>Toggle Dropdown</span>
                                            </button>
                                            <ul class='dropdown-menu' role='menu'>
                                                <li><a href='api_integrate.php?action=status&status=active&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->com_table.'_id'])."'>Active</a></li>
                                                <li><a href='api_integrate.php?action=status&status=block&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->com_table.'_id'])."'>Block</a></li>
                                                <li><a href='api_integrate.php?action=status&status=pending&name=".$qury->encrypt_decrypt('encrypt',$com[$qury->com_table.'_id'])."'>Pending</a></li>
                                                
                                            </ul>
                                        </div></td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
                                            <th>Company Name</th>
											<th>Logo</th>
											<th>Cashback</th>
											<th>Tracking Id</th>
											<th>Api Key</th>
											<th>Token</th>
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
