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
$prod = $qury->selectfetch("*",$qury->prefix.$qury->prd_table," WHERE ".$qury->prd_table."_id='".$cc."'");
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
						
							<!-- Start double tabs -->
                            <div class="panel panel-tab panel-tab-double rounded shadow">
                                <!-- Start tabs heading -->
                                <div class="panel-heading no-padding">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab2-1" data-toggle="tab">
                                                <i class="fa fa-user"></i>
                                                <div>
                                                    <span class="text-strong">Step 1</span>
                                                    <span>Basic details</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2-2" data-toggle="tab">
                                                <i class="fa fa-file-text"></i>
                                                <div>
                                                    <span class="text-strong">Step 2</span>
                                                    <span>Specification</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2-3" data-toggle="tab">
                                                <i class="fa fa-credit-card"></i>
                                                <div>
                                                    <span class="text-strong">Step 3</span>
                                                    <span>Key Feature</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2-4" data-toggle="tab">
                                                <i class="fa fa-check-circle"></i>
                                                <div>
                                                    <span class="text-strong">Step 4</span>
                                                    <span>Details</span>
                                                </div>
                                            </a>
                                        </li>
										
										<li>
                                            <a href="#tab2-5" data-toggle="tab">
                                                <i class="fa fa-check-circle"></i>
                                                <div>
                                                    <span class="text-strong">Step 5</span>
                                                    <span>Reviews</span>
                                                </div>
                                            </a>
                                        </li>
                                        
                                       
                                        
                                    </ul>
                                </div><!-- /.panel-heading -->
                                <!--/ End tabs heading -->

                                <!-- Start tabs content -->
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab2-1">
                                           <div class="col-md-3"> 
                                           <?php if($prod[$qury->prd_table.'_imageurl']!='')
										   {
											   echo "<img src='".$prod[$qury->prd_table.'_imageurl']."' class='img-responsive'>";
										   }   
										   ?>
										   
										   
										 
										   </div>
										   
										   <div class="col-md-9">
										  <div class="table-responsive" style="margin-top: -1px;">
                                        <table class="table table-striped table-primary">
                                            <thead>
                                            <tr>
                                                <th class="text-center border-right" colspan="4" ><?php echo $prod[$qury->prd_table.'_title']; ?></th>
                                                
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            <tr>
                                                <td class="border-right"><strong>Product Id</strong></td>
                                                <td><?php echo $prod[$qury->prd_table.'_rid'] ?></td>
                                                <td><strong>Brand</strong></td>
                                                <td><?php echo ucwords($prod[$qury->prd_table.'_brand']) ?></td>  
                                            </tr>
											
											<tr>
                                                <td class="border-right"><strong>Category</strong></td>
                                                <td><?php echo ucwords(str_replace('_',' ',$prod[$qury->prd_table.'_category'])); ?></td>
                                                <td><strong>Company</strong></td>
                                                <td><?php echo 'Flipkart'; ?></td>  
                                            </tr>
                                           <tr>
                                                <td class="border-right"><strong>MRP</strong></td>
                                                <td>Rs. <?php echo $prod[$qury->prd_table.'_maximumRetailPrice'] ?></td>
                                                <td><strong>Selling Price</strong></td>
                                                <td>Rs. <?php echo ucwords($prod[$qury->prd_table.'_sellingPrice']) ?></td>  
                                            </tr>
											
											<tr>
                                                <td class="border-right"><strong>Special Price</strong></td>
                                                <td>Rs. <?php echo $prod[$qury->prd_table.'_specialprice'] ?></td>
                                                <td><strong>Discount </strong></td>
                                                <td><?php echo $prod[$qury->prd_table.'_discount'] ?>%</td>  
                                            </tr>
											
											
											<tr>
                                                <td class="border-right"><strong>Cashback</strong></td>
                                                <td><?php echo $prod[$qury->prd_table.'_cashback'] ?></td>
                                                <td class="border-right"><strong>Sizeunit</strong></td>
                                                <td><?php echo $prod[$qury->prd_table.'_sizeunit'] ?></td>
                                            </tr>
											
											
											<tr>
                                                <td class="border-right"><strong>Stock</strong></td>
                                                <td><?php echo $project->stock($prod[$qury->prd_table.'_stock']); ?></td>
                                                <td><strong>Cash On Delivery</strong></td>
                                                <td><?php echo $project->cod($prod[$qury->prd_table.'_cod']); ?></td>  
                                            </tr>
											
											<tr>
                                                <td class="border-right"><strong>Size</strong></td>
                                                <td><?php echo $prod[$qury->prd_table.'_size'] ?></td>
                                                <td><strong>Color</strong></td>
                                                <td><?php echo ucwords($prod[$qury->prd_table.'_color']) ?></td>  
                                            </tr>
											

											
											<tr>
                                                <td class="border-right"><strong>Storage</strong></td>
                                                <td><?php echo $prod[$qury->prd_table.'_storage'] ?></td>
                                                <td><strong>Display Size</strong></td>
                                                <td><?php echo ucwords($prod[$qury->prd_table.'_displaysize']) ?></td>  
                                            </tr>
											
                                            <tr>
                                                <td class="border-right"><strong>Shipping Charges</strong></td>
                                                <td><?php echo $prod[$qury->prd_table.'_shippingcharges'] ?></td>
                                                <td><strong>Delivery Time</strong></td>
                                                <td><?php echo ucwords($prod[$qury->prd_table.'_deliverytime']) ?></td>  
                                            </tr>
											
											<tr>
                                                <td class="border-right"><strong>Discription</strong></td>
                                                <td colspan="3"><?php echo $prod[$qury->prd_table.'_description'] ?></td>
                                                
                                            </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>
										   </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-2">
                                            <?php $select = $qury->selectr("DISTINCT(".$qury->spec_table."_title)",$qury->prefix.$qury->spec_table," WHERE ".$qury->spec_table."_product='".$prod[$qury->prd_table.'_rid']."'");
										foreach($select as $key=>$value)
										{
										echo "<h2>".$value[$qury->spec_table.'_title']."</h2>";	
										$ss = $qury->selectr("*",$qury->prefix.$qury->spec_table," WHERE ".$qury->spec_table."_product='".$prod[$qury->prd_table.'_rid']."' AND ".$qury->spec_table."_title='".$value[$qury->spec_table.'_title']."'");
										foreach($ss as $a=>$r){
										echo "<div class='row'>
										<p class='col-md-2'><strong>".$r[$qury->spec_table.'_key']."</strong></p><p class='col-md-8'> ".$r[$qury->spec_table.'_details']."</p></div>";
										}}
										?>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-3">
                                           <?php $keyfeature = $qury->selectr("*",$qury->prefix.$qury->kspe_table," WHERE ".$qury->kspe_table."_product='".$prod[$qury->prd_table.'_rid']."'");
								if(count($keyfeature) > 0)
								{
								foreach($keyfeature as $key=>$feature)
								{
									echo "<p><strong><i class='fa fa-check'></i> ".$feature[$qury->kspe_table.'_details']."</strong></p>";
								}
								}
								else {
									echo "No Key Feature are available";
								}
								?>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-4">
                                            <?php $defeature = $qury->selectr("*",$qury->prefix.$qury->dspe_table," WHERE ".$qury->dspe_table."_product='".$prod[$qury->prd_table.'_rid']."'");
								if(count($defeature) > 0)
								{
								foreach($defeature as $dd=>$dfeature)
								{
									echo "<p><strong><i class='fa fa-check'></i> ".$dfeature[$qury->dspe_table.'_detail']."</strong></p>";
								}
								}
								else {
									echo "No Details are available";
								}
								?>
                                        </div>
										<div class="tab-pane fade" id="tab2-5">
                                           <table class="table table-striped table-primary">
                                           
                                            <tbody>
                                            
                                            <tr>
                                                <td class="border-right"><strong>Seller Name</strong></td>
                                                <td><?php echo $prod[$qury->prd_table.'_sellername'] ?></td>
                                                
                                            </tr>
											
											 <tr>
                                                <td class="border-right"><strong>Seller Average Rating</strong></td>
                                                <td><?php echo $prod[$qury->prd_table.'_sarating'] ?></td>
                                                
                                            </tr>
											


											
											</tbody></table>
											
                                        </div>
                                    </div>
                                </div><!-- /.panel-body -->
                                <!--/ End tabs content -->
                            </div><!-- /.panel -->
                            <!--/ End double tabs -->
							
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
