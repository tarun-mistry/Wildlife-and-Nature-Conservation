<!DOCTYPE html>
<html>
<head>
<title>Event Detail : </title>
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
 <h3 class="title" >Event<span> Detail </span></h3>
<div class="col-md-5">
  	<div class="bott-img">
									<span><img  src="images/team1.jpg" alt=""></span>
								</div>
</div>
<div class="col-md-7" style="padding:10px 50px;">
  <h2 >Victoria</h2>
							<ul style="list-style:none;line-height:28px;">
									<li><strong>Age :</strong> 5 Years </li>
									<li><strong>Breed : </strong>jsdhfjd</li>
									<li><strong>Birth Place :</strong> Ahmedabad</li>
									<li><strong>About :</strong> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo</li>
									</ul>
									
									<p> <i class="glyphicon glyphicon-circle-arrow-right"></i> If you want to adopt it , click here
									  <a href="complaint_status.php" class="btn btn-theme mr-5" style="background-color:#c0392b;color:#fff;border:none;padding:8px 15px;margin:20px 5px;">Show Interest </a>
 </p>
							</div>
	</div><!----Container div-->
</div><!----col-md-8 div-->



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

