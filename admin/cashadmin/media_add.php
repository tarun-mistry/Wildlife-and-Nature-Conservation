<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA INSERT SUCCESSFULLY');	
}

if($_REQUEST['id']==2)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}
$value = 'INSERT';
$name = 'INSERT';
if(isset($_REQUEST['INSERT']))
{

$temp = explode(".", $_FILES["med_image"]["name"]);
$extension = end($temp);
$file = 'media_'.time().'.'.$extension;
move_uploaded_file($_FILES["med_image"]["tmp_name"],"../media/" . $file);


$data = array(
$qury->med_table.'_title' => $_REQUEST['med_title'],
$qury->med_table.'_url' => $_REQUEST['med_url'],
$qury->med_table.'_image' => $file
);
$ins = $qury->insertr($qury->prefix.$qury->med_table,$data);
if($ins)
{
echo "<script>window.location='media_add.php?id=1'</script>";
}

}

if(isset($_REQUEST['action']))
{
$mm = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);
$m_fetch = $qury->selectfetch("*",$qury->prefix.$qury->med_table," WHERE ".$qury->med_table."_id='".$mm."'");
$value ='UPDATE';
$name = 'UPDATE';
}

if(isset($_REQUEST['UPDATE']))
{


$mm = $qury->encrypt_decrypt('decrypt',$_REQUEST['m_name']);

$m_fetch = $qury->selectfetch("*",$qury->prefix.$qury->med_table," WHERE ".$qury->med_table."_id='".$mm."'");

if($_FILES["med_image"]["name"]!='')
{
unlink("../media/".$m_fetch[$qury->med_table."_image"]);
$temp = explode(".", $_FILES["med_image"]["name"]);
$extension = end($temp);
$file = 'sli_'.time().'.'.$extension;
move_uploaded_file($_FILES["med_image"]["tmp_name"],"../upload/" . $file);
}

else{
	$file = $m_fetch[$qury->med_table."_image"];
}

$data = array(
$qury->med_table.'_title' => $_REQUEST['med_title'],
$qury->med_table.'_url' => $_REQUEST['med_url'],
$qury->med_table.'_image' => $file
);

$ins = $qury->update($qury->prefix.$qury->med_table,$data," WHERE ".$qury->med_table."_id='".$mm."'");
if($ins)
{
//exit;	
echo "<script>window.location='media_manage.php'</script>";
}
	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>New/Update Media </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Media </li>
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
				<h2 class="panel-title">Media Form</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()" enctype= "multipart/form-data"><div class="form-body">
      <div class="form-group"><label for="media name" class="control-label">Enter Media Title</label><input name="med_title" value="<?php if(isset($_REQUEST['action'])){ echo $m_fetch[$qury->med_table.'_title'];} else { echo '';} ?>" id="Media title" class="form-control rounded" placeholder="Enter Media Title" valid="string" type="text">
	  <input type="hidden" value="<?php if(isset($_REQUEST['action'])){echo $_REQUEST['name']; }?>" name="m_name" />
	  
	  </div>

	  
	  
		<div class="form-group"><label for="description" class="control-label">Enter Media Url</label>
		  <textarea name="med_url"  id="media link" class="form-control" placeholder="Enter Media Link">
		  <?php if(isset($_REQUEST['action'])) { echo $m_fetch[$qury->med_table.'_url']; } ?>
		  </textarea>
		</div>
		
		<div class="form-group">
                                                <label class="control-label">Image upload </label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
													
													<?php 
													if(isset($_REQUEST['action'])){
													echo "<div class='col-md-4'><img src='../media/".$m_fetch[$qury->med_table.'_image']."' class='img-responsive'></div>"; 
													}
													
												?>
													
                                                    <div>
                                                        <span class="btn btn-info btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="med_image" accept="image/*"></span>
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