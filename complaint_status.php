<!DOCTYPE html>
<html>
<head>
<title>Current Complaints : </title>
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
<div id="status">
<div class="events">	
		<div class="container">
		<h3 class="title" >Current <span>Complaints </span></h3>
			<div class="events-top">
		<?php	$fetch = $qury->selectr("*",$qury->prefix.$qury->comp_table);
			foreach($fetch as $fet)	{
				  $timestamp = strtotime($fet[$qury->comp_table."_date"]);	
        $date2 = date('d', $timestamp);	
		$month = date("M", ($timestamp) ); 
		$year = date('o', $timestamp);
		if($fet[$qury->comp_table."_image"] == "NAN" ){$image ="complaint.jpg";}else{ $image= $fet[$qury->comp_table."_image"]; }
		if($fet[$qury->comp_table."_status"]==1 ){$status= "Pending";} elseif($fet[$qury->comp_table."_status"]==2 ){$status= "Solved "; }else{ $status= "Cancel";}
				echo '
				<div class="col-sm-4 top-event" style="margin-bottom:50px;">
				 	<a href="single.html"><img style="height:250px;" src="complaints/'.$image.'" class="img-responsive" alt=""></a>
					<h4><a href="single.html">'.substr($fet[$qury->comp_table."_complaint"],0,20).'</a></h4>
					<span><i class="glyphicon glyphicon-calendar"></i>'.$fet[$qury->comp_table."_date"].'</span>
					<p><strong>Description : </strong>'.substr($fet[$qury->comp_table."_desc"],0,80).'</p>	
					<p><strong>Status : </strong>'.$status.' </p>
			</div>'; }?>
					
				<div class="clearfix"> </div>
			</div>
		</div> 
	</div></div>
	<!---->

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

