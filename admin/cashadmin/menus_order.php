<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}
if(isset($_REQUEST['ord_id']))
{
foreach($_REQUEST['ord_id'] as $key=>$orid)
{
$data =array(
$qury->mnu_table.'_order' => $_REQUEST['orders'][$key]
);	
$qury->update($qury->prefix.$qury->mnu_table,$data," WHERE ".$qury->mnu_table."_id='".$orid."'");
}
}


?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Menus Orders </h2>
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
						<div class="panel panel-theme">
				<div class="panel-heading">
				<h2 class="panel-title">Menus Order Setting</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()"><div class="form-horizontal form-bordered">
      <div class="form-body">
	  <?php $menu_orders = $qury->selectr("*",$qury->prefix.$qury->mnu_table," WHERE ".$qury->mnu_table."_type='1' AND ".$qury->mnu_table."_status=1 ORDER BY ".$qury->mnu_table."_order");
	  foreach($menu_orders as $order)
	  {
	  echo '<div class="col-md-4 col-sm-6 col-xs-12">
	  <div class="form-group">
                                                <label for="firstname-1" class="col-sm-8 control-label">'.ucwords($order[$qury->mnu_table."_name"]).'</label>
                                                <div class="col-sm-4">
												<input type="hidden" name="ord_id[]" value="'.$order[$qury->mnu_table."_id"].'" />
                                                    <input class="form-control input-sm" name="orders[]" id="firstname-1" value="'.$order[$qury->mnu_table."_order"].'" type="text">
                                                </div>
                                            </div>
	  </div>';
	  } ?>
	  
	  </div>
	  <div class="form-footer">
	<div class="pull-right"><input name="Change" value="Change" class="btn btn-theme mr-5" id="Submit" type="submit"><input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
			<div class="clearfix"></div>
			
			</div>
	  </form>				
				</div>
				</div>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
