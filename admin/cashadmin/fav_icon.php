<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}
$setting = $qury->website_setting();
$value = 'INSERT';
$name = 'INSERT';
if(isset($_REQUEST['INSERT']))
{
if($_FILES["blog_image"]["name"]!='')
{
$temp = explode(".", $_FILES["blog_image"]["name"]);
$extension = end($temp);
$file = 'fav_'.time().'.'.$extension;
move_uploaded_file($_FILES["blog_image"]["tmp_name"],"../" . $file);
$data = array(
$qury->set_table.'_fav' => $file
);
$up = $qury->update($qury->prefix.$qury->set_table,$data," WHERE ".$qury->set_table."_id='1'");
if($up)
{
	echo "<script>window.location='fav_icon.php'</script>";
}
}
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Favicon Setting</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Favicon</li>
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
				<h2 class="panel-title">Favicon</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" enctype= "multipart/form-data" onSubmit="return validate_form()"><div class="form-body">
      
		<div class="form-group">
                                                <label class="control-label">Image upload </label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
													
													<?php 
													if($setting[$qury->set_table.'_fav']!=''){
													echo "<div class='col-md-4'><img src='../".$setting[$qury->set_table.'_fav']."' class='img-responsive'></div>"; 
													}
													
												?>
													
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="blog_image" accept="image/*"></span>
                                                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>

	
	</div>
	<div class="form-footer">
	<div class="pull-right"><input name="<?php echo $name; ?>" value="<?php echo $value; ?>" class="btn btn-theme mr-5" id="Submit" type="submit"><input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
			<div class="clearfix"></div>
			
			</div></form>				
				</div>
				</div>
						</div>
						

					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>
