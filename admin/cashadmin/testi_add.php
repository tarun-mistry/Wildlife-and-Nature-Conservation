<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA INSERT SUCCESSFULLY');	
}

if($_REQUEST['id']==2)
{
	array_push($valid->success_msg,'DATA UPDATED SUCCESSFULLY');
}	
}
$name = "CREATE";
$value = "CREATE";

if(isset($_REQUEST['action']))
{
	$name = "UPDATE";
	$value = "UPDATE";
	$cid = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);
	$select = $qury->selectfetch("*",$qury->prefix.$qury->test_table," WHERE ".$qury->test_table."_id='".$cid."'");
}


if(isset($_REQUEST['UPDATE']))
{
	if($_FILES["test_image"]["name"]!='')
{
unlink('../upload/'.$_REQUEST['test_img']);	
$temp = explode(".", $_FILES["test_image"]["name"]);
$extension = end($temp);
$file = 'testi_'.time().'.'.$extension;
move_uploaded_file($_FILES["test_image"]["tmp_name"],"../upload/" . $file);
}
else{
	$file = $_REQUEST['test_img'];
}	
		
$udata = array(
$qury->test_table.'_name' => $_REQUEST['name'],
$qury->test_table.'_profession' => $_REQUEST['profession'],
$qury->test_table.'_image' => $file,
$qury->test_table.'_city' => $_REQUEST['city'],
$qury->test_table.'_content' => $_REQUEST['content']

);
$up = $qury->update($qury->prefix.$qury->test_table,$udata," WHERE ".$qury->test_table."_id='".$_REQUEST['test_id']."'");
if($up)
{
$name = $qury->encrypt_decrypt('encrypt',$_REQUEST['test_id']);
echo "<script>window.location='testi_add.php?id=2&action=edit&name=".$name."'</script>";
}
}

if(isset($_REQUEST['CREATE']))
{
if($_FILES["test_image"]["name"]!='')
{
$temp = explode(".", $_FILES["test_image"]["name"]);
$extension = end($temp);
$file = 'testi_'.time().'.'.$extension;
move_uploaded_file($_FILES["test_image"]["tmp_name"],"../upload/" . $file);
}
else{
	$file = '';
}
	
$data = array(
$qury->test_table.'_name' => $_REQUEST['name'],
$qury->test_table.'_profession' => $_REQUEST['profession'],
$qury->test_table.'_image' => $file,
$qury->test_table.'_city' => $_REQUEST['city'],
$qury->test_table.'_content' => $_REQUEST['content'],
$qury->test_table.'_date' => date('Y-m-d H:i:s'),
$qury->test_table.'_status' => 1,
);
$ins = $qury->insertr($qury->prefix.$qury->test_table,$data);
	
echo "<script>window.location='testi_add.php?id=1'</script>";
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Testimonials </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Testimonial </li>
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
				<h2 class="panel-title">Create Testimonial</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()" enctype = "multipart/form-data"><div class="form-body">
      <div class="form-group"><label for="name" class="control-label">
	 Name</label><input name="name" value="<?php if(isset($_REQUEST['action'])) { echo $select[$qury->test_table."_name"]; }else{ echo '';} ?>" id="name" class="form-control rounded" placeholder="Enter Name " valid="string" type="text">
	 
	 <input name="test_id" value="<?php if(isset($_REQUEST['action'])) { echo $select[$qury->test_table."_id"]; }else{ echo '';} ?>"  type="hidden">
	  <input name="test_img" value="<?php if(isset($_REQUEST['action'])) { echo $select[$qury->test_table."_image"]; }else{ echo '';} ?>"  type="hidden">
	  </div>

	  
	   <div class="form-group"><label for="profession" class="control-label">
	 Profession</label><input name="profession" value="<?php if(isset($_REQUEST['action'])) { echo $select[$qury->test_table."_profession"]; }else{ echo '';} ?>" id="profession" class="form-control rounded" placeholder="Enter User Profession" valid="string" type="text">
	  </div>
	  
	   <div class="form-group"><label for="city" class="control-label">
	 City</label><input name="city" value="<?php if(isset($_REQUEST['action'])) { echo $select[$qury->test_table."_city"]; }else{ echo '';} ?>" id="city" class="form-control rounded" placeholder="Enter User City" valid="string" type="text">
	  </div>
	  
	  
		<div class="form-group"><label for="content" class="control-label">Testimonial Content</label>
		  <textarea name="content" valid="name" id="Page decription" class="form-control" placeholder="Enter Content">
		 <?php if(isset($_REQUEST['action'])) { echo $select[$qury->test_table."_content"]; }else{ echo '';} ?>
		  </textarea>
		</div>
		
		<div class="form-group">
                                                <label class="control-label">Image upload </label>
												
												
								<?php if(isset($_REQUEST['action'])) { echo "<img src='../upload/".$select[$qury->test_table."_image"]."' style='height:70px; width:70px;'>";} ?>
												
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
													
													
													
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="test_image" accept="image/*"></span>
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
<script src="<?php echo $qury->siteurl(); ?>ckeditor/ckeditor.js" type="text/javascript"></script>

