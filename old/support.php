﻿<?php
include ($_SERVER["DOCUMENT_ROOT"]."/wgp/wgp.header.php");
if(!empty($_SESSION['session'])){
	$session = unserialize($_SESSION['session']);
	$login = $session->agent->get_login();
}
?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Wagapi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">

  <style type="text/css"></style>
  <style type="text/css">.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;border-collapse:collapse;border:0;vertical-align:middle;margin:0}</style>
  <style type="text/css">
	.row-rest {
		margin-top: 5px;
		margin-bottom: 5px;
		}
</style>


  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">

      <!-- Navbar
    ================================================== -->
	<?php include ("navbar.php"); ?>

  <iframe src="https://wagapi.zendesk.com/home" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%" scrolling="auto">
			
		
  </iframe>


      <!-- Footer
    ================================================== -->
  <?php include ("footer.php"); ?>



  

</body></html>