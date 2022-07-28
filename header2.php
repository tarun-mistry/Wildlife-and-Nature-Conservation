<?php require_once 'access.php'; ?>
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
							<input type="email" name="email" class="email" valid="email" placeholder="Email-ID" required />
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
<div class="banner5">
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
					<div class="ban-info11">
						<h4>We really care about your pet's welfare!</h4>
						<p></p>
						<p></p>
					</div>		
				</li>
				<li>
					<div class="ban-info11">
						<h4>We love to walk and play with your awesome dogs!</h4>
						<p></p>
						<p></p>
					</div>		
				</li>			
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>