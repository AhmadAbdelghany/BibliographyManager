
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title> Bibliography Manager | Sign up</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="<?php echo URL; ?>public/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo URL; ?>public/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="<?php echo URL; ?>public/css/icon-font.min.css" type='text/css' />
<script src="<?php echo URL; ?>public/js/Chart.js"></script>
<link href="<?php echo URL; ?>public/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo URL; ?>public/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="<?php echo URL; ?>public/js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
  
 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h3>Register Here</h3>
						<p class="creating">Please enter your details.</p>
						<h5>Personal Information</h5>
						<form action="<?php echo URL_WITH_INDEX_FILE . 'home/addUser'?>" method="POST">
						<div class="sign-u">
							<div class="sign-up1">
								<h4>First Name* :</h4>
							</div>
							<div class="sign-up2">
								<input name="firstName" type="text" placeholder=" " required=" "/>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Last Name* :</h4>
							</div>
							<div class="sign-up2">
								<input name="lastName" type="text" placeholder=" " required=" "/>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Email Address* :</h4>
							</div>
							<div class="sign-up2">
									<input name="email" type="email" placeholder=" " id="email" required />
							</div>
							
							<div class="clearfix"> </div>
						</div>
						<h6>Login Information</h6>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Password* :</h4>
							</div>
							<div class="sign-up2">
								<input name="password" type="password" placeholder=" " required=" "/>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Confirm Password* :</h4>
							</div>
							<div class="sign-up2">
								<input type="password" placeholder=" " required=" "/>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sub_home">
							<div class="sub_home_left">
								<input type="submit" value="Submit">
							</div>
							<div class="sub_home_right">
								<p>Already registered? <a href="<?php echo URL_WITH_INDEX_FILE . 'home/'?>login">Login</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					  </form>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer>
			   <p>&copy 2015 Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
			</footer>
        <!--footer section end-->
	</section>
	
<script src="<?php echo URL; ?>public/js/jquery.nicescroll.js"></script>
<script src="<?php echo URL; ?>public/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
</body>
</html>