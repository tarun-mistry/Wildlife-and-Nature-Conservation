 <?php  if(isset($_SESSION['HTTP_REFERER'])) 
   {
	$_SESSION['HTTP_REFERER']=$_SERVER['HTTP_REFERER'];
   }
   
   if(isset($_SESSION['REQUEST_URI']))
   {
	$_SESSION['REQUEST_URI']=$_SERVER['REQUEST_URI'];
   }
   ?>
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
  if(isset($_REQUEST['id'])) {
	 $got_id = $_REQUEST['id'];
 }
 $fet = $qury->selectfetch("*",$qury->prefix.$qury->blog_table," WHERE ".$qury->blog_table."_id='".$got_id."'");
 $pageid=$fet[$qury->blog_table."_id"] ;
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
					<a href="single.php?id='.$fet[$qury->blog_table."_id"].'"><img src="blog/'.$fet['blog_image'].'" class="img-responsive" alt=""></a>
					<div class="blog-text">
						<h5><a href="single.php?id='.$fet[$qury->blog_table."_id"].'">'.$fet[$qury->blog_table."_title"].'</h5>
						<p>'.$fet[$qury->blog_table."_description"].'</p>						
					</div>
			</div>
				<div class="clearfix"> </div>
			</div> '; ?>
			<div class="comment-top">
				<h2>Comment</h2>
				<?php
			$fetch = $qury->selectr("*",$qury->prefix.$qury->com_table," WHERE ".$qury->com_table."_blog='".$fet[$qury->blog_table."_id"]."' ");
							foreach($fetch as $fet2)
							{
								$user= $fet2[$qury->com_table."_username"];
								$fetch = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$user."' ");
								if( $fetch['register_fname'] == ""){$uname ="Unknown User" ;
								}
								else{
									$uname = $fetch['register_fname'];
								
								}
								
							echo '	
		        <div class="media-left">
		          <a href="#">
		          	<img src="images/si.png" alt="">
		          </a>
		        </div>
		        <div class="media-body">
		          <h4 class="media-heading">'.$uname.'</h4>
	              <p>'.$fet2[$qury->com_table."_description"].'</p>
							</div><div class="clearfix"> </div>'; } ?>		 
        </div>
     <!---->
     <div class="comment">
				<h3>Leave a Comment</h3>
				  <?php if(isset($_SESSION['casUser']))
				  {?>
				<div class=" comment-bottom">
					<form role="form" action="" method="POST" enctype="multipart/form-data">
						<textarea placeholder="Message" required="" name="msg"></textarea>
						<input type="submit" value="Submit" name="inte">
					</form>
				  </div> 
				  <?php } else{?>
					  <div class="comment-bottom">
					<form role="form" action="" method="POST" enctype="multipart/form-data" >
						<input type="email" placeholder="Email" name="email" required>
						<textarea placeholder="Message" required="" name="msg2" ></textarea>
						<input type="submit" value="Submit" name="inte2">
					</form>
				  </div> 				  
				 <?php }?>
			</div>
			</div>
			<div class="col-md-3 categories-grid">
				<?php include  'sidebar2.php'; ?>
				
			</div>
			<div class="clearfix"> </div>
		</div>
			</div>
</div>
<?php
	 if(isset($_REQUEST['inte']))
    {
	 $data = array(
$qury->com_table.'_description' =>$_REQUEST['msg'],
$qury->com_table.'_username' => $_SESSION['casUser'],
);
$ins = $qury->insertr($qury->prefix.$qury->com_table,$data);
if($ins)
{
	 echo "<script>alert('Comment Added .');</script>";
	  if(isset($_SESSION['HTTP_REFERER'])) {
               $url=$_SESSION['HTTP_REFERER'];
			  }
			 ?>
       <script>
	     var url =<?php echo json_encode($url); ?>;
         window.location =url;
	   </script>  
         <?php
	}

else{
	echo "<script>alert('Something went wrong , Please refresh the page and Try again.');</script>";
}
	}
	
	 if(isset($_REQUEST['inte2']))
    {
	 $data2 = array(
$qury->com_table.'_description' =>$_REQUEST['msg2'],
$qury->com_table.'_username' => $_REQUEST['email'],
);
$ins = $qury->insertr($qury->prefix.$qury->com_table,$data2);
if($ins)
{
	 echo "<script>alert('Comment Added .');</script>";
	  if(isset($_SESSION['HTTP_REFERER'])) {
               $url=$_SESSION['HTTP_REFERER'];
			  }
			 ?>
       <script>
	     var url =<?php echo json_encode($url); ?>;
         window.location =url;
	   </script>  
         <?php
	}

else{
	echo "<script>alert('Something went wrong , Please refresh the page and Try again.');</script>";
}
	}
	
	?>
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

