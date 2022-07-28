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

	
$data = array(
$qury->dotd_table.'_description' => $_REQUEST['title'],
$qury->dotd_table.'_title' => $_REQUEST['description'],
$qury->dotd_table.'_url' => $_REQUEST['url'],
$qury->dotd_table.'_imageUrls' => $_REQUEST['image'],
$qury->dotd_table.'_company' => $_REQUEST['company'],
$qury->dotd_table.'_cashback' => $_REQUEST['cashback'],
$qury->dotd_table.'_resolutionType' => 'mid',
$qury->dotd_table.'_availability' => 'LIVE',
$qury->dotd_table.'_date' => date('Y-m-d H:i:s'),

);
$qury->insertr($qury->prefix.$qury->dotd_table,$data);
	
echo "<script>window.location='dotd_add.php?id=1'</script>";
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Create Hot Deal</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Hot Deal</li>
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
				<h2 class="panel-title">Hot Deal Form</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()" enctype = "multipart/form-data"><div class="form-body">
     
	<div class="row">
	<div class="col-md-6">
	 <div class="form-group"><label for="title" class="control-label">
	  Enter Title </label><input name="title" value="" id="title" class="form-control rounded" placeholder="example: watches" type="text">
		</div>
			</div>
	  
	  <div class="col-md-6">
	 <div class="form-group"><label for="Description" class="control-label">
	  Description</label><input name="description" value="" id="description" class="form-control rounded" placeholder="Enter offer id"  type="text">
		</div>
			</div>
	  </div>

	 
	  
	  
	  <div class="row">
	<div class="col-md-6">
	 <div class="form-group"><label for="category" class="control-label">
	  Company</label>
	  <select name="company" id="company" class="form-control rounded">
	  <?php $c_select = $qury->selectr("*",$qury->prefix.$qury->com_table," GROUP BY ".$qury->com_table."_name");
	  foreach($c_select as $cc)
	  {
		  echo "<option value='".$cc[$qury->com_table.'_id']."'>".$cc[$qury->com_table.'_name']."</option>";
	  }
	    

	  ?>
	  
	  </select>
		</div>
			</div>
	  
	  <div class="col-md-6">
	 <div class="form-group"><label for="code" class="control-label">
	  Enter Cashback</label><input name="cashback" value="" id="cashback" class="form-control rounded" placeholder="10"  type="text">
		</div>
			</div>
	  </div>
	  
	  <div class="row">
	<div class="col-md-6">
	 <div class="form-group"><label for="desc" class="control-label">
	  Product url</label><textarea name="url" value="" id="url" class="form-control rounded" placeholder="http://dl.flipkart.com/dl/watches/wrist-watches/pr?filterNone=true&sid=r18%2Cf13&p%5B%5D=sort%3Dpopularity&offer=nb%3Amp%3A05cbf6ab24&affid=aravindar2" ></textarea>
		</div>
			</div>
	  
	  <div class="col-md-6">
	 <div class="form-group"><label for="c_link" class="control-label">
	  Image Url</label><textarea name="image" value="" id="image" class="form-control rounded" placeholder="https://rukminim1.flixcart.com/image/400/400/watch/t/c/g/1016-g-skmei-original-imaegfnpwfetnf3e.jpeg?q=90"></textarea>
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