<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'PRODUCT DELETED SUCCESSFULLY');	
}	
}

$cc = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);

if(isset($_REQUEST['action']))
{
if($_REQUEST['action'] == 'status')
{
$qury->change_status($qury->prd_table,$_REQUEST['name'],$_REQUEST['status']);
echo "<script>window.loprdion='prod_manage.php?id=1'</script>";
}

if($_REQUEST['action'] == 'delete')
{
	$qury->delete_data($qury->prd_table,$_REQUEST['name']);
	echo "<script>window.loprdion='prod_manage.php?id=2'</script>";
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-arrows"></i>Product Detail </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Product </li>
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
                                    <?php
									$items = $qury->selectfetch("*",$qury->prefix.$qury->alofr_table," WHERE ".$qury->alofr_table."_id='".$cc ."'");
									?>
                                    <tbody>
									<tr><td><strong>Title </strong></td><td> <?php echo $items[$qury->alofr_table.'_title']; ?></td><td><strong>Description </strong></td><td><?php echo $items[$qury->alofr_table.'_description']; ?></td></tr>
									
									<tr><td><strong>Company </strong></td><td> <?php echo $qury->companies($items[$qury->alofr_table.'_company']); ?></td><td><strong>Category </strong></td><td><?php echo ucwords(str_replace('_',' ',$items[$qury->alofr_table.'_category'])); ?></td></tr>
									
									<tr><td><strong>Start Date </strong></td><td> <?php echo date('d/m/Y H:i:s',substr($items[$qury->alofr_table.'_starttime'],0,10)); ?></td><td><strong>End Date </strong></td><td><?php echo date('d/m/Y H:i:s',substr($items[$qury->alofr_table.'_endtime'],0,10)); ?></td></tr>
									
									
									<tr><td><strong>Availability </strong></td><td> <?php echo $items[$qury->alofr_table.'_availability']; ?></td><td><strong>Image </strong></td><td><img src="<?php echo $items[$qury->alofr_table.'_imgurl']; ?>" style="width:100px; height:100px;"/></td></tr>
									
									</tbody>
                                   
                                </table>
                            </div>
							<ul class="pagination">
						
							</ul>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
