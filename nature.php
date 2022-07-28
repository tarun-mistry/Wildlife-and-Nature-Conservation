<!DOCTYPE html>
<html>
<head>
<title>Nature Conservation : </title>
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
<?php include 'header1.php';?>

<div id="station" >

</div>

<div style="background-color:#fff;width: 80%;margin:50px auto;position: relative;float:none;">
<h3 style="text-align:center;padding:40px 0">MISSION </h3>
<p style="text-align:center;padding:10px 50px;">No one person can save the world - or the water. <br>But in creating alliances, bringing people who care together, and creating projects that can have an impact, we start to slowly protect and build up this important natural resource.</p>
<div style="width:30%;margin:20px auto;">
 <ul style="list-style:none;">
 <li style="float:left;padding:15px;background-color:#c0392b;color:#fff;"><a href="#vis" style="color:#fff;">Water Conservation</a></li>
  <li style="float:left;padding:15px;background-color:#c0392b;color:#fff;"><a href="#abt" style="color:#fff;">Air Pollution</a></li>
</ul>
 </div>
 <div class="clearfix"> </div>
 
 
 <div style="width:100%;margin:20px auto;" id="vis">
 <div class="col-md-6" style="margin:20px 0;padding-left:0">
    <img src="images/water2.jpg" alt="" style="height:auto;width:100%;" />
 </div>
 <div class="col-md-6" style="margin:20px 0;"> 
 <h3 style="text-align:left;padding:20px 0">Water Conservation </h3>
<p style="text-align:left;padding:20px 0px;">Conserving water is something that we all should be doing. We take water and water supply for granted when in all actuality supply is in high demand and of limited resource very little of the Earth's natural water can actually be used for human consumption. Producing water is costly and uses those limited supplies of water available.  By conserving water you can help supply more water while bringing a multitude of benefits your way.</p>
<div class="view" align="center">
		<a href="nature1.php">Read More</a>
	</div>
 </div>
 </div>
 
 <div class="clearfix"> </div>
 
  <div style="width:100%;margin:20px auto;" id="abt">
 <div class="col-md-6" style="margin:20px 0;"> 
 <h3 style="text-align:left;padding:20px 0">Air Pollution</h3>
<p style="text-align:left;padding:20px 0px;">Pollution is now a common place term that our ears are attuned to. We hear about the various forms of pollution and read about it through the mass media. Air pollution is one such form that refers to the contamination of the air, irrespective of indoors or outside. A physical, biological or chemical alteration to the air in the atmosphere can be termed as pollution. It occurs when any harmful gases, dust, smoke enters into the atmosphere and makes it difficult for plants, animals and humans to survive as the air becomes dirty.</p>
	<div class="view" align="center">
		<a href="nature2.php">Read More</a>
	</div>
 </div>
  <div class="col-md-6" style="margin:20px 0;padding-right:0;">
    <img src="images/air1.png" alt="" style="height:auto;width:100%;" />
 </div>
 </div>
 <div class="clearfix"> </div>
 
 
  <div style="width:100%;margin:20px auto;" id="vol">
 <div class="col-md-6" style="margin:20px 0;padding-left:0">
 </div>
 <div class="col-md-6" style="margin:20px 0;"> 

 </div>
 </div>
 

<div class="news-btm1">
						<a class="b-link-stripe b-animate-go  thickbox">
									<img class="port-pic" class="img-responsive" src="images/nature_w.jpg" />
									<div class="b-wrapper">
										<h2 class="b-animate b-from-left b-left   b-delay03 ">
											<span>Look deep into nature, and then you will understand everything better.</span>
										</h2>
									</div>
								</a>
					</div>
					<div class="clearfix"> </div>
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
<div class="clearfix"> </div>

<?php include 'footer.php';?>
</body>
</html>

