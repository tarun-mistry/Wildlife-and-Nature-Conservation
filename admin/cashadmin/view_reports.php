<?php require_once 'header.php'; 

if(isset($_REQUEST['name']))
{
	$mid = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);
	
$rpt = $qury->selectfetch("*",$qury->prefix.$qury->rpt_table," WHERE ".$qury->rpt_table."_id='".$mid."'");
$clk = $qury->selectfetch("*",$qury->prefix.$qury->ckactv_table," WHERE ".$qury->ckactv_table."_refid='".$rpt[$qury->rpt_table.'_affExparam1']."'");

$members = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$clk[$qury->ckactv_table.'_members']."'");

$profile = $qury->selectfetch("*",$qury->prefix.$qury->prof_table," WHERE ".$qury->prof_table."_members='".$clk[$qury->ckactv_table.'_members']."'");
	
}


?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>View Order</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Order </li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
						<table class="table-reponsive table table-theme table-bordered">
						<thead>
						<tr><th colspan="3">Order Reports</th> <th><a href="cashback.php?report=<?php echo $qury->encrypt_decrypt('encrypt',$rpt[$qury->rpt_table.'_id']); ?>" class="btn btn-danger">Add Cashback</a> </th></tr>
						</thead>
						<tbody>
						<tr><td><strong>OrderId</strong></td> <td><?php echo $rpt[$qury->rpt_table.'_aforderitemid']; ?></td> <td><strong>Order Date</strong></td><td><?php echo $rpt[$qury->rpt_table.'_orderdate']; ?></td></tr>
						
						<tr><td><strong>Product Id</strong></td> <td><?php echo $rpt[$qury->rpt_table.'_productid']; ?></td> <td><strong>Title</strong></td><td><?php echo $rpt[$qury->rpt_table.'_title']; ?></td></tr>
						
						<tr><td><strong>Category</strong></td> <td><?php echo $rpt[$qury->rpt_table.'_category']; ?></td> <td><strong>Price</strong></td><td><?php echo $rpt[$qury->rpt_table.'_price']; ?></td></tr>
						
						<tr><td><strong>Quantity</strong></td> <td><?php echo $rpt[$qury->rpt_table.'_quantity']; ?></td> <td><strong>Sale Amount</strong></td><td><?php echo $rpt[$qury->rpt_table.'_sales']; ?></td></tr>
						
						<tr><td><strong>Status</strong></td> <td><?php echo $rpt[$qury->rpt_table.'_status']; ?></td> <td><strong>Merchant</strong></td><td><?php echo $rpt[$qury->rpt_table.'_company']; ?></td></tr>
						
						<tr><td><strong>Commision</strong></td> <td><?php echo $rpt[$qury->rpt_table.'_commision']; ?></td> <td><strong>Commision Rate</strong></td><td><?php echo $rpt[$qury->rpt_table.'_commisionrate']; ?></td></tr>
						
						<tr><td><strong>AffExtParam1</strong></td> <td><?php echo $rpt[$qury->rpt_table.'_affExparam1']; ?></td> <td><strong>AffExtParam2</strong></td><td><?php echo $rpt[$qury->rpt_table.'_affExparam2']; ?></td></tr>
						
						<tr><td><strong>Sales Channel</strong></td> <td><?php echo $rpt[$qury->rpt_table.'_channel']; ?></td> <td><strong>Customer Type</strong></td><td><?php echo $rpt[$qury->rpt_table.'_customertype']; ?></td></tr>
						
						</tbody>
						<tfoot>
                                        <tr>
                                            <th colspan="4"></th>
                                            
                                        </tr>
                                    </tfoot>
						</table>
						</div>
						</div>
						
						<br/><br/>
						<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
						<table class="table-reponsive table table-theme table-bordered">
						<thead>
						<tr><th colspan="4">CashBack Detail</th></tr>
						</thead>
						<tbody>
						<?php $cash = $qury->selectfetch("*",$qury->prefix.$qury->cash_table," WHERE ".$qury->cash_table."_orderid='".$mid."'"); ?>
						<tr><td><strong>Amount </strong></td> <td><?php echo $cash[$qury->cash_table.'_amount']; ?></td> <td><strong>Date</strong></td>  <td><?php echo $cash[$qury->cash_table.'_date']; ?></td> </tr>
						</tbody>
						<tbody>
						

						
						</tbody>
						<tfoot>
                                        <tr>
                                            <th colspan="4"></th>
                                            
                                        </tr>
                                    </tfoot>
						</table>
						</div>
						</div>
						
						<br/><br/>
						<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
						<table class="table-reponsive table table-theme table-bordered">
						<thead>
						<tr><th colspan="4">Member Profile</th></tr>
						</thead>
						<tbody>
						<tr><td><strong>Name </strong></td> <td><?php echo ucwords($members[$qury->mem_table.'_name']); ?></td> <td><strong>Username</strong></td>  <td><?php echo ucwords($members[$qury->mem_table.'_username']); ?></td> </tr>
						</tbody>
						<tbody>
						<tr><td><strong>Email </strong></td> <td><?php echo $members[$qury->mem_table.'_email']; ?></td> <td><strong>Alternate Email</strong></td>  <td><?php echo $profile[$qury->prof_table.'_username']; ?></td> </tr>
						
						<tr><td><strong>Contact </strong></td> <td><?php echo $members[$qury->mem_table.'_contact']; ?></td> <td><strong>Alternate Contact</strong></td>  <td><?php echo $profile[$qury->prof_table.'_contact']; ?></td> </tr>
						
						<tr><td><strong>Country </strong></td> <td><?php echo $profile[$qury->prof_table.'_country']; ?></td> <td><strong>State</strong></td>  <td><?php echo $profile[$qury->prof_table.'_state']; ?></td> </tr>
						
						<tr><td><strong>City </strong></td> <td><?php echo $profile[$qury->prof_table.'_city']; ?></td> <td><strong>Address</strong></td>  <td><?php echo $profile[$qury->prof_table.'_address'].' - '.$profile[$qury->prof_table.'_pincode']; ?></td> </tr>
						
						<tr><td><strong>Joindate </strong></td> <td><?php echo $members[$qury->mem_table.'_joindate']; ?></td> <td><strong>Last Login</strong></td>  <td><?php echo $members[$qury->mem_table.'_lastlogin']; ?></td> </tr>
						
						
						</tbody>
						<tfoot>
                                        <tr>
                                            <th colspan="4"></th>
                                            
                                        </tr>
                                    </tfoot>
						</table>
						</div>
						</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
