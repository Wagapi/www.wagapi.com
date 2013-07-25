<?php
include ($_SERVER["DOCUMENT_ROOT"]."/wgp/wgp.header.php");
if(!empty($_SESSION['session'])){
	$session = unserialize($_SESSION['session']);
	$login = $session->agent->get_login();
}
?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Credits</title>
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
  <?php include ("helper/navbar.php"); ?>
	<div class="container">

			<h1 style="margin-top:40px">Credits</h1>
			<h4 style="text-align: justify;padding-top:50px; padding-bottom:50px;">
				We are part of Microsoft BizSpark Program.
			</h4>			
			<div class="row">
				<div class="span4">
					<a  href="http://www.microsoft.com/bizspark/">
						<img class="media-object" style="max-width: 256px;" src="assets/img/BizSpark_Startup.jpg">
					</a>
				</div>	
			</div>			
			<h4 style="text-align: justify; padding-top:50px; padding-bottom:50px;">
				We encourage people interested in web development and in cloud computing to have a closer look at the following open source projects.
			</h4>
			<ul class="thumbnails" style="padding-top:30px; padding-bottom:30px;">
				<li class="span4">
					<div class="thumbnail" style="border:none">
						<a  href="http://jquery.com/">
							<img class="media-object" style="max-width: 256px;" src="/ui/logos/jQuery/jQuery_logo_color_onwhite.png">
						</a>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail" style="border:none">
						<a  href="http://jqueryui.com/">
							<img class="media-object" style="max-width: 256px;" src="/ui/logos/jQuery/jQuery__UI_logo_color_onwhite.png">
						</a>
					</div>
				</li>		
				<li class="span4">
					<div class="thumbnail" style="border:none">
						<a href="http://jquerymobile.com/">
							<img class="media-object" style="max-width: 256px;" src="/ui/logos/jQuery/jquery-logo.png">
						</a>
					</div>
				</li>	
				<li class="span4">
					<div class="thumbnail" style="border:none">
						<a  href="http://www.ubuntu.com/">
							<img class="media-object" style="max-width: 256px;" src="/ui/logos/jQuery/logo-ubuntu_su-orange-hex.png">
						</a>
					</div>	
				</li>	
				<li class="span4">
					<div class="thumbnail" style="border:none">
						<a  href="http://hadoop.apache.org/">
							<img class="media-object" style="max-width: 256px;" src="/ui/logos/jQuery/hadoopelephant_rgb.png">
						</a>
					</div>	
				</li>			
			</ul>		

	</div>

      <!-- Footer
    ================================================== -->
  <?php include ("helper/footer.php"); ?>



  

</body></html>