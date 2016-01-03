
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title> Bibliography Manager | Login</title>
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
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<p><span>Sign In to</span> Bib Manager</p>
						</div>
						<div class="signin">
							<form action="<?php echo URL_WITH_INDEX_FILE; ?>home/authenticate" method="POST">
							<div class="log-input">
								<div class="log-input-left">
								   <input name="email" type="text" class="user" value="YourEmail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input name="password" type="password" class="lock" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" value="Login to your account">
						</form>	 
						</div>
						<div class="new_people">
							<h4>For New People</h4>
							<p>Give it a try.</p>
							<a href="<?php echo URL_WITH_INDEX_FILE . 'home/'?>signup">Register Now!</a>
						</div>
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