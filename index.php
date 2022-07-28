<?php require_once 'access.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Wildlife Conservation </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pets Love Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
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
<div id="home" class="wow fadeInDown animated" data-wow-delay=".5s">
	<div class="container">
			<div class="top-header">
						<div class="container">
							<div class="logo">
								<a href="index.php"><img src="images/logo.png" alt=""></a>  
							</div>
							<!--start-top-nav-->
							 <div class="top-nav">
								<ul>
								  <?php if(isset($_SESSION['casUser']))
						 {
							 echo '<li class="active"><a href="dashboard.php">My Account</a></li>';
						 }
							 else					 
							 {
                         echo '<li class="active"><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><span> </span>Log in</a></li>
									<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog1">Sign up</a></li>';
						 }?>
						 </ul>
							</div>
							<div class="clearfix"> </div>
						</div>
				</div>
			<!---pop-up-box---->
					  <script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
					<link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all"/>
					<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!---//pop-up-box---->
				<div id="small-dialog" class="mfp-hide">
				 <form  action="" onSubmit="return validate_form()" method="post">
                 	<div class="login">
							<h3>Log In</h3>
							<h4>Already a Member</h4>
							<input type="email" name="username" placeholder="Email-ID" required />
							<input type="password" name="password2" placeholder="Password" required/>
							<input type="submit" name="LOGIN" value="Login" />
						</div>
				 </form>		
					</div>
					<div id="small-dialog1" class="mfp-hide">
		 <form  action="" onSubmit="return validate_form()" method="post" >
                      	<div class="signup">
							<h3>Sign Up</h3>
							<h4>Enter Your Details Here (All the fields are mandatory) </h4> 
							<input type="text" name="fname"  placeholder="First Name " required />
							<input type="text" name="lname"  placeholder="Last Name" required />
							<input type="email" name="email" class="email"  valid="email" placeholder="Email-ID" required />
							<input type="password" name="password" placeholder="Password" required />
							<input type="submit" name="register" value="SignUp"/>
						</div>
						</form>
					</div>	
				 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>				
		<div class="clearfix"></div>
	</div>
</div>
<div class="banner">
	<div class="ban-top ">
		<div class="container">
			<div class="ban-top-con">
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav menu__list">
						<li class="active menu__item menu__item--current"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
						<li class=" menu__item"><a class="menu__link" href="about.php">About</a></li>
						 <li class="dropdown menu__item">
                            <a href="javascript:void(0);" class="dropdown-toggle menu__link" data-toggle="dropdown">
                             Facts & Info <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" > 
							 <li class=" menu__item2"><a class="menu__link" style="background-color:rgba(0, 0, 0, .5);" href="terms.php">Common Terms & Meaning</a></li>
      <li class=" menu__item2"><a class="menu__link" style="background-color:rgba(0, 0, 0, .5);" href="animal_trafficking.php" > Animal Smuggling / Trafficking</a></li>
	  <li class=" menu__item2"><a class="menu__link" style="background-color:rgba(0, 0, 0, .5);" href="nature.php" > Nature Conservation</a></li>
	   </ul>
				  </li>
						<li class="dropdown menu__item">
                            <a href="javascript:void(0);" class="dropdown-toggle menu__link" data-toggle="dropdown">
                              Adoption <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" > 
							<li class=" menu__item2"><a class="menu__link" style="background-color:rgba(0, 0, 0, .5);" href="adopt.php"> Adopt a Pet</a></li>
      <li class=" menu__item2"><a class="menu__link" style="background-color:rgba(0, 0, 0, .5);" href="choosing_a_pet.php"> Think before Adopting</a></li>
	    <li class=" menu__item2"><a class="menu__link" style="background-color:rgba(0, 0, 0, .5);" href="pets_for_kids.php"> Pets for Kids</a></li>
	  </ul>
				  </li>
						<li class=" menu__item"><a class="menu__link" href="foster.php">Foster</a></li>
						
						<li class=" menu__item"><a class="menu__link" href="volunteer.php">Volunteer</a></li>
						<li class=" menu__item"><a class="menu__link" href="complain.php">Complain Booking</a></li>	
						<li class=" menu__item"><a class="menu__link" href="events.php">Events</a></li>
						<li class=" menu__item"><a class="menu__link" href="blog.php">Blog</a></li>
						<li class=" menu__item"><a class="menu__link" href="contact.php">contact</a></li>
						
						 
				  </ul>
					</div>
				  </div>
				</nav>	
			</div>
						<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="ban-bot text-center">
		<script src="js/responsiveslides.min.js"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider3">
				<li>
					<div class="ban-info">
						<h3>"Earth was created for all of us, not for some of us."</h3>
						<p></p>
						<a class="hvr-rectangle-out" href="about.php">See More About Us</a>
					</div>		
				</li>
				<li>
					<div class="ban-info">
						<h3>"Wilderness is not a luxury but a necessity of the human spirit."</h3>
						<p></p>
						<a class="hvr-rectangle-out" href="about.php">See More About Us</a>
					</div>		
				</li>
				<li>
					<div class="ban-info">
						<h3>"The continued existence of wildlife and wilderness is important to the quality of life of human."</h3>
						<p></p>
						<a class="hvr-rectangle-out" href="about.php">See More About Us</a>
					</div>		
				</li>			
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- content -->
<div class="content">
	<div class="container">
		<h3 class="title wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5s" >Welcome To <span>Nature</span></h3>
		<p class="con-para wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5s">Just feel the magic in the air and the power in the breeze, Feel the energy of the plants, the bushes and the trees, <br>Let yourself be surrounded by nature at its best, Calm yourself, focus and let magic do the rest.</p>

		<div class="care-bottom">
					
					<div class="col-md-4 c-bottom">
						<div class="care-bottom-middle">
							<img src="images/water.png" alt="">
							<h4>Water Conservation</h4>
							<p> Conserving water is something that we all should be doing. We take water and water supply for granted when in all actuality supply is in high demand and of limited resource very little of the Earth's natural water can actually be used for human consumption. </p>
							<div class="view">
								<a href="nature1.php">VIEW</a>
							</div>
							</div>
					</div>
					 
					<div class="col-md-4 c-bottom">
						<div class="care-bottom-right">
							<img src="images/tree.png" alt="">
							<div class="view">
								
							</div>
							</div>
					</div>
					<div class="col-md-4 c-bottom">
						<div class="care-bottom-left">
							<img src="images/tree2.png" alt="">
							<h4>Air Pollution</h4>
							<p> Pollution is now a common place term that our ears are attuned to. We hear about the various forms of pollution and read about it through the mass media. Air pollution is one such form that refers to the contamination of the air, irrespective of indoors or outside.</p>
							
							<div class="view">
								<a href="nature2.php">VIEW</a>
							</div>
							</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
</div><!-- //content -->
<!-- content-bottom -->
<div class="content-bott">
	<div class="container">
				<div class="content-grids ">
				<h3 class="title wow flipInX" > Complain <span> Booking Process</span></h3>
				<div class="col-md-3 wel-grid text-center wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">
				<div class="btm-clr4">
					<span></span>
					<figure class="icon">
						<img src="images/icon1.png" alt=" " />
					</figure>
					<h4>Book your complaint</h4>
				</div>
			</div>
			<div class="col-md-3 wel-grid btm-gre text-center wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">
				<div class="btm-clr4 btm-clr1">
					<span></span>
					<figure class="icon">
						<img src="images/icon4.png" alt=" " />
					</figure>
					<h4>Reviewed by Admin</h4>
				</div>
			</div>
			<div class="col-md-3 wel-grid text-center wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">
				<div class="btm-clr4 btm-clr1">
					<span></span>
					<figure class="icon">
						<img src="images/icon3.png" alt=" " />
					</figure>
					<h4>Shared with Authority </h4>
				</div>
			</div>
			<div class="col-md-3 wel-grid btm-gre text-center wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">
				<div class="btm-clr btm-clr3">
					<span></span>
					<figure class="icon">
						<img src="images/icon2.png" alt=" " />
					</figure>
					<h4>Complaint Status</h4>
				</div>
			</div>
						<div class="clearfix"></div></div>
			<h3 style="width:300px;margin:80px auto 0;text-align:center;" ><a href="complain.php" ><span class="label2 ">Submit A Complain</span></a></h3>	
		</div>
</div>
<!-- //content-bottom -->
<!-- our pets -->
<div class="our_pets">
	<div class="container">
		<h3 class="title wow fadeInUp animated" data-wow-delay=".5s" >Adopt a <span> Pet</span></h3>
		<div class="flex-slider wow fadeInDown animated" data-wow-delay=".5s">
			<ul id="flexiselDemo1">			
				<li>
					<div class="laptop">
						<div class="pets-effect ver_line zoom">
							<div class="img-box"><img class="img-responsive zoom-img" src="images/pic10.jpg" alt=" " /></div>
							<div class="pets-info">
								<div class="pets-info-slid">
									<h4>Pets Love</h4>
									<span class="strip_line"></span>
									<p>Sit accusamus, vel blanditiis iure minima ipsa molestias minus laborum velit, nulla nisi hic quasi enim.</p>
									<span class="strip_line"></span>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="laptop">
						<div class="pets-effect ver_line zoom">
							<div class="img-box"><img class="img-responsive zoom-img" src="images/pic11.jpg" alt=" " /></div>
							<div class="pets-info">
								<div class="pets-info-slid">
									<h4>Pets Love</h4>
									<span class="strip_line"></span>
									<p>Sit accusamus, vel blanditiis iure minima ipsa molestias minus laborum velit, nulla nisi hic quasi enim.</p>
									<span class="strip_line"></span>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="laptop">
						<div class="pets-effect ver_line zoom">
							<div class="img-box"><img class="img-responsive zoom-img" src="images/pic12.jpg" alt=" " /></div>
							<div class="pets-info">
								<div class="pets-info-slid">
									<h4>Pets Love</h4>
									<span class="strip_line"></span>
									<p>Sit accusamus, vel blanditiis iure minima ipsa molestias minus laborum velit, nulla nisi hic quasi enim.</p>
									<span class="strip_line"></span>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="laptop">
						<div class="pets-effect ver_line zoom">
							<div class="img-box"><img class="img-responsive zoom-img" src="images/pic13.jpg" alt=" " /></div>
							<div class="pets-info">
								<div class="pets-info-slid">
									<h4>Pets Love</h4>
									<span class="strip_line"></span>
									<p>Sit accusamus, vel blanditiis iure minima ipsa molestias minus laborum velit, nulla nisi hic quasi enim.</p>
									<span class="strip_line"></span>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
			<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 3,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 2
										},
										tablet: { 
											changePoint:991,
											visibleItems: 2
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
</div>
<!-- //our pets -->
<!-- our works -->
<div class="treatments">
	<div class="container">
		<h3 class="title wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5s" >Read <span>Articles</span></h3>
			<div class="news-bottom">
					<div class="col-md-6 news-bottom-left">
						<a href="blog.php" class="b-link-stripe b-animate-go  thickbox" id="legal">
									<img class="port-pic" class="img-responsive" src="images/a1.jpg" />
									<div class="b-wrapper">
										<h2 class="b-animate b-from-left b-from   b-delay03 ">
											<span>Legal Framework for Wildlife Conservation in India</span>
											<!--<button>View full article</button>-->
										</h2>
									</div>
								</a>
					</div>
					<div class="col-md-6 news-bottom-left">
						<div class="news-btm">
							<a href="blog.php" class="b-link-stripe b-animate-go  thickbox">
									<img class="port-pic" src="images/a2.jpg" />
									<div class="b-wrapper">
										<h2 class="b-animate b-from-left    b-delay03 ">
										<span>Dearth of Studies on Hunting in India</span>
											<!--<button>View full article</button>-->
										</h2>
									</div>
								</a>
						</div>
						<a href="blog.php" class="b-link-stripe b-animate-go  thickbox">
									<img class="port-pic" src="images/a3.jpg" />
									<div class="b-wrapper">
										<h2 class="b-animate b-from-left    b-delay03 ">
										<span>Local Hunting and Conservation of Large Mammals</span>
											<!--<button>View full article</button>-->
										</h2>
									</div>
								</a>
					</div>
					<div class="clearfix"> </div>
					<div class="news-btm1">
						<a href="blog.php" class="b-link-stripe b-animate-go  thickbox">
									<img class="port-pic" class="img-responsive" src="images/a44.jpg" />
									<div class="b-wrapper">
										<h2 class="b-animate b-from-left b-left   b-delay03 ">
											<span>Lights on for Elephants</span>
											<!--<button>View full article</button>-->
										</h2>
									</div>
								</a>
					</div>
					<div class="fd-btn">
						<h3 style="width:300px;margin:80px auto 0;text-align:center;" ><a href="blog.php" ><span class="label2 ">Read More</span></a></h3>	
					</div>
				</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //our works -->
	<div class="news2">
		<div class="container">
			<div class="col-md-8 news-top">
				<h3>Upcoming Event</h3>
				<div class="news-left2">
					<img src="images/img51.jpg" class="img-responsive" alt="">
				</div>
				<div class="news-right2">
					<h6>29/05/2017 - 10:00 AM</h6>
					<p>WNC is excited to announce the 2017 Wildlife Conservation Expos! Each one is a unique opportunity for wildlife lovers to come together and hear first hand from conservationists protecting endangered species around the world. Join us and immerse yourself in stories about their daily triumphs and challenges and walk away inspired. </p>
					<a href="#" class="btn  btn-1c btn1 btn-1d">Read More</a>	
				</div>
					<div class="clearfix"> </div>
			</div>
			<div class="col-md-4 latest">
			<h3>Latest Photos</h3>
			<div class="latest-left">
					<img src="images/eve1.jpg" class="img-responsive" alt="">
					<img src="images/eve2.jpg" class="img-responsive" alt="">
				</div>
				<div class="latest-right">
					<img src="images/eve3.jpg" class="img-responsive" alt="">
					<img src="images/i.jpg" class="img-responsive" alt="">
				</div>
					<div class="clearfix"> </div>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
<!-- news -->
<!-- contact -->
<?php include 'footer.php';?>
<!-- contact -->
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

</body>
</html>

