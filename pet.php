<!DOCTYPE html> 
<html>
<head>
<title>Adopt a Pet : </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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

</head>
<body>
<?php include 'header.php';?>

<div class="col-md-8" style="margin:20px auto;width:100%;">
 <div class="container">
 <h3 class="title" >Adopt <span>a Pet </span></h3>
 <?php
  if(isset($_REQUEST['id'])) {
	 $got_id = $_REQUEST['id'];
 }
 $fetch = $qury->selectfetch("*",$qury->prefix.$qury->animal_table," WHERE ".$qury->animal_table."_status='1' AND ".$qury->animal_table."_id='".$got_id."'"); ?>

	
<div class="col-md-5">
  	<div class="bott-img">
									<span><img  src="pet/<?php echo $fetch['animal_image']; ?>" alt=""></span>
								</div>
</div>
<div class="col-md-7" style="padding:10px 50px;">
 	<?php require_once 'alert.php'; ?>
  <h2 >Name : <?php echo $fetch['animal_name']; ?></h2>
							<ul style="list-style:none;line-height:28px;">
								<li><i class="glyphicon glyphicon-bookmark"></i> <strong>Category :</strong><?php echo $fetch['animal_category']; ?></li>
									<li><i class="glyphicon glyphicon-calendar"></i> <strong>Age :</strong> <?php echo $fetch['animal_age']; ?></li>
									<li><i class="glyphicon glyphicon-bookmark"></i> <strong>Breed : </strong><?php echo $fetch['animal_breed']; ?></li>
									<li><i class="glyphicon glyphicon-tint"></i> <strong>Color :</strong><?php echo $fetch['animal_color']; ?></li>
									<li><i class="glyphicon glyphicon-home"></i> <strong>Birth Place :</strong><?php echo $fetch['animal_placefound']; ?></li>
									<li><i class="glyphicon glyphicon-pencil"></i> <strong>About :</strong> <?php echo $fetch['animal_des']; ?></li>
									</ul>
									 <?php if(isset($_SESSION['casUser']))
									 { 
   $count = $qury->countq("*",$qury->prefix.$qury->adopt_table," WHERE ".$qury->adopt_table."_animal_id='".$fetch['animal_id']."' AND ".$qury->adopt_table."_username='".$_SESSION['casUser']."' AND ".$qury->adopt_table."_int='1'");
if($count == 0)
{ ?>
	 							 <p> <i class="glyphicon glyphicon-circle-arrow-right"></i> If you want to adopt it , Show Interest </p>								
	    <form  role="form" action="" method="POST" enctype="multipart/form-data">
		<input type="submit" class="btn btn-primary" value="Show Interest" name="inte" style="margin: 10px 10px 10px 0px;background-color:#0197ec ;color:#fff;"/>
		</form>
		<?php  }else{ ?>
		  <form  role="form" action="" method="POST" enctype="multipart/form-data">
		<input type="submit" class="btn btn-primary" value="Not Interested" name="inte2" style="margin: 10px 10px 10px 0px;background-color:#0197ec ;color:#fff;"/>
		</form>
									 <?php }	}else{	 ?>
										 <p style="margin:10px 0;"> <i class="glyphicon glyphicon-circle-arrow-right"></i> If you want to adopt it , please Login or Register. </p>
								  <div class="top-nav" style="float:left;margin: 0 20px;">				   
								 <ul>
<li class="active"><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><span> </span>Log in</a></li>
									<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog1">Sign up</a></li></ul>
								 <div class="top-nav"> <?php } ?>							
</div></div>
							</div>
	</div><!----Container div-->
</div><!----col-md-8 div-->

<?php
	 if(isset($_REQUEST['inte']))
    {
	 $data = array(
$qury->adopt_table.'_animal_id' =>$fetch['animal_id'],
$qury->adopt_table.'_username' => $_SESSION['casUser'],
$qury->adopt_table.'_int' => 1
);
$ins = $qury->insertr($qury->prefix.$qury->adopt_table,$data);
if($ins)
{
	 echo "<script>alert('Thank you, We will contact you soon.');</script>";
	echo "<script>window.location='adopt.php'</script>";
}

else{
	echo "<script>alert('Something went wrong , Please refresh the page and Try again.');</script>";
}
	} //-----------------Done---------------------

	 if(isset($_REQUEST['inte2']))
    {
	 $data = array(
$qury->adopt_table.'_int' => 2
);

$up = $qury->update($qury->prefix.$qury->adopt_table,$data," WHERE ".$qury->adopt_table."_animal_id='".$fetch['animal_id']."' AND ".$qury->adopt_table."_username='".$_SESSION['casUser']."'");
if($up)
{
    echo "<script>alert('Have a look at other pets , Hopefully you will like any..');</script>";
	echo "<script>window.location='adopt.php'</script>";
}

else{
	echo "<script>alert('Something went wrong , Please refresh the page and Try again.');</script>";
}
	}
?>	
	


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

