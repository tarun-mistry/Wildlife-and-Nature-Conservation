<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}
$setting = $qury->website_setting();
//print_r($setting);
//echo $setting[$qury->set_table.'_website'];


if(isset($_REQUEST['update']))
{

	try{
$name = $_REQUEST['web_name'];
$email = $valid->check_email($_REQUEST['web_email']);
$altemail = $_REQUEST['web_altemail'];
if($_REQUEST['web_altemail'] !='')
{	
$altemail = $valid->check_email($_REQUEST['web_altemail']);
}
$contact = $valid->check_numeric($_REQUEST['web_contact']);
$altcontact = $_REQUEST['web_altcontact'];
if($_REQUEST['web_altcontact'] !='')
{
$altcontact = $valid->check_numeric($_REQUEST['web_altcontact']);	
}
$city = $valid->strip_tag($_REQUEST['web_city']);
$state = $valid->strip_tag($_REQUEST['web_state']);
$address = $valid->strip_tag($valid->check_textarea($_REQUEST['web_address']));
$metakey = $valid->strip_tag($valid->check_textarea($_REQUEST['web_metakey']));
$metades = $valid->strip_tag($valid->htmlentity($_REQUEST['web_metades']));
$facebook = $valid->strip_tag($valid->check_textarea($_REQUEST['web_facebook']));
$twitter = $valid->strip_tag($valid->check_textarea($_REQUEST['web_twitter']));
$linkedin = $valid->strip_tag($valid->check_textarea($_REQUEST['web_linkedin']));
$gplus = $valid->strip_tag($valid->check_textarea($_REQUEST['web_gplus']));
$youtube = $valid->strip_tag($valid->check_textarea($_REQUEST['web_youtube']));
if($valid->get()!=null){

	throw new Exception("Some Error Occur");
}

$data = array(
$qury->set_table.'_website' => $name,
$qury->set_table.'_email' => $email,
$qury->set_table.'_email2' => $altemail,
$qury->set_table.'_contact' => $contact,
$qury->set_table.'_contact1' => $altcontact,
$qury->set_table.'_city' => $city,
$qury->set_table.'_state' => $state,
$qury->set_table.'_address' => $address,
$qury->set_table.'_metakeyword' => $metakey,

$qury->set_table.'_youtube' => $youtube,
$qury->set_table.'_facebook' => $facebook,
$qury->set_table.'_twitter' => $twitter,
$qury->set_table.'_linkedin' => $linkedin,
$qury->set_table.'_gplus' => $gplus,

$qury->set_table.'_metadesc' => $metades
);
$q = $qury->update($qury->prefix.$qury->set_table,$data," ");
if($q)
{
echo "<script>window.location='web_setting.php?id=1'</script>";	
}
}
catch(Exception $e)
{
		$e->getMessage();
}	
}

?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>WEBSITE SETTING </h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li class="active">Profile </li>
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
				<h2 class="panel-title">Web Setting</h2>
				</div>
				<div class="panel-body">
				
				<?php

                 
				 if($valid->get()!='')
				 {
					 $error_msg= $valid->get();
				 }
				 else{
				 $error_msg = $qury->get();
				 }
				 $success_msg = $valid->get_succ();
				 foreach($success_msg as $success)
				{
					echo '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Success!</strong>'.$success.' 
                                    </div>';
				}

				foreach($error_msg as $error)
				{
					echo '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Error!</strong>'.$error.' 
                                    </div>';
				}
					?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()"><div class="form-body">
      <div class="form-group"><label for="name" class="control-label">Website Title</label><input name="web_name" id="Website Title" class="form-control rounded" placeholder="Enter Website Title" valid="name" value="<?php echo $setting[$qury->set_table.'_website']; ?>" type="text"></div>

	 <div class="form-group"><label for="username" class="control-label">Enter Email</label><input name="web_email" value="<?php echo $setting[$qury->set_table.'_email']; ?>" id="Website Email" class="form-control rounded" placeholder="Enter Website Email" type="email"></div>

 	<div class="form-group"><label for="username" class="control-label">Enter Alternate Email</label><input name="web_altemail" value="<?php echo $setting[$qury->set_table.'_email2']; ?>" id="Alternate Email" class="form-control rounded" placeholder="Enter Alternate Email" type="email"></div>

 	<div class="form-group"><label for="contact" class="control-label">Enter Your Contact Number</label><input name="web_contact" value="<?php echo $setting[$qury->set_table.'_contact']; ?>" id="contact" class="form-control rounded" placeholder="Enter Contact number" maxlength="10" valid="contact" type="text"></div>
	
	<div class="form-group"><label for="contact" class="control-label">Enter Alternate Contact Number</label><input name="web_altcontact" value="<?php echo $setting[$qury->set_table.'_contact1']; ?>" id="alternate contact" class="form-control rounded" placeholder="Enter Alternate Contact number" maxlength="10" type="text"></div>
	
	<div class="form-group"><label for="contact" class="control-label">Enter City Name</label><input name="web_city" value="<?php echo $setting[$qury->set_table.'_city']; ?>" id="City name" class="form-control rounded" placeholder="Enter City name" type="text"></div>
	
	<div class="form-group"><label for="contact" class="control-label">Enter State Name</label><input name="web_state" value="<?php echo $setting[$qury->set_table.'_state']; ?>" id="State name" class="form-control rounded" placeholder="Enter State name" type="text"></div>
	
	<div class="form-group"><label for="contact" class="control-label">Enter Address Name</label><textarea name="web_address" id="Address" class="form-control rounded" placeholder="Enter Adress"><?php echo $setting[$qury->set_table.'_address']; ?></textarea></div>
	
	<div class="form-group"><label for="contact" class="control-label">Enter Metakeywords</label><textarea name="web_metakey"  id="Metakeyword" class="form-control rounded" placeholder="Enter Adress" valid="name"><?php echo $setting[$qury->set_table.'_metakeyword']; ?></textarea></div>
	
	<div class="form-group"><label for="contact" class="control-label">Enter Metadescription</label><textarea name="web_metades" id="Metadescriptions" class="form-control rounded" placeholder="Enter Metadescription" valid="name"><?php echo $setting[$qury->set_table.'_metadesc']; ?></textarea></div>
	
	
	<div class="form-group"><label for="facebook" class="control-label">Enter Facebook Url</label><input name="web_facebook" value="<?php echo $setting[$qury->set_table.'_facebook']; ?>" id="S" class="form-control rounded" placeholder="Enter Facebook Url" type="text"></div>
	
	<div class="form-group"><label for="twitter" class="control-label">Enter Twitter Url</label><input name="web_twitter" value="<?php echo $setting[$qury->set_table.'_twitter']; ?>" id="S" class="form-control rounded" placeholder="Enter Twitter Url" type="text"></div>
	
	<div class="form-group"><label for="linkedin" class="control-label">Enter Linkedin Url</label><input name="web_linkedin" value="<?php echo $setting[$qury->set_table.'_linkedin']; ?>" id="S" class="form-control rounded" placeholder="Enter Linkedin Url" type="text"></div>
	
	<div class="form-group"><label for="gplus" class="control-label">Enter G+ Url</label><input name="web_gplus" value="<?php echo $setting[$qury->set_table.'_gplus']; ?>" id="S" class="form-control rounded" placeholder="Enter Gplus Url" type="text"></div>
	
	<div class="form-group"><label for="youtube" class="control-label">Enter Youtube  Url</label><input name="web_youtube" value="<?php echo $setting[$qury->set_table.'_youtube']; ?>" id="S" class="form-control rounded" placeholder="Enter Youtube Url" type="text"></div>
	
	</div>
	<div class="form-footer">
	<div class="pull-right"><input name="update" value="Update" class="btn btn-theme mr-5" id="Submit" type="submit"><input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
			<div class="clearfix"></div>
			
			</div></form>				
				</div>
				</div>
						</div>
						
						
						
						</div>
					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>