<?php require_once 'header.php'; 
if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
{
array_push($valid->success_msg,'DATA UPDATE SUCCESSFULLY');	
}	
}
if(isset($_REQUEST['register']))
{
	try{
$name = $valid->length($valid->check_name($_REQUEST['user_name']),2,50);
$username = $valid->length($valid->check_alphanum($_REQUEST['user_username']),5,10);
$email = $valid->check_email($_REQUEST['user_email']);
$contact = $valid->check_numeric($_REQUEST['user_contact']);
if($valid->get()!=null){
	throw new Exception("Some Error Occur");
}
$data = array(
$qury->mem_table.'_name' => $name,
$qury->mem_table.'_username' => $username,
$qury->mem_table.'_email' => $email,
$qury->mem_table.'_contact' => $contact
);
$q = $qury->update($qury->prefix.$qury->mem_table,$data," WHERE ".$qury->mem_table."_id='".$fetch[$qury->mem_table.'_id']."'");
if($q)
{
echo "<script>window.location='view-profile.php?id=1'</script>";	
}
}
catch(Exception $e)
{
		$e->getMessage();
}	
}

if(isset($_REQUEST['change']))
{
$old = $qury->password($_REQUEST['old_pass']);
$check = $valid->compares($old,$fetch[$qury->mem_table.'_password'],"Invalid Old Password");
if($check == 1)
{
$ch = $valid->compares($_REQUEST['new_pass'],$_REQUEST['cfm_pass'],"New Password And Confirm password does not match");
if($ch == 1)
{
try {
$new = $qury->password($_REQUEST['new_pass']);
$data = array(
$qury->mem_table.'_password' => $new,
);
$q = $qury->update($qury->prefix.$qury->mem_table,$data," WHERE ".$qury->mem_table."_id='".$fetch[$qury->mem_table.'_id']."'");
if(!$q){
 throw new Exception("Some Error Occure");
}
echo "<script>window.location='view-profile.php?id=1'</script>";	 
}
catch (Exception $e)
{
	$e->getMessage();
}	
}	
}	
}
?>

<?php require_once 'sidebar.php'; ?>
            
            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-user"></i>PROFILE SETTING </h2>
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
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="panel panel-theme">
				<div class="panel-heading">
				<h2 class="panel-title">Profile Setting</h2>
				</div>
				<div class="panel-body">
				
				<?php

                 
				 if($valid->get()!=null){
				 
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
      <div class="form-group"><label for="name" class="control-label">Enter Your Name</label><input name="user_name" value="<?php echo $fetch[$qury->mem_table.'_name']; ?>" id="user name" class="form-control rounded" placeholder="Enter Your Name" valid="string" type="text"></div>

	 <div class="form-group"><label for="username" class="control-label">Enter Your Username</label><input name="user_username" value="<?php echo $fetch[$qury->mem_table.'_username']; ?>" id="username" class="form-control rounded" placeholder="Enter UserName" maxlength="10" valid="name" type="text"></div>

 	<div class="form-group"><label for="username" class="control-label">Enter Your Email</label><input name="user_email" value="<?php echo $fetch[$qury->mem_table.'_email']; ?>" id="email" class="form-control rounded" placeholder="Enter Email" maxlength="255" valid="email" type="text"></div>

 	<div class="form-group"><label for="contact" class="control-label">Enter Your Contact Number</label><input name="user_contact" value="<?php echo $fetch[$qury->mem_table.'_contact']; ?>" id="contact" class="form-control rounded" placeholder="Enter Contact number" maxlength="10" valid="contact" type="text"></div>
	
	</div>
	<div class="form-footer">
	<div class="pull-right"><input name="register" value="Register" class="btn btn-theme mr-5" id="Submit" type="submit"><input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
			<div class="clearfix"></div>
			
			</div></form>				
				</div>
				</div>
						</div>
						
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="panel panel-theme">
				<div class="panel-heading">
				<h2 class="panel-title">Password Setting</h2>
				</div>
				<div class="panel-body">
				
				<?php

                 
				 if($valid->get()!=null){
					 $error_msg= $valid->get();
				 }
				 else{
				 $error_msg = $qury->get();
				 }
				 $success_msg = $valid->get_succ();
				 foreach($success_msg as $successs)
				{
					echo '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Success!</strong>'.$successs.' 
                                    </div>';
				}

				foreach($error_msg as $errore)
				{
					echo '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Error!</strong>'.$errore.' 
                                    </div>';
				}
					?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" onSubmit="return validate_form()"><div class="form-body">
      <div class="form-group"><label for="name" class="control-label">Enter  Old Password</label><input name="old_pass" id="old password" class="form-control rounded" placeholder="Enter Your old password" valid="name" type="password"></div>

	 <div class="form-group"><label for="username" class="control-label">Enter New Password</label><input name="new_pass" id="new password" class="form-control rounded" placeholder="Enter New Password" valid="password" type="password"></div>

 	<div class="form-group"><label for="username" class="control-label">Enter Confirm Password</label><input name="cfm_pass" id="Confirm Password" class="form-control rounded" placeholder="Enter Confirm Password" valid="password" type="password"></div>

	
	</div>
	<div class="form-footer">
	<div class="pull-right"><input name="change" value="Change" class="btn btn-theme mr-5" id="Submit" type="submit"><input name="reset" value="Reset" class="btn btn-warning mr-5" id="Reset" type="reset"></div>
			<div class="clearfix"></div>
			
			</div></form>				
				</div>
				</div>
						</div>
					</div>
                    
                </div><!-- /.body-content -->
                <!--/ End body content -->

                
<?php require_once 'footer.php'; ?>