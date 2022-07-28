<!DOCTYPE html>
<html>
<head>
<title>Add Event : </title>
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
   {array_push($valid->success_msg,'Thank you , Admin will review & approve/reject your event .');	}
if($_REQUEST['id']==2)
  {  array_push($valid->error_msg,' Something went wrong, Please try agian Later.');}	
}

if(isset($_REQUEST['submit']))
{
	$users = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$_SESSION['casUser']."'");
	if($_FILES["test_image1"]["name"]!='')
{
$temp = explode(".", $_FILES["test_image1"]["name"]);
$extension = end($temp);
$file = 'event_'.time().'.'.$extension;
//$types = array('image/jpeg', 'image/png', 'image/jpg');
move_uploaded_file($_FILES["test_image1"]["tmp_name"],"event/" . $file);
}
else { $file1 ="NAN"; }

if($_FILES["test_image2"]["name"]!='')
{
$temp = explode(".", $_FILES["test_image2"]["name"]);
$extension = end($temp);
$file2 = 'event_'.time().'.'.$extension;
//$types = array('image/jpeg', 'image/png', 'image/jpg');
move_uploaded_file($_FILES["test_image2"]["tmp_name"],"event/" . $file);
}
else { $file2 ="NAN"; }

if($_FILES["test_image3"]["name"]!='')
{
$temp = explode(".", $_FILES["test_image3"]["name"]);
$extension = end($temp);
$file3 = 'event_'.time().'.'.$extension;
//$types = array('image/jpeg', 'image/png', 'image/jpg');
move_uploaded_file($_FILES["test_image3"]["tmp_name"],"event/" . $file);
}
else { $file3 ="NAN"; }

if($_FILES["test_image4"]["name"]!='')
{
$temp = explode(".", $_FILES["test_image4"]["name"]);
$extension = end($temp);
$file4 = 'event_'.time().'.'.$extension;
//$types = array('image/jpeg', 'image/png', 'image/jpg');
move_uploaded_file($_FILES["test_image4"]["tmp_name"],"event/" . $file);
}
else { $file4 ="NAN"; }

if($_FILES["test_image5"]["name"]!='')
{
$temp = explode(".", $_FILES["test_image5"]["name"]);
$extension = end($temp);
$file5 = 'event_'.time().'.'.$extension;
//$types = array('image/jpeg', 'image/png', 'image/jpg');
move_uploaded_file($_FILES["test_image5"]["tmp_name"],"event/" . $file);
}
else { $file5 ="NAN"; }

$pdata = array(
$qury->event_table.'_title' => $_REQUEST['name'],
$qury->event_table.'_description' => $_REQUEST['desc'],
$qury->event_table.'_date' => $_REQUEST['date'],
$qury->event_table.'_time' => $_REQUEST['time'],
$qury->event_table.'_place' => $_REQUEST['location'],
$qury->event_table.'_phone' => $_REQUEST['phone'],
$qury->event_table.'_username' => $_SESSION['casUser'],
);
$inss = $qury->insertr($qury->prefix.$qury->event_table,$pdata);
	$last_id=  $this->qury->insert_id();
if($inss){
	if($file1!="NAN"){
$qdata = array(
$qury->img_table.'_is' => $file1,
$qury->img_table.'_ref' => $last_id
);
$ins1 = $qury->insertr($qury->prefix.$qury->img_table,$qdata);
}

	if($file2!="NAN"){
$qdata = array(
$qury->img_table.'_is' => $file2,
$qury->img_table.'_ref' => $last_id
);
$ins1 = $qury->insertr($qury->prefix.$qury->img_table,$qdata);
}

	if($file3!="NAN"){
$qdata = array(
$qury->img_table.'_is' => $file3,
$qury->img_table.'_ref' => $last_id
);
$ins1 = $qury->insertr($qury->prefix.$qury->img_table,$qdata);
}

	if($file4!="NAN"){
$qdata = array(
$qury->img_table.'_is' => $file4,
$qury->img_table.'_ref' => $last_id
);
$ins1 = $qury->insertr($qury->prefix.$qury->img_table,$qdata);
}

   if($file5!="NAN"){
$qdata = array(
$qury->img_table.'_is' => $file5,
$qury->img_table.'_ref' => $last_id
);
$ins1 = $qury->insertr($qury->prefix.$qury->img_table,$qdata);
}
echo "<script>window.location='complain.php?id=1'</script>";	
}								   
else{
echo "<script>window.location='complain.php?id=2'</script>";
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
$file = 'complaint_'.time().'.'.$extension;
$types = array('image/jpeg', 'image/png', 'image/jpg');
move_uploaded_file($_FILES["test_image"]["tmp_name"],"complaints/" . $file);
}
else { $file ="NAN"; }

$pdata = array(
$qury->comp_table.'_phone' => $_REQUEST['phone'],
$qury->comp_table.'_username' => $_SESSION['casUser'],
$qury->comp_table.'_complaint' => $_REQUEST['complaint'],
$qury->comp_table.'_image' => $file,
$qury->comp_table.'_desc' => $_REQUEST['desc'],
);
$inss = $qury->insertr($qury->prefix.$qury->comp_table,$pdata);
if($inss){
echo "<script>window.location='complain.php?id=1'</script>";
}
else{
echo "<script>window.location='complain.php?id=2'</script>";
}	
}
?>

<div class="col-md-8" style="margin:20px auto;width:100%;">
 <div class="container">
 <h3 class="title" >Add<span> Event </span></h3>
<div class="col-md-6" style="padding:10px 20px;border-right:1px solid #eee;">
  <h2 > Submit the Event  </h2>
							<ul style="list-style:none;line-height:28px;">
									<li><strong>About :</strong> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam</li>
									</ul>
									
		<div class="grid-categories">
					<h4>Categories</h4>
					<ul class="popular">
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>Contrary to popular belief</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>There are many variation</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>Lorem Ipsum is simply</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>Sed ut perspiciatis unde</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>Nemo enim ipsam volume</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>There are many variation</a></li>
					</ul>
				</div>							
							</div>
<div class="col-md-6" style="margin:20px auto;padding:0 40px 0 60px;width:45%;border-left:1px solid #eee;">
 <div class="headline"><h2>Submit the Event  </h2></div>
 <?php require_once 'alert.php'; ?>
 <?php if(isset($_SESSION['casUser'])){?>
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" style="box-shadow:none;" class="sky-form contact-style" onSubmit="return validate_form()" enctype = "multipart/form-data"><div class="form-body">
  
	   <div class="form-group"><label for="city" class="control-label"><span style="color:red;">* </span>Event Name</label>
	<input name="name" id="name" class="form-control rounded" placeholder="Enter Event Name." type="text" required>
	  </div>

	<div class="form-group"><label for="content" class="control-label"><span style="color:red;">* </span> Description</label>
  <textarea name="desc" id="desc" class="form-control" placeholder="Enter Description" required> </textarea>
	</div>

	<div class="form-group"><label for="Date" class="control-label"><span style="color:red;">* </span>Date</label>
	<input name="date" id="date" class="form-control rounded" placeholder="Enter Your Contact No." type="date" required>
	  </div>
	  
	  <div class="form-group"><label for="Time" class="control-label"><span style="color:red;">* </span>Time  </label>
	<input name="time" id="time" class="form-control rounded" placeholder="Enter Your Contact No." type="time" required>
	  </div>
	
 <div class="form-group"><label for="city" class="control-label"><span style="color:red;">* </span>Location </label>
	<input name="location" id="location" class="form-control rounded" placeholder="Enter Your Contact No." type="text" required>
	  </div>
	  
	  <div class="form-group"><label for="city" class="control-label"><span style="color:red;">* </span>Contact No</label>
	<input name="phone" id="phone" class="form-control rounded" placeholder="Enter Your Contact No." type="number" required>
	  </div>
	  
	<div class="form-group">
    <label class="control-label">Upload Image-1 <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image1" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>
												 
   <div class="form-group">
    <label class="control-label">Upload Image-2  <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image2" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>

<div class="form-group">
    <label class="control-label">Upload Image-3 <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image3" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>

<div class="form-group">
    <label class="control-label">Upload Image-4 <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image4" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>

<div class="form-group">
    <label class="control-label">Upload Image-5  <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image5" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>
												 
	<div class="form-footer">
<div class="pull-left">
   <input name="submit" value="SUBMIT" class="btn btn-theme mr-5" id="Submit" type="submit" style="background-color:#c0392b;color:#fff;border:none;padding:8px 15px;margin:20px 5px;">
   <input name="reset" value="RESET" class="btn btn-warning mr-5" id="Reset" type="reset" style="background-color:#c0392b;color:#fff;border:none;padding:8px 15px ;margin:20px 5px;">
</div>
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

   <div class="form-group"><label for="city" class="control-label"><span style="color:red;">* </span>Event Name</label>
	<input name="name" id="name" class="form-control rounded" placeholder="Enter Event Name." type="text" required>
	  </div>

	<div class="form-group"><label for="content" class="control-label"><span style="color:red;">* </span> Description</label>
  <textarea name="desc" id="desc" class="form-control" placeholder="Enter Description" required> </textarea>
	</div>

	<div class="form-group"><label for="Date" class="control-label"><span style="color:red;">* </span>Date</label>
	<input name="date" id="date" class="form-control rounded" placeholder="Enter Your Contact No." type="date" required>
	  </div>
	  
	  <div class="form-group"><label for="Time" class="control-label"><span style="color:red;">* </span>Time  </label>
	<input name="time" id="time" class="form-control rounded" placeholder="Enter Your Contact No." type="time" required>
	  </div>
	
 <div class="form-group"><label for="city" class="control-label"><span style="color:red;">* </span>Location </label>
	<input name="location" id="location" class="form-control rounded" placeholder="Enter Your Contact No." type="text" required>
	  </div>
	  
	  <div class="form-group"><label for="city" class="control-label"><span style="color:red;">* </span>Contact No</label>
	<input name="phone" id="phone" class="form-control rounded" placeholder="Enter Your Contact No." type="number" required>
	  </div>
	  
	<div class="form-group">
    <label class="control-label">Upload Image-1 <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image1" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>
												 
   <div class="form-group">
    <label class="control-label">Upload Image-2  <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image2" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>

<div class="form-group">
    <label class="control-label">Upload Image-3 <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image3" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>

<div class="form-group">
    <label class="control-label">Upload Image-4 <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image4" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>

<div class="form-group">
    <label class="control-label">Upload Image-5  <span class="color-red"></span></label>
     <div style="margin: 10px 0 15px 0;">
    <input type="file" name="test_image5" accept="event/*" class="btn btn-file btn-info" ></span>
                                                 </div>   </div>
												 
	<div class="form-footer">
<div class="pull-left">
   <input name="submit2" value="SUBMIT" class="btn btn-theme mr-5" id="Submit2" type="submit" style="background-color:#c0392b;color:#fff;border:none;padding:8px 15px;margin:20px 5px;">
   <input name="reset" value="RESET" class="btn btn-warning mr-5" id="Reset" type="reset" style="background-color:#c0392b;color:#fff;border:none;padding:8px 15px ;margin:20px 5px;">
</div>
	
	<div class="clearfix"></div>
 </div></form>
	 
 <?php }?>			</div>		</div><!----Container div-->
</div><!----col-md-8 div-->
</div><!----home div-->
		<!-- //choose --> 
<div class="clearfix"></div>
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

