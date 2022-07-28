<!DOCTYPE html>
<html>
<head>
<title>Become a Volunteer </title>
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
<link href="css/font-awesome.css" rel="stylesheet"> 

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

</head>
<body>
<?php include 'header.php';

if(isset($_REQUEST['id']))
{
if($_REQUEST['id']==1)
   {array_push($valid->success_msg,'Thank you , We will contact you soon.');	}
if($_REQUEST['id']==2)
  {  array_push($valid->error_msg,' You have already applied , please wait until we proceed your application.');}	
}

if(isset($_REQUEST['submit']))
{
	$users = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$_SESSION['casUser']."'");
	if($_FILES["test_image"]["name"]!='')
{
	$temp = explode(".", $_FILES["test_image"]["name"]);
$extension = end($temp);
$file = 'resume_'.time().'.'.$extension;
//$types = array('image/jpeg', 'image/png', 'image/jpg');
move_uploaded_file($_FILES["test_image"]["tmp_name"],"resume/" . $file);
}
else { $file ="NAN"; }

$pdata = array(
$qury->vol_table.'_username' => $_SESSION['casUser'],
$qury->vol_table.'_phone' => $_REQUEST['phone'],
$qury->vol_table.'_availability' => $_REQUEST['ava'],
$qury->vol_table.'_experience' => $_REQUEST['exp'],
$qury->vol_table.'_resume' => $file,
$qury->vol_table.'_awareness' => $_REQUEST['awa'],
$qury->vol_table.'_collectinginfo' => $_REQUEST['coll'],
$qury->vol_table.'_fundraising' => $_REQUEST['fund'],
);
$countq = $qury->countq("*",$qury->prefix.$qury->vol_table," WHERE ".$qury->vol_table."_username='".$users['register_id']."'");
if($countq == 0)
{
$qury->insertr($qury->prefix.$qury->vol_table,$pdata);
echo "<script>window.location='volunteer.php?id=1'</script>";
}
else{
echo "<script>window.location='volunteer.php?id=2'</script>";
}	
}
	if(isset($_REQUEST['submit2']))
{
$countq = $qury->countq("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_email='".$_REQUEST['email']."'");
if($countq == 0)
{
	  $password = $qury->password($_REQUEST['password']); 
 $name = $_REQUEST['fname'];
  $username= 'user'.$name ; 
 $data = array(
$qury->mem_table.'_fname' => $_REQUEST['fname'],
$qury->mem_table.'_lname' => $_REQUEST['lname'],
$qury->mem_table.'_email' => $_REQUEST['email'],
$qury->mem_table.'_username' => $username,
$qury->mem_table.'_password' => $password,
$qury->mem_table.'_status' => 1
);
$ins = $qury->insertr($qury->prefix.$qury->mem_table,$data);
if($ins)
{
$fetch = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_email='".$_REQUEST['email']."' ");
$_SESSION['casUser'] = $fetch['register_id'];
$uname =  $fetch['register_id'];
}}
else{
 $fetch = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_email='".$_REQUEST['email']."' ");
$_SESSION['casUser'] = $fetch['register_id'];
	$uname =  $fetch['register_id'];
}
if($_FILES["test_image"]["name"]!='')
{
	$temp = explode(".", $_FILES["test_image"]["name"]);
$extension = end($temp);
$file = 'resume_'.time().'.'.$extension;
$types = array('application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
move_uploaded_file($_FILES["test_image"]["tmp_name"],"resume/" . $file);
}
else { $file ="NAN"; }

$pdata = array(
$qury->vol_table.'_username' => $uname,
$qury->vol_table.'_phone' => $_REQUEST['phone'],
$qury->vol_table.'_availability' => $_REQUEST['ava'],
$qury->vol_table.'_experience' => $_REQUEST['exp'],
$qury->vol_table.'_resume' => $file,
$qury->vol_table.'_awareness' => $_REQUEST['awa'],
$qury->vol_table.'_collectinginfo' => $_REQUEST['coll'],
$qury->vol_table.'_fundraising' => $_REQUEST['fund'],
);
$countq = $qury->countq("*",$qury->prefix.$qury->vol_table," WHERE ".$qury->vol_table."_username='".$uname."'");
if($countq == 0)
{
$qury->insertr($qury->prefix.$qury->vol_table,$pdata);
echo "<script>window.location='volunteer.php?id=1'</script>";
}
else{
echo "<script>window.location='volunteer.php?id=2'</script>";
}	

}

?>

<div class="col-md-8" style="margin:60px auto;width:100%;">
 <div class="container">
 <h3 class="title" >Become <span>A Volunteer </span></h3>
<div class="col-md-6" style="padding:10px 20px;">
  <h2 >What we Do : </h2>
							<ul style="list-style:none;line-height:28px;">
									<li><strong>About :</strong> This volunteer program involves working alongside our Wildlife Keepers on their daily rounds, assisting them with the care of animals, and within the Presentations Department (this team manages the daily shows that educate the public about wildlife and conservation). <br><br> &nbsp;&nbsp;The rounds that volunteers can work on include: mammals, birds, reptiles, Presentations, Wild Experiences, sheep shearing assistant. The range of mammals, birds and reptiles is extensive, and includes a huge variety of  native fauna.</li>
									</ul>
									
		<div class="grid-categories">
					<h4>How you can Help Us :</h4>
					<ul class="popular">
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>Food preparation, washing dishes and participating in feeding the animals.</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>Cleaning and assisting with refurbishing animal enclosures.</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>Raking and sweeping is a substantial part of this role, so be prepared for a &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;physical day.</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>Assisting the keepers with other duties.</a></li>
					</ul>
				</div>							
							</div>
<div class="col-md-6" style="margin:20px auto;padding:0 40px 0 60px;width:45%;border-left:1px solid #eee;">
 <div class="headline"><h2>Apply Now  </h2></div>
 <?php require_once 'alert.php'; ?>
 <?php if(isset($_SESSION['casUser'])){?>
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" style="box-shadow:none;" class="sky-form contact-style" onSubmit="return validate_form()" enctype = "multipart/form-data"><div class="form-body">
  
	   <div class="form-group"><label for="city" class="control-label"><span style="color:red;">* </span>Phone No</label>
	<input name="phone" id="phone" class="form-control rounded" placeholder="Enter Your Contact No." type="number" required>
	  </div>
	  
	   <div class="form-group">
                                <label class="control-label"><span style="color:red;"></span>Please specify your Availibity</label>
                                <div class="inline-group">
                                <label class="radio"><input value="1" name="ava" checked="" type="radio"><i class="rounded-x"></i>Weekly </label>
                                <label class="radio"><input value="2" name="ava" type="radio"><i class="rounded-x"></i>Monthly </label>
                                <label class="radio"><input value="3" name="ava" type="radio"><i class="rounded-x"></i>Whenever Required</label>
                          </div>      
                            </div>
	<div class="form-group"><label for="content" class="control-label">Experience  <span class="color-red">*</span></label>
  <textarea name="exp" id="exp" class="form-control" placeholder="Enter Experience" required> </textarea>
	</div>

	<div class="form-group">
    <label class="control-label">Resume  <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image" accept="resume/*" class="btn btn-file btn-info" ></span>
                                                 </div>

		  <div class="form-group">
                                <label class="control-label"><span style="color:red;">*</span> Spreading Awarness</label>
                                <div class="inline-group">
                                <label class="radio"><input value="1" name="awa" type="radio"><i class="rounded-x"></i> Yes </label>
                                <label class="radio"><input value="2" name="awa" checked=""  type="radio"><i class="rounded-x"></i> No</label>
                          </div>      
                            </div>

  <div class="form-group">
                                <label class="control-label"><span style="color:red;">*</span> Information Collection </label>
                                <div class="inline-group">
                                <label class="radio"><input value="1" name="coll" type="radio"><i class="rounded-x"></i> Yes </label>
                                <label class="radio"><input value="2" name="coll" checked=""type="radio"><i class="rounded-x"></i> No</label>
                                 </div>      
                            </div>

  <div class="form-group">
                                <label class="control-label"><span style="color:red;">*</span> Fund Raising</label>
                                <div class="inline-group">
                                <label class="radio"><input value="1" name="fund" type="radio"><i class="rounded-x"></i> Yes</label>
                                <label class="radio"><input value="2" name="fund" checked="" type="radio"><i class="rounded-x"></i> No</label>
                                </div>     
                            </div>							
	  </div>
                                           
	</div>
	<div class="form-footer">
<div class="pull-left">
   <input name="submit" value="SUBMIT" class="btn btn-theme mr-5" id="Submit" type="submit" style="background-color:#c0392b;color:#fff;border:none;padding:8px 15px;margin:20px 5px;">
   <input name="reset" value="RESET" class="btn btn-warning mr-5" id="Reset" type="reset" style="background-color:#c0392b;color:#fff;border:none;padding:8px 15px ;margin:20px 5px;">
</div>
	
	<div class="clearfix"></div>
 </div></form>  <?php } 
 else{ ?>
	 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" style="box-shadow:none;" class="sky-form contact-style" onSubmit="return validate_form()" enctype = "multipart/form-data"><div class="form-body">
 						
 <div class="form-group"><label for="fname" class="control-label"><span style="color:red;">* </span>First Name</label>
	<input type="text" name="fname"  placeholder="First Name " required  id="fname" class="form-control rounded" >
	  </div>

 <div class="form-group"><label for="lname" class="control-label"><span style="color:red;">* </span>Last Name</label>
	<input type="text" name="lname"  placeholder="Last Name" required id="lname" class="form-control rounded" >
	  </div>

 <div class="form-group"><label for="email" class="control-label"> <span style="color:red;">* </span>Email-Id (You will be able to login through this Id) </label>
	<input name="email" placeholder="Email-ID" required id="email" class="form-control rounded" placeholder="Enter User Email-ID" type="email">
	  </div>

 <div class="form-group"><label for="pass" class="control-label"><span style="color:red;">* </span> Password ( Password to login in your account. )</label>
	<input type="password" name="password" placeholder="Password" required  id="pass" class="form-control rounded" >
	  </div>

   <div class="form-group"><label for="phone" class="control-label"><span style="color:red;">* </span>Phone No</label>
	<input name="phone" id="phone" class="form-control rounded" placeholder="Enter Your Contact No." type="number" required>
	  </div>
	  
	   <div class="form-group">
                                <label class="control-label"><span style="color:red;"></span>Please specify your Availibity</label>
                                <div class="inline-group">
                                <label class="radio"><input value="1" name="ava" checked="" type="radio"><i class="rounded-x"></i>Weekly </label>
                                <label class="radio"><input value="2" name="ava" type="radio"><i class="rounded-x"></i>Monthly </label>
                                <label class="radio"><input value="3" name="ava" type="radio"><i class="rounded-x"></i>Whenever Required</label>
                          </div>      
                            </div>
	<div class="form-group"><label for="content" class="control-label">Experience  <span class="color-red">*</span></label>
  <textarea name="exp" id="exp" class="form-control" placeholder="Enter Experience" required> </textarea>
	</div>

	<div class="form-group">
    <label class="control-label">Resume  <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image" accept="resume/*" class="btn btn-file btn-info" ></span>
                                                 </div>

		  <div class="form-group">
                                <label class="control-label"><span style="color:red;">*</span> Spreading Awarness</label>
                                <div class="inline-group">
                                <label class="radio"><input value="1" name="awa" type="radio"><i class="rounded-x"></i> Yes </label>
                                <label class="radio"><input value="2" name="awa" checked=""  type="radio"><i class="rounded-x"></i> No</label>
                          </div>      
                            </div>

  <div class="form-group">
                                <label class="control-label"><span style="color:red;">*</span> Information Collection </label>
                                <div class="inline-group">
                                <label class="radio"><input value="1" name="coll" type="radio"><i class="rounded-x"></i> Yes </label>
                                <label class="radio"><input value="2" name="coll" checked=""type="radio"><i class="rounded-x"></i> No</label>
                                 </div>      
                            </div>

  <div class="form-group">
                                <label class="control-label"><span style="color:red;">*</span> Fund Raising</label>
                                <div class="inline-group">
                                <label class="radio"><input value="1" name="fund" type="radio"><i class="rounded-x"></i> Yes</label>
                                <label class="radio"><input value="2" name="fund" checked="" type="radio"><i class="rounded-x"></i> No</label>
                                </div>     
                            </div>							
	  </div>
                                           
	</div>
	<div class="form-footer">
<div class="pull-left">
   <input name="submit2" value="SUBMIT" class="btn btn-theme mr-5" id="Submit2" type="submit" style="background-color:#c0392b;color:#fff;border:none;padding:8px 15px;margin:20px 5px;">
   <input name="reset" value="RESET" class="btn btn-warning mr-5" id="Reset" type="reset" style="background-color:#c0392b;color:#fff;border:none;padding:8px 15px ;margin:20px 5px;">
</div>
	
	<div class="clearfix"></div>
 </div></form>
	 
 <?php }?>				
				</div><!----Container div-->
</div><!----col-md-8 div-->
</div><!----home div-->
<div class="clearfix"></div>
 
	<!-- choose -->
		<div class="w3-agileits-choose">
			<div class="container">
				<div class="agileits-about-top-heading agileits-w3layouts-choose-heading">
					<h3>Why choose us?</h3>
				</div>
				<div class="agile-choose-grids">
					<div class="col-sm-4 agile-choose-grid">
						<div class="choose-icon">
							<i class="fa fa-user" aria-hidden="true"></i>
						</div>
						<div class="choose-info">
							<h4>Volunteering can be a rewarding way of giving back something to the Indian wildlife. It is also a valuable step into working with wildlife as a living. It provides an understanding of the environment and in some cases specific training that could impress future employers with WNC.</h4>
						</div>
					</div>
					<div class="col-sm-4 agile-choose-grid">
						<div class="choose-icon">
							<i class="fa fa-cogs" aria-hidden="true"></i>
						</div>
						<div class="choose-info">
							<h4>We get a lot of students or postgraduates trying to bolster their CV's. Some people just come for the social aspects others for the training. While some projects require a level of skill in a particular area, many offer training and there are lots of schemes where all that's needed is enthusiasm and some time.</h4>
						</div>
					</div>
					<div class="col-sm-4 agile-choose-grid">
						<div class="choose-icon">
							<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
						</div>
						<div class="choose-info">
							<h4>Volunteering activities can range from practical research to office work; acting as a wildlife guide; producing media content or supplying volunteers with tea and cake at large events. Some volunteers give their time to very hands-on activities to help the environment, such as litter-picking or clearing up waterways.</h4>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<!-- //choose --> 
<div class="clearfix"></div>
<div class="col-md-8" style="margin:20px auto;width:100%;float:none;">
					<div class="agileits-about-top">
			<div class="container">
				<div class="agileits-about-top-heading">
					<h3 class="title">Our <span>Volunteers</span></h3>
				</div>
				<div class="agileinfo-top-grids">
					<div class="col-sm-4 wthree-top-grid">
						<img src="images/v1.jpg" alt="" />
						<h4>Vijay Kahar</h4>
						<p>I am involved in wide range of activities such as conducting environmental awareness programmes and assisting WNC in the management of Wildlife and Nature Conseravtion.</p>
		
					</div>
					<div class="col-sm-4 wthree-top-grid">
						<img src="images/v2.jpg" alt="" />
						<h4>Sunny Yang</h4>
						<p>I am involved with my keen interest and full motivation in all the activities and awareness camps which are organized by WNC. I, being an animal lover, feeling fortunate that I am able to do something for these loving creatures via animal awareness programmes, Wildlife Smuggling programmes conducted by WNC.</p>
					</div>
					<div class="col-sm-4 wthree-top-grid">
						<img src="images/v3.png" alt="" />
						<h4>Anonymous</h4>
						<p>______________________________________________________________
						_________________________________________________________________
						_________________________________________________________________
						_________________________________________________________________</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //about-top -->
</div>                   

	<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

<?php include 'footer.php';?>
</body>
</html>

