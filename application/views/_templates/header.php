<?php 
	if (!$this || !isset($_SESSION["user"])) { 
		exit(header('HTTP/1.0 403 Forbidden')); 
	} 
	
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title> Bibliography Manager </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel='stylesheet' type='text/css' />

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
<body class="sticky-header"  onload="initMap()">
