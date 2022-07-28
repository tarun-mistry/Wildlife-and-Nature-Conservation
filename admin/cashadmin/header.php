<?php 
 //$succes_msg = array();
 //$error_msg = array(); 	
require_once '../dbfunction.php';
require_once '../php_validation.php'; 
require_once '../projectclass.php';

$valid = new validation();
$qury = new cashfunct();
$project = new project();
$fetch = $qury->selectfetch("*",$qury->prefix.$qury->mem_table," WHERE ".$qury->mem_table."_id='".$_SESSION['casAdmin']."'");


?> 
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
        <!-- START @META SECTION -->
        <title>DASHBOARD</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">       
	   <link rel="shortcut icon" href="fav_icon.ico">

        <!-- START @FONT STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <!--/ END FONT STYLES -->

        <!-- START @GLOBAL MANDATORY STYLES -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/animate.min.css" rel="stylesheet">
        <link href="assets/css/dropzone.css" rel="stylesheet">
        <link href="assets/css/jquery.gritter.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->
		<link href="assets/bootstrap-datepicker-vitalets/css/datepicker.css" rel="stylesheet">
        <link href="assets/css/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="assets/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
        <link href="assets/css/chosen_v1.2.0/chosen.min.css" rel="stylesheet">
		
        <!-- START @THEME STYLES -->
        <link href="assets/css/reset.css" rel="stylesheet">
        <link href="assets/css/layout.css" rel="stylesheet">
        <link href="assets/css/components.css" rel="stylesheet">
        <link href="assets/css/plugins.css" rel="stylesheet">
        <link href="assets/css/blue-gray.css" rel="stylesheet" id="theme">
        <link href="assets/css/custom.css" rel="stylesheet">
    
    </head>
    
    <body class="page-session page-header-fixed page-sidebar-fixed demo-dashboard-session">
    
    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1728474147421804";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>





        <!--[if lt IE 9]>
        <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- START @WRAPPER -->
        <section id="wrapper">

            <!-- START @HEADER -->
            <header id="header">

                <!-- Start header left -->
                <div class="header-left">
                    <!-- Start offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <div class="navbar-minimize-mobile left">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!--/ End offcanvas left -->

                    <!-- Start navbar header -->
                    <div class="navbar-header">

                        <!-- Start brand -->
                        <a class="navbar-brand" href="dashboard.php">
                            <img class="logo" src="images/oo2d.png" alt="brand logo"/>
                        </a><!-- /.navbar-brand -->
                        <!--/ End brand -->

                    </div><!-- /.navbar-header -->
                    <!--/ End navbar header -->

                    <!-- Start offcanvas right: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <div class="navbar-minimize-mobile right">
                        <i class="fa fa-cog"></i>
                    </div>
                    <!--/ End offcanvas right -->

                    <div class="clearfix"></div>
                </div><!-- /.header-left -->
                <!--/ End header left -->

                <!-- Start header right -->
                <div class="header-right">
                    <!-- Start navbar toolbar -->
                    <div class="navbar navbar-toolbar">

                        <!-- Start left navigation -->
                        <ul class="nav navbar-nav navbar-left">

                            <!-- Start sidebar shrink -->
                            <li class="navbar-minimize">
                                <a href="javascript:void(0);" title="Minimize sidebar">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                            <!--/ End sidebar shrink -->

                            <!-- Start form search -->
                            <li class="navbar-search">
                                <!-- Just view on mobile screen-->
                                <a href="#" class="trigger-search"><i class="fa fa-search"></i></a>
                                <form class="navbar-form">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control typeahead rounded" placeholder="Search for people, places and things">
                                        <button type="submit" class="btn btn-theme fa fa-search form-control-feedback rounded"></button>
                                    </div>
                                </form>
                            </li>
                            <!--/ End form search -->

                        </ul><!-- /.nav navbar-nav navbar-left -->
                        <!--/ End left navigation -->

                        <!-- Start right navigation -->
                        <ul class="nav navbar-nav navbar-right"><!-- /.nav navbar-nav navbar-right -->

                       
                       
                        <!-- Start profile -->
                        <li class="dropdown navbar-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="meta">
                                  <span style="color:#777;">Hello</span>
								  <span class="text hidden-xs hidden-sm text-muted"><?php echo $fetch[$qury->mem_table.'_name']; ?></span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <!-- Start dropdown menu -->
                            <ul class="dropdown-menu animated flipInX">
                                <li class="dropdown-header">Account</li>
                                <li><a href="view-profile.php"><i class="fa fa-user"></i>View profile</a></li>
                                
                                <li><a href="web_setting.php"><i class="fa fa-share-square"></i>Website Setting</a></li>
								<li><a href="logo.php"><i class="fa fa-user"></i>Logo Setting</a></li>
								<li><a href="fav_icon.php"><i class="fa fa-user"></i>Favicon</a></li>
                               
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
                            </ul>
                            <!--/ End dropdown menu -->
                        </li><!-- /.dropdown navbar-profile -->
                        <!--/ End profile -->

                       
                        </ul>
                        <!--/ End right navigation -->

                    </div><!-- /.navbar-toolbar -->
                    <!--/ End navbar toolbar -->
                </div><!-- /.header-right -->
                <!--/ End header left -->

            </header> <!-- /#header -->
            <!--/ END HEADER -->
