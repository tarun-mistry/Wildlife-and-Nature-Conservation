<!DOCTYPE html>
<html>
<head>
<title>User Dashboard : </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/custom-sky-forms.css"  type="text/css" media="all" >
<link rel="stylesheet" href="css/sky-forms.css"  type="text/css" media="all" >
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Acme' rel='stylesheet' type='text/css'><!-- //fonts -->

	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->
		<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<style>
.list-group-item{
background:#fff;
}
</style> 
</head>
<body>
<?php include 'header.php';
if(!isset($_SESSION['casUser']))
{
	echo "<script>window.location='index.php'</script>";
}

if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
   {array_push($valid->success_msg,'PROFILE UPDATED SUCCESSFULLY.');	}
if($_REQUEST['id']==2)
  {  array_push($valid->error_msg,' Something went wrong, Please try again.');}	
}

$users = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$_SESSION['casUser']."'");
//$cont = $qury->countq("*",$qury->prefix.$qury->prof_table," WHERE ".$qury->prof_table."_members='".$users['register_id']."'");

if(isset($_REQUEST['UPDATE']))
{
$data = array(
$qury->mem_table.'_name' => $_REQUEST['fname'],
$qury->mem_table.'_lname' => $_REQUEST['lname'],
$qury->mem_table.'_email' => $_REQUEST['email'],
$qury->mem_table.'_contact' => $_REQUEST['contact'],
);
$up = $qury->update($qury->prefix.$qury->mem_table,$data," WHERE ".$qury->mem_table."_id='".$users['members_id']."'");

$pdata = array(
$qury->prof_table.'_email' => $_REQUEST['altemail'],
$qury->prof_table.'_contact' => $_REQUEST['altcontact'],
$qury->prof_table.'_dob' => $_REQUEST['dob'],
$qury->prof_table.'_gender' => $_REQUEST['gender'],
$qury->prof_table.'_designation' => $_REQUEST['designation'],
$qury->prof_table.'_company' => $_REQUEST['company'],
$qury->prof_table.'_country' => $_REQUEST['country'],
$qury->prof_table.'_members' => $users['members_id'],
$qury->prof_table.'_state' => $_REQUEST['state'],
$qury->prof_table.'_city' => $_REQUEST['city'],
$qury->prof_table.'_pincode' => $_REQUEST['pincode'],
$qury->prof_table.'_address' => $_REQUEST['address'],
$qury->prof_table.'_about' => $_REQUEST['about'],
);
$countq = $qury->countq("*",$qury->prefix.$qury->prof_table," WHERE ".$qury->prof_table."_members='".$users['members_id']."'");
if($countq == 0)
{
$qury->insertr($qury->prefix.$qury->prof_table,$pdata);
}
else{
$up = $qury->update($qury->prefix.$qury->prof_table,$pdata," WHERE ".$qury->prof_table."_members='".$users['members_id']."'");	
}
echo "<script>window.location='edit-profile.php?id=1'</script>";
	
}

 ?>

<style>
.list-group-item{
background:#fff;
}
</style> 
<div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Welcome, <?php echo ucwords($users[$qury->mem_table."_fname"]); ?></h1>
            </div>
    </div>
    <!--=== Content Part ===-->
    <div class="container content profile">
    	<div class="row">
            <!--Left Sidebar-->
           <?php include 'sidebar.php'; ?>
            <!--End Left Sidebar-->

            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    <!--Service Block v3-->
                    <div class="row margin-bottom-10">
                    	<?php require_once 'alert.php'; ?>
                        <form novalidate="novalidate" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="sky-form3" class="sky-form" onSubmit="return validate_form()">
                    <header>Edit Profile </header>

                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <label class="label"><span style="color:red;">*</span> First Name</label>
                                <label class="input">
                                    <i class="icon-append fa fa-user"></i>
                                    <input name="fname" value="<?php echo $users[$qury->mem_table.'_fname']; ?>" id="name" type="text" valid="string" required>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="label"><span style="color:red;">*</span> Last Name</label>
                                <label class="input">
                                    <i class="icon-append fa fa-user"></i>
                                    <input name="lname" value="<?php echo $users[$qury->mem_table.'_lname']; ?>"id="last name" type="text" valid="string" required>
                                </label>
                            </section>
                        </div>
						
			<div class="row">
			 <section class="col col-6">
                                <label class="label"><span style="color:red;">*</span> Email</label>
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input name="email" id="email" type="email" value="<?php echo $users[$qury->mem_table.'_email']; ?>" valid="email" required>
                                </label>
                            </section>
                          
                            <section class="col col-6">
                                <label class="label"><span style="color:red;">*</span> Contact</label>
                                <label class="input">
                                    <i class="icon-append fa fa-phone"></i>
                                    <input name="contact" value="<?php echo $users[$qury->mem_table.'_phone']; ?>" maxlength="10" id="contact" type="text" valid="contact" required>
                                </label>
                            </section>
                             </div>
						
					<div class="row">
                            <section class="col col-6">
                                <label class="label"><span style="color:red;">*</span> Date Of Birth</label>
                                <label class="input">
                                    <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="dob" id="date" valid="name" value="<?php echo $users[$qury->mem_table.'_dob']; ?>" required>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="label"><span style="color:red;">*</span> Gender</label>
                                <div class="inline-group">
                                <label class="radio"><input value="Male" name="gender" checked="" type="radio"><i class="rounded-x"></i>Male</label>
                                <label class="radio"><input value="Female" name="gender" type="radio"><i class="rounded-x"></i>Female</label>
                                <label class="radio"><input value="Other" name="gender" type="radio"><i class="rounded-x"></i>Other</label>
                                
                            </div>
                            </section>
                        </div>
						
			
						
						<div class="row">
                            <section class="col col-6">
                                <label class="label"><span style="color:red;">*</span> Country</label>
                                <label class="select">
									<select name="country" id="country" valid="select" required>
									<option value=""> Please Select Country</option>
									<?php $country = $qury->selectr("*",$qury->prefix.$qury->coun_table,"");
									foreach($country as $coun)
									{
										echo "<option value='".$coun[$qury->coun_table.'_id']."' ".$qury->selected( $coun[$qury->coun_table.'_id'],$profile[$qury->prof_table.'_country']).">".$coun[$qury->coun_table.'_name']."</option>";
									}

									?>
									</select>
									<i></i>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="label"><span style="color:red;">*</span> State</label>
                                <label class="select">
                              <select name="state" id="state" valid="select" required>
                              <?php if($cont > 0)
                              {
                              $st_select = $qury->selectr("*",$qury->prefix.$qury->sta_table," WHERE ".$qury->sta_table."_countryid='".$profile[$qury->prof_table.'_country']."'");
                              foreach($st_select as $st)
                              {
                             
										echo "<option value='".$st[$qury->sta_table.'_id']."' ".$qury->selected( $st[$qury->sta_table.'_id'],$profile[$qury->prof_table.'_state']).">".$st[$qury->sta_table.'_region']."</option>"; 
                              }
                              }
                              
                               ?>
                              
                              </select>
                                   <i></i>
                                </label>
                            </section>
                        </div>
						
						<div class="row">
                            <section class="col col-4">
                                <label class="label"><span style="color:red;">*</span> City</label>
                                <label class="input">
                                    <i class="icon-append fa fa-globe"></i>
                                    <input name="city" id="city" valid="name" value="<?php echo $users[$qury->mem_table.'_city']; ?>" type="text" required>
                                </label>
                            </section>
							<section class="col col-2">
                                <label class="label"><span style="color:red;">*</span> Pincode</label>
                                <label class="input">
                                    <i class="icon-append fa fa-globe"></i>
                                    <input name="pincode" id="pincode" type="text" valid="number" maxlength="6" value="<?php echo $users[$qury->mem_table.'_pincode']; ?>" required>
                                </label>
                            </section>
                         </div>
				    </fieldset>

                    <footer>
                        <button type="submit" class="button" name="UPDATE">UPDATE</button>
                    </footer>

                    <div class="message">
                        <i class="rounded-x fa fa-check"></i>
                        <p>Your message was successfully sent!</p>
                    </div>
                </form>

                        
                    </div><!--/end row-->
                    <!--End Service Block v3-->

                    
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div><!--/container-->
    <!--=== End Profile ===-->



    </div><!--/container-->
    <!-- End Content Part -->

   <?php include 'footer.php'; ?>
