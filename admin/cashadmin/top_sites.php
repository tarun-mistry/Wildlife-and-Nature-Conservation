<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'Site Create Successfully');	
}
if($_REQUEST['id']==2)
{
array_push($valid->error_msg,'Please Upload Image');	
}
}



if(isset($_REQUEST['CREATE']))
{
if($_FILES["page_image"]["name"]!='')
{
	
$temp = explode(".", $_FILES["page_image"]["name"]);
$extension = end($temp);
$file = 'page_'.time().'.'.$extension;
move_uploaded_file($_FILES["page_image"]["tmp_name"],"../logo/" . $file);


	
$data = array(
$qury->com_table.'_name' => $_REQUEST['title'],
$qury->com_table.'_link' => trim($_REQUEST['desc']),
$qury->com_table.'_image' => $file,
$qury->com_table.'_status' => 4,
);
$qury->insertr($qury->prefix.$qury->com_table,$data);
	
//echo "<script>window.location='top_sites.php?id=1'</script>";
}

else{
echo "<script>window.location='top_sites.php?id=2'</script>";		
}
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Top Sites</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Website Details </li>
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
				<h2 class="panel-title">Create New Site</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()" enctype = "multipart/form-data"><div class="form-body">
      <div class="form-group"><label for="menu name" class="control-label">
	  Title</label><input name="title" value="" id="menu name" class="form-control rounded" placeholder="title " valid="name" type="text">
	  
	  
	  </div>

	  
		<div class="form-group"><label for="description" class="control-label">Enter Website Link</label>
		  <textarea name="desc" valid="name" id="link" class="form-control">
		 
		  </textarea>
		</div>
		
		<div class="form-group">
                                                <label class="control-label">Image upload </label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
													
													
													
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="page_image" accept="image/*" required></span>
                                                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>

                                                </div>
                                            </div>

	
	</div>
	<div class="form-footer">
	<div class="pull-right"><input name="CREATE" value="CREATE" class="btn btn-theme mr-5" id="Submit" type="submit"><input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
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

