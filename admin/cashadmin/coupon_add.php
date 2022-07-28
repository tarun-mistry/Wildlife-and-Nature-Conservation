<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}

if(isset($_REQUEST['UPDATE']))
{
if($_FILES["page_image"]["name"]!='')
{	
$temp = explode(".", $_FILES["page_image"]["name"]);
$extension = end($temp);
$file = 'logo_'.time().'.'.$extension;
move_uploaded_file($_FILES["page_image"]["tmp_name"],"../logo/" . $file);
}
else{
	$file = '';
}
	
$data = array(
$qury->cpn_table.'_promo_id' => $_REQUEST['promo_id'],
$qury->cpn_table.'_offer_id' => $_REQUEST['offer_id'],
$qury->cpn_table.'_offer_name' => $_REQUEST['company'],
$qury->cpn_table.'_title' => $_REQUEST['title'],
$qury->cpn_table.'_category' => $_REQUEST['category'],
$qury->cpn_table.'_code' => $_REQUEST['c_code'],
$qury->cpn_table.'_description' => $_REQUEST['desc'],
$qury->cpn_table.'_link' => $_REQUEST['c_link'],
$qury->cpn_table.'_images' => $file,
$qury->cpn_table.'_date' => $_REQUEST['start_date'],
$qury->cpn_table.'_expiry' => $_REQUEST['end_date']
);
$qury->insertr($qury->prefix.$qury->cpn_table,$data);
//echo "<script>window.location='coupon_add.php?id=1'</script>";
}
?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Create Coupon </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Coupon </li>
                        </ol>
                    </div>
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
						<div class="panel panel-theme">
				<div class="panel-heading">
				<h2 class="panel-title">Coupon Form</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()" enctype = "multipart/form-data"><div class="form-body">
     
	<div class="row">
	<div class="col-md-6">
	 <div class="form-group"><label for="promo_id" class="control-label">
	  Enter Promo Id</label><input name="promo_id" value="" id="promo id" class="form-control rounded" placeholder="Enter Promo Id" type="text">
		</div>
			</div>
	  
	  <div class="col-md-6">
	 <div class="form-group"><label for="offer_id" class="control-label">
	  Enter Offer Id</label><input name="offer_id" value="" id="offer id" class="form-control rounded" placeholder="Enter offer id"  type="text">
		</div>
			</div>
	  </div>

	  
	  <div class="row">
	<div class="col-md-6">
	 <div class="form-group"><label for="company" class="control-label">
	  Company Name</label><input name="company" value="" id="company" class="form-control rounded" placeholder="Enter Company Name" type="text">
		</div>
			</div>
	  
	  <div class="col-md-6">
	 <div class="form-group"><label for="title" class="control-label">
	  Enter Title</label><input name="title" value="" id="title" class="form-control rounded" placeholder="Enter Offer Title"  type="text">
		</div>
			</div>
	  </div>
	  
	  
	  <div class="row">
	<div class="col-md-6">
	 <div class="form-group"><label for="category" class="control-label">
	  Company Category</label>
	  <select name="category" id="category" class="form-control rounded">
	  <?php $c_select = $qury->selectr("*",$qury->prefix.$qury->cpn_table," GROUP BY ".$qury->cpn_table."_category");
	  foreach($c_select as $cc)
	  {
		  echo "<option value='".$cc[$qury->cpn_table.'_category']."'>".$cc[$qury->cpn_table.'_category']."</option>";
	  }
	    echo "<option value='Movies'>Movies</option>";

	  ?>
	  <option value="">Others</option>
	  </select>
		</div>
			</div>
	  
	  <div class="col-md-6">
	 <div class="form-group"><label for="code" class="control-label">
	  Enter Coupon Code</label><input name="c_code" value="" id="Code" class="form-control rounded" placeholder="Enter Coupon Code"  type="text">
		</div>
			</div>
	  </div>
	  
	  <div class="row">
	<div class="col-md-6">
	 <div class="form-group"><label for="desc" class="control-label">
	  Coupon Description</label><textarea name="desc" value="" id="description" class="form-control rounded"></textarea>
		</div>
			</div>
	  
	  <div class="col-md-6">
	 <div class="form-group"><label for="c_link" class="control-label">
	  Coupon Link</label><textarea name="c_link" value="" id="link" class="form-control rounded"></textarea>
		</div>
			</div>
	  </div>
	  
	  
	  <div class="row">
	<div class="col-md-6">
	 <div class="form-group"><label for="start" class="control-label">
	  Start Date</label><input name="start_date" class="form-control" value="2016/07/04" data-date-format="yyyy/mm/dd" id="dp2" type="text">
		</div>
			</div>
	  
	  <div class="col-md-6">
	 <div class="form-group"><label for="end" class="control-label">
	  End Date</label><input name="end_date" class="form-control rounded" value="2016/07/04" data-date-format="yyyy/mm/dd"  type="text">
		</div>
			</div>
	  </div>
		
		
		<div class="form-group">
                                                <label class="control-label">Upload Company Logo </label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
													
													
												
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="page_image" accept="image/*"></span>
                                                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>

                                                </div>
                                            </div>

	
	</div>
	<div class="form-footer">
	<div class="pull-right"><input name="UPDATE" value="UPDATE" class="btn btn-theme mr-5" id="Submit" type="submit"><input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
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