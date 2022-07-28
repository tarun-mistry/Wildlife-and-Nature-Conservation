<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}


$fetchh = $qury->selectfetch("*",$qury->prefix.$qury->page_table," WHERE ".$qury->page_table."_id='3'");

if(isset($_REQUEST['UPDATE']))
{
if($_FILES["page_image"]["name"]!='')
{
unlink('../upload/'.@$fetchh[$qury->page_table.'_image']);	
$temp = explode(".", $_FILES["page_image"]["name"]);
$extension = end($temp);
$file = 'page_'.time().'.'.$extension;
move_uploaded_file($_FILES["page_image"]["tmp_name"],"../upload/" . $file);
}
else{
	$file = $fetchh[$qury->page_table.'_image'];
}
	
$data = array(
$qury->page_table.'_title' => $_REQUEST['title'],
$qury->page_table.'_description' => $_REQUEST['desc'],
$qury->page_table.'_image' => $file,
$qury->page_table.'_status' => 1,
);
$qury->update($qury->prefix.$qury->page_table,$data," WHERE ".$qury->page_table."_id='".$fetchh[$qury->page_table.'_id']."'");
	//$qury->insertr($qury->prefix.$qury->page_table,$data);
echo "<script>window.location='term_condition.php?id=1'</script>";
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Term & Condition</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Page </li>
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
				<h2 class="panel-title">Term & Condition Content</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()" enctype = "multipart/form-data"><div class="form-body">
      <div class="form-group"><label for="menu name" class="control-label">
	  Enter Page Title</label><input name="title" value="<?php echo $fetchh[$qury->page_table.'_title']; ?>" id="menu name" class="form-control rounded" placeholder="Enter Page title " valid="string" type="text">
	  
	  
	  </div>

	  
		<div class="form-group"><label for="description" class="control-label">Enter Page Description</label>
		  <textarea name="desc" valid="name" id="Page decription" class="form-control ckeditor" placeholder="Enter Menu description">
		 <?php echo $fetchh[$qury->page_table.'_description']; ?>
		  </textarea>
		</div>
		
		<div class="form-group">
                                                <label class="control-label">Image upload </label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
													
													<?php 
													if($fetchh[$qury->page_table.'_image']!=''){
													echo "<div class='col-md-4'><img src='../upload/".$fetchh[$qury->page_table.'_image']."' class='img-responsive'></div>"; 
													}
													
												?>
													
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

