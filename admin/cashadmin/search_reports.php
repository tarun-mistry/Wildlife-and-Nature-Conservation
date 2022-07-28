<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'STATUS UPDATE SUCCESSFULLY');	
}	
if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'Transaction DELETED SUCCESSFULLY');	
}	
}

if(isset($_REQUEST['search']))
{
if($_REQUEST['merchant']=='flipkart')
{

include "../flipkart/flipkartclass.php";

$db =  new cashfunct();
date_default_timezone_set('Asia/Kolkata');

//Replace <affiliate-id> and <access-token> with the correct values
$flipkart = new Flipkart("anjanikum", "359ab110a5d84121a199fbc65e82a6b5", "json");
 $report_url = 'https://affiliate-api.flipkart.net/affiliate/report/orders/detail/json?startDate='.$_REQUEST["sdate"].'&endDate='.$_REQUEST["edate"].'&status='.$_REQUEST["status"].'&offset=0';
$details = $flipkart->call_url($report_url);
$details = json_decode($details, TRUE);
$list = $details['orderList'];
$count = count($list);
$i = 0;

while($i < $count)
{
$data = array( 
$qury->rpt_table."_price" => $list[$i]['price'],
$qury->rpt_table."_category" => $list[$i]['category'],
$qury->rpt_table."_title" => $list[$i]['title'],
$qury->rpt_table."_productid" => $list[$i]['productId'],
$qury->rpt_table."_quantity" => $list[$i]['quantity'],
$qury->rpt_table."_sales" => $list[$i]['sales']['amount'],
$qury->rpt_table."_status" => $list[$i]['status'],
$qury->rpt_table."_aforderitemid" => $list[$i]['affiliateOrderItemId'],
$qury->rpt_table."_orderdate" => $list[$i]['orderDate'],
$qury->rpt_table."_commisionrate" => $list[$i]['commissionRate'],
$qury->rpt_table."_commision" => $list[$i]['tentativeCommission']['amount'],
$qury->rpt_table."_affExparam1" => $list[$i]['affExtParam1'],
$qury->rpt_table."_affExparam2" => $list[$i]['affExtParam2'],
$qury->rpt_table."_channel" => $list[$i]['salesChannel'],
$qury->rpt_table."_customertype" => $list[$i]['customerType'],
$qury->rpt_table."_company" => $_REQUEST['merchant']
);
$rcount = $qury->countq("*",$qury->prefix.$qury->rpt_table," WHERE ".$qury->rpt_table."_affExparam1='".$list[$i]['affExtParam1']."' AND ".$qury->rpt_table."_aforderitemid='".$list[$i]['affiliateOrderItemId']."'");
if($rcount == 0)
{
$qury->insertr($qury->prefix.$qury->rpt_table,$data);
}
else{
$qury->update($qury->prefix.$qury->rpt_table,$data," WHERE ".$qury->rpt_table."_affExparam1='".$list[$i]['affExtParam1']."' AND ".$qury->rpt_table."_aforderitemid='".$list[$i]['affiliateOrderItemId']."'");	
}
$i++;
if($i==$count)
{
echo "<script>window.location='search_reports.php'</script>";	
}
}

}	
}

?>
<style>
#Submit{
	margin-top:25px;
}
</style>
<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Search Reports </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Report </li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
				
				<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-theme">
				<div class="panel-heading">
				<h2 class="panel-title">Searching</h2>
				</div>
				<div class="panel-body">
				<form id="dp" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" accept-charset="utf-8">
				<div class="form_body">
				<div class="col-md-3">
				<div class="form_group"><label for="Start Date" class="form_label">Start Date</label><input class="form-control" value="2016-01-01" data-date-format="yyyy-mm-dd" id="dp2" name="sdate" type="text"></div></div>
				
				<div class="col-md-3">
				<div class="form_group"><label for="Sender Id" class="form_label">End Date</label><input class="form-control" value="2016-03-08" data-date-format="yyyy-mm-dd" id="dp3" name="edate" type="text"></div>
				</div>
				
				<div class="col-md-2">
				<div class="form_group"><label for="merchant" class="form_label">Merchant</label>
				<select class="form-control" name="merchant"> 
				<option value="flipkart">Flipkart</option>
				
				</select>
				</div>
				</div>
				
				<div class="col-md-2">
				<div class="form_group"><label for="status" class="form_label">Status</label>
				<select class="form-control" name="status"> 
				<option value="approved">Approved</option>
				<option value="cancelled">Cancelled</option>
				<option value="disapproved">Disapproved</option>
				<option value="tentative">Tentative</option>
				</select>
				</div>
				</div>
				
				
				
				<div class="col-md-2" id="search">
				<div class="form_group"><label for="search" class="form_label"></label><input name="search" value="SEARCH" class="btn btn-theme mr-5" id="Submit" type="submit"></div>
				</div>
				</div></form>				
				</div></div>
				</div>
				</div>
				
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php include '../alert.php'; ?>
						<div class="table-responsive mb-20">
                                <table class="table table-striped table-theme table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="text-center border-right">SNo</th>
                                            <th>Title</th>
											<th>Category</th>
											<th>ProductId</th>
											<th>Merchant</th>
											<th>Amount</th>
											<th>Commision</th>
											<th>Commision Rate</th>
											<th>Status</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1; 
									
									$page = $qury->pagination("*",$qury->rpt_table,20,$_SERVER['PHP_SELF'],"","");
									
									$rpt_select = $qury->selectr("*",$qury->prefix.$qury->rpt_table," ORDER BY ".$qury->rpt_table."_id DESC $page[0]");
										foreach($rpt_select as $rpt)
										{
										
											echo "<tr><td>".$i."</td><td>".ucwords($rpt[$qury->rpt_table.'_title'])."</td><td> ".ucwords($rpt[$qury->rpt_table.'_category'])."</td><td>".$rpt[$qury->rpt_table.'_productid']."</td><td>".$rpt[$qury->rpt_table.'_company']."</td><td>".$rpt[$qury->rpt_table.'_sales']."</td><td>".$rpt[$qury->rpt_table.'_commision']."</td><td>".$rpt[$qury->rpt_table.'_commisionrate']."</td><td>".$rpt[$qury->rpt_table.'_status']."</td><td> <a  href='view_reports.php?action=view&name=".$qury->encrypt_decrypt('encrypt',$rpt[$qury->rpt_table.'_id'])."' class='btn btn-push btn-info btn-xs'><i class='fa fa-eye'></i></a> </td></tr>";
											
										$i++;
										}
									
									?>
									</tbody>
                                    <tfoot>
                                        <tr>
                                           <th class="text-center border-right">SNo</th>
                                            <th>Title</th>
											<th>Category</th>
											<th>ProductId</th>
											<th>Merchant</th>
											<th>Amount</th>
											<th>Commision</th>
											<th>Commision Rate</th>
											<th>Status</th>
                                           <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
							
							<ul class="pagination"><?php echo $page[1]; ?></ul>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
