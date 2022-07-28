<!DOCTYPE html>
<html>
<head>
<title>Blog : </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pets Love Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
<div class="blog">
	<div class="container">
		<div class="blog-top">
			<div class="col-md-9 blog-grid">
<?php
			$fetch = $qury->selectr("*",$qury->prefix.$qury->blog_table);
			foreach($fetch as $fet)	{
				  $timestamp = strtotime($fet[$qury->blog_table."_date"]);	
        $date2 = date('d', $timestamp);	
		$month = date("M", ($timestamp) ); 
		$year = date('o', $timestamp);
				echo '
		
				<div class="blog-grid3">
				<div class=" blog-grid1">
					<div class="text-blog">
						<span>'.$date2.'</span>
						<small>'.$month.'<br>'.$year.'</small>
						<div class="clearfix"> </div>
					</div>
					<ul>
						<li><a class="heart" href="#"><i class="glyphicon glyphicon-heart"></i></a></li>
					</ul>
				</div>
				<div class=" blog-grid2">
					<a href="single.php?id='.$fet[$qury->blog_table."_id"].'"><img src="blog/'.$fet[$qury->blog_table."_image"].'" class="img-responsive" alt=""></a>
					<div class="blog-text">
						<h5><a href="single.php?id='.$fet[$qury->blog_table."_id"].'">'.substr($fet[$qury->blog_table."_title"],0,80).'</a></h5>
						<p>'.substr($fet[$qury->blog_table."_description"],0,300).'</p>						
					</div>
					<a href="single.php?id='.$fet[$qury->blog_table."_id"].'" class="more">Read More</a>
				</div><!--- Col-md-9---------->
				<div class="clearfix"> </div>
			</div>'; } ?>
			
			
			</div>
			<div class="col-md-3 categories-grid">
				<?php include  'sidebar2.php'; ?>
			<div class="clearfix"> </div>
		</div>
		
	</div>
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

