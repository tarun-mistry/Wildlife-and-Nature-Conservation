<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}


$rid = $qury->encrypt_decrypt('decrypt',$_REQUEST['report']);
$report = $qury->selectfetch("*",$qury->prefix.$qury->rpt_table," WHERE ".$qury->rpt_table."_id='".$rid."'");

$click = $qury->selectfetch("*",$qury->prefix.$qury->ckactv_table," WHERE ".$qury->ckactv_table."_refid LIKE '".$report[$qury->rpt_table.'_affExparam1']."' AND ".$qury->ckactv_table."_refidsec LIKE '".$report[$qury->rpt_table.'_affExparam2']."'");

if(isset($_REQUEST['add']))
{
$data = array(
$qury->cash_table.'_amount' => $_REQUEST['cashback'],
$qury->cash_table.'_user' => $click[$qury->ckactv_table.'_members'],
$qury->cash_table.'_orderid' => $rid,
$qury->cash_table.'_company' => $report[$qury->rpt_table.'_company'],
$qury->cash_table.'_date' => date('Y-m-d H:i:s'),
$qury->cash_table.'_refid' => $report[$qury->rpt_table.'_affExparam1'],
$qury->cash_table.'_refidsec' => $report[$qury->rpt_table.'_affExparam1']
	);
$qury->insertr($qury->prefix.$qury->cash_table,$data);

echo "<script>window.location='order_reports.php'</script>";
}
?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Cashback Form </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Cashback</li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
					<div class="row">
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="panel panel-theme">
				<div class="panel-heading">
				<h2 class="panel-title">Categories Form</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()"><div class="form-body">
      <div class="form-group"><label for="cashback" class="control-label">Enter Cashback</label><input name="cashback" value="" id="cashback" class="form-control rounded" placeholder="Enter cashback amount" valid="number" type="text">
	  <input type="hidden" name="report" value="<?php echo $_REQUEST['report']; ?>" />
	 
	  
	  </div>

	
	</div>
	<div class="form-footer">
	<div class="pull-right"><input name="add" value="ADD" class="btn btn-theme mr-5" id="Submit" type="submit"><input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
			<div class="clearfix"></div>
			
			</div></form>				
				</div>
				</div>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
<script src="<?php echo $qury->siteurl(); ?>ckeditor/ckeditor.js" type="text/javascript"></script>

