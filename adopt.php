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
<script src="js/jquery.min.js"></script>
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
	
	<script src="js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="css/chocolat.css" type="text/css">
		<!--light-box-files -->
		<script type="text/javascript">
		$(function() {
			$('.gallery-top a').Chocolat();
		});
		</script>

		
<!--//end-animate-->

</head>
<body>
<?php include 'header.php';?>
<!--content-->
<div class="team-gds">	
	<div class="container">
		<h3 class="title" >Adopt <span>a Pet </span></h3>
			<div class="team-bot">
			<?php
			$fetch = $qury->selectr("*",$qury->prefix.$qury->animal_table," WHERE ".$qury->animal_table."_status='1' ");
							foreach($fetch as $fet)
							{
							echo '	<div class="col-md-4 bottom-gds ">
					<div class="bott-img">
								<div class="icon-holder">
									<span><img  src="pet/'.$fet[$qury->animal_table."_image"].'" alt=""></span>
								</div>
								<h4 class="mission"><a href="pet.php?id='.$fet[$qury->animal_table."_id"].'">'.$fet[$qury->animal_table."_name"].' </a></h4>
								<div class="description">
									<ul>
									
									<li>Age : '.$fet[$qury->animal_table."_age"].' </li><br/>
									<li>Breed : '.$fet[$qury->animal_table."_breed"].'</li><br/>
									</ul>
								</div>
					</div>
				</div>
	
							';
							}
							?>		
					</div>			
			
				<div class="clearfix"></div>
				
	
			
			
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

