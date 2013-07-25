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

<div class="jumbotron masthead" style="background:none;background-color:#f80;filter:none">
  <div class="container" style="background-color:#f80">
	<div class="row">
		<div class="span6">
				<h1><img  style="width:100px;vertical-align:baseline" src="/ui/logos/Logo-noname-white.png">Wagapi</h1>
				<p>Leverage the cloud for smart and easy sharing !</p>
		
		</div>
		<div class="span4 offset2" style="text-align:left" >

<?php include ("helper/signupfast.php"); ?>		
	 <!-- Navbar	
			<form class="form-horizontal">
			  <div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
				  <input type="text" id="inputEmail" placeholder="Email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				  <input type="password" id="inputPassword" placeholder="Password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <label class="checkbox">
					<input type="checkbox"> Remember me
				  </label>
				  <button type="submit" class="btn btn-primary btn-small">Sign in</button>
				</div>
			  </div>
			</form>		
		    ================================================== -->
		</div>	
	</div>
  </div>
</div>

<div class="container ">
	<div class="row-fluid " style="padding-top:20px;text-align:justify">
	</div>
	<div class="row" style="text-align:center">
					<p>
						<div class="">	
							<div class="span12">
							<p class="well"><strong>To get access to the platform, sign up for a free account and get 2Gb of space, to develop your own apps or use existing apps.</strong></p>

							</div>
						</div>	
					</p>
	</div>
	
	<div class="row-fluid " style="text-align:justify">
            <ul class="thumbnails ">
              <li class="span4 ">
				<div class="thumbnail "  >
					<div style="height:100px;">
					<h2><img src="/ui/logos/Logo-noname.png" style="max-width:128px;max-height:90px">Wagapi</h2>
					</div>
					<div style="height:140px;">
					<p class="" style="padding-top:10px">Wagapi is a cloud storage platform hardcoded, hosted and operated by us. It features an api on top of which several applications can be built. 
					It differs from other storage services by providing a powerful native tagging system instead of a traditional hierarchical storage system to characterize and retrieve data. 
					</p>
					</div>
					<p style="text-align:center;"><button class="btn btn-primary signup-btn"> Sign up !</button></p>
				</div>
              </li>
              <li class="span4 ">
				<div class="thumbnail " >
					<div style="height:100px;">
					<h2><img src="/ui/icons/iCloud-arrow.png" style="max-width:128px;max-height:90px">SimpleCloud</h2>
					</div>
					<div style="height:140px;">
					<p class="" style="padding-top:10px">SimpleCloud is a simple web interface to upload, manage and share files hosted on the Wagapi cloud storage platform.</p>
					<p>In order to access SimpleCloud, you need to have an account with Wagapi.</p>
					</div>
					<p style="text-align:center;"><a class="btn btn-primary" href="simplecloud.php"> Learn more</button></a>
				</div>
				<div class="">
				</div>
              </li>
              <li class="span4">
				<div class="thumbnail" >
					<div style="height:100px;" >
					<h2><img style="max-width: 128px;max-height:90px" src="./assets/img/doc-email.png">Smartshare</h2>
					</div>
					<div style="height:140px;">
					<p class="" style="padding-top:10px">Take a look at SmartShare, a service built on top of Wagapi and designed for seamless integration within Outlook and better management of document flows through mailing systems.</p>
					<p>SmartShare is available with dedicated plans and offers.</p>
					</div>
					<p style="text-align:center;"><a class="btn btn-primary" href="smartshare.php"> Learn more</button></a>				
				</div>
              </li>			  
            </ul>
    </div>
	<div class="row" style="text-align:center">
					<p>
						<div class="">	
							<div class="span12">
							<p class="well"><strong>Premium plans will be available in the coming weeks to increase your space limitations.</strong></p>

							</div>
						</div>	
					</p>
	</div>

</div>

      <!-- Footer
    ================================================== -->
  <?php include ("footer.php"); ?>



  

</body></html>
