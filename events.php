<!DOCTYPE html>
<html>
<head>
<title>Events : </title>
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
<div class="news-left">	
	<div class="container">
		<h3 class="title " >Events <span><a href="add_event.php">(Add new Event) </a></span></h3>
			<div class="col-md-6 col-news-right ">
				<div class="col-news-top">
					<a href="event_detail.php"><div class="date-in">
						<img class="img-responsive" src="images/g1.jpg" alt="">
						<div class="month-in">
							<span><img src="images/icon1.png" alt=" "></span>
							<p>Consectetuer adipiscing</p>
						</div>
						</a>
					</div>
					<div class="col-bottom">
						<h4><a href="event_detail.php">Consectetuer Adipiscing</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem  </p>	
					</div>
				</div>	
						
			</div>
			<div class="col-md-6 col-news ">
						<div class="col-bottom two">
							<h4>Consectetuer Adipiscing </h4>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem  </p>
							
						</div>
						<div class="col-news-top">
							<div class="date-in">
								<img class="img-responsive" src="images/g2.jpg" alt="">
								<div class="month-in">
									<span><img src="images/icon2.png" alt=" "></span>
									<p>Consectetuer adipiscing</p>									
								</div>
							</div>
						</div>		
			</div>
			<div class="clearfix"> </div>
			<div class="col-md-6 col-news-right ">
				<div class="col-news-top">
					<div class="date-in">
						<img class="img-responsive" src="images/g1.jpg" alt="">
						<div class="month-in">
							<span><img src="images/icon1.png" alt=" "></span>
							<p>Consectetuer adipiscing</p>
						</div>
					</div>
					<div class="col-bottom">
						<h4>Consectetuer Adipiscing</h4>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem  </p>	
					</div>
				</div>	
						
			</div>
			<div class="col-md-6 col-news ">
						<div class="col-bottom two">
							<h4>Consectetuer Adipiscing </h4>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem  </p>
							
						</div>
						<div class="col-news-top">
							<div class="date-in">
								<img class="img-responsive" src="images/g2.jpg" alt="">
								<div class="month-in">
									<span><img src="images/icon2.png" alt=" "></span>
									<p>Consectetuer adipiscing</p>									
								</div>
							</div>
						</div>		
			</div>
			<div class="clearfix"> </div>
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

