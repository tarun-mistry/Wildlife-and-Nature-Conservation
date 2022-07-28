<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}

$value = 'INSERT';
$name = 'INSERT';
if(isset($_REQUEST['INSERT']))
{
$name = $valid->length($valid->check_name($valid->strip_tag($_REQUEST['menu_name'])),3,16);
$desc = $_REQUEST['menu_desc'];
$loc = $_REQUEST['menu_loc'];

$title = str_replace(' ','-',$name);
if(empty($valid->get()))
{
$type =1;
$parent = 0;	
if($_REQUEST['menu_sub']!='')
{
	$type =2;
	$parent = $_REQUEST['menu_sub'];
}	
/*if($_REQUEST['menu_child']!='')
{
	$type =3;
	$parent = $_REQUEST['menu_child'];
}	*/
$data = array(
$qury->mnu_table.'_name' => $name,
$qury->mnu_table.'_title' => $title,
$qury->mnu_table.'_type' => $type,
$qury->mnu_table.'_description' => $desc,
$qury->mnu_table.'_loc' => 1,
$qury->mnu_table.'_parent' => $parent
);
$ins = $qury->insertr($qury->prefix.$qury->mnu_table,$data);
if($ins)
{
echo "<script>window.location='menus_add.php?id=1'</script>";
}
}
}

if(isset($_REQUEST['action']))
{
$mm = $qury->encrypt_decrypt('decrypt',$_REQUEST['name']);
$m_fetch = $qury->selectfetch("*",$qury->prefix.$qury->mnu_table," WHERE ".$qury->mnu_table."_id='".$mm."'");
$value ='UPDATE';
$name = 'UPDATE';
}

if(isset($_REQUEST['UPDATE']))
{
$name = $valid->length($valid->check_name($valid->strip_tag($_REQUEST['menu_name'])),3,16);
$desc = $_REQUEST['menu_desc'];
$loc = $_REQUEST['menu_loc'];

$title = str_replace(' ','-',$name);
$mm = $qury->encrypt_decrypt('decrypt',$_REQUEST['m_name']);
if(empty($valid->get()))
{
$type =1;
$parent = 0;	
if($_REQUEST['menu_sub']!='')
{
	$type =2;
	$parent = $_REQUEST['menu_sub'];
}	
/*if($_REQUEST['menu_child']!='')
{
	$type =3;
	$parent = $_REQUEST['menu_child'];
}	*/
$data = array(
$qury->mnu_table.'_name' => $name,
$qury->mnu_table.'_title' => $title,
$qury->mnu_table.'_type' => $type,
$qury->mnu_table.'_description' => $desc,
$qury->mnu_table.'_loc' => 1,
$qury->mnu_table.'_parent' => $parent
);
$ins = $qury->update($qury->prefix.$qury->mnu_table,$data," WHERE ".$qury->mnu_table."_id='".$mm."'");
if($ins)
{
//exit;	
echo "<script>window.location='menus_manage.php'</script>";
}
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>Menus Setting </h2>
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
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="panel panel-theme">
				<div class="panel-heading">
				<h2 class="panel-title">Menus Form</h2>
				</div>
				<div class="panel-body">
				
				<?php require_once '../alert.php'; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()"><div class="form-body">
      <div class="form-group"><label for="menu name" class="control-label">Enter Menu Name</label><input name="menu_name" value="<?php if(isset($_REQUEST['action'])){ echo $m_fetch[$qury->mnu_table.'_name'];} else { echo '';} ?>" id="menu name" class="form-control rounded" placeholder="Enter Your Menu Name" valid="string" type="text">
	  <input type="hidden" value="<?php if(isset($_REQUEST['action'])){echo $_REQUEST['name']; }?>" name="m_name" />
	  
	  </div>

	  <div class="form-group"><label for="description" class="control-label">Enter Menu Location(<small style="color:red">Only for grand menus</small>)</label>
		<select name="menu_loc" class="form-control chosen-select" tabindex="2" id="Menu Location">
		<option value="">Select Menu Location</option>
		<option value="1" <?php if(isset($_REQUEST['action'])){ echo $qury->selected($m_fetch[$qury->mnu_table.'_loc'],1);} ?>>Top</option>
		<option value="2" <?php if(isset($_REQUEST['action'])){ echo $qury->selected($m_fetch[$qury->mnu_table.'_loc'],2);} ?>>Bottom</option>
		<option value="3" <?php if(isset($_REQUEST['action'])){ echo $qury->selected($m_fetch[$qury->mnu_table.'_loc'],3);} ?>>Top & Bottom </option>
		</select>
	  </div>
	  
	  
	  <div class="form-group"><label for="parent menu" class="control-label">Select Menu (<small><strong style="color:red">If You want current menu as a submenu please select menu</strong></small>)</label>
	  <select name="menu_sub" class="form-control chosen-select" tabindex="2" id="submenu">
	  <option value=''>Select Parent Menu</option>
	  <?php $parents = $qury->selectr("*",$qury->prefix.$qury->mnu_table," WHERE ".$qury->mnu_table."_status=1 AND ".$qury->mnu_table."_type='1' ORDER BY ".$qury->mnu_table."_name");
	  foreach($parents as $par)
	  {
		  echo "<option value='".$par[$qury->mnu_table.'_id']."' ".$qury->selected($m_fetch[$qury->mnu_table.'_parent'],$par[$qury->mnu_table.'_id']).">".ucwords($par[$qury->mnu_table.'_name'])."</option>";
	  }
	  ?>
	  </select>
	  </div>
	  
	  

	  
		<div class="form-group"><label for="description" class="control-label">Enter Menu Description</label>
		  <textarea name="menu_desc" valid="" id="menu decription" class="form-control ckeditor" placeholder="Enter Menu description">
		  <?php if(isset($_REQUEST['action'])) { echo $m_fetch[$qury->mnu_table.'_description']; } ?>
		  </textarea>
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

