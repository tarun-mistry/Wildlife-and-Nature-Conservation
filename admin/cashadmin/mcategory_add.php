<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}

$name ="INSERT";
$value = "INSERT";
if(isset($_REQUEST['INSERT']))
{
$data = array(
$qury->mcat_table.'_name' => $_REQUEST['title'],
	);
$ins = $qury->insertr($qury->prefix.$qury->mcat_table,$data);
if($ins)
{
echo "<script>window.location='mcategory_add.php?id=1'</script>";	
}	
}

if(isset($_REQUEST['action']))
{
	$name = 'UPDATE';
	$value = 'UPDATE';
	 $mid = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);
$fetchh =	$qury->selectfetch("*",$qury->prefix.$qury->mcat_table," WHERE ".$qury->mcat_table."_id='$mid'");
}

if(isset($_REQUEST['UPDATE']))
{

	
$data = array(
$qury->mcat_table.'_name' => $_REQUEST['title'],

);
$qury->update($qury->prefix.$qury->mcat_table,$data," WHERE ".$qury->mcat_table."_id='".$_REQUEST['cid']."'");
	
echo "<script>window.location='mcategory_add.php?id=1'</script>";
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Main Category </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        
                        <ol class="breadcrumb">
                            <li><a href="mcategory_manage.php" class="btn btn-theme mr-5" style="color:#FFF"> Manage Main Category</a></li>
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
				<h2 class="panel-title">Category Form</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()" enctype = "multipart/form-data">
	<div class="form-body">
      <div class="form-group"><label for="menu name" class="control-label">Title</label><input name="title" value="<?php if(isset($_REQUEST['action'])){ echo $fetchh[$qury->mcat_table.'_name'];} ?>" id="question" class="form-control rounded" placeholder="Enter question " valid="name" type="text" />
	  <input type="hidden" name="cid" value="<?php if(isset($_REQUEST['action'])){ echo $fetchh[$qury->mcat_table.'_id'];} ?>" />
	  
	  
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

