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
    <title>Smartshare</title>
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


<div class="jumbotron subhead">
  <div class="container">
	<div class="row">
		<div class="span7">
			<h1>Smartshare</h1>
			<p>Empower your messaging system with the cloud !</p>		
		</div>
		<div class="span5" >
			<div style="margin:0 auto; text-align:center;">
				<iframe style="max-width:100%;"  src="http://www.youtube.com/embed/cb3sq7LNzf4" frameborder="0" allowfullscreen=""></iframe>	
			</div>
		</div>	
	</div>
    <ul class="masthead-links">
      <li>
        Version 1.0
      </li>
	  <li>
	  Available now for Outlook 2010 and Outlook 2007
	  </li>
    </ul>
  </div>
</div>

<div class="container" >

  <div class="marketing">
					<p>
						<div class="row">	
							<div class="span12">
							<a href="" class="btn btn-primary btn-large contact" >Interested ? Get in touch with us !</a>
							</div>
						</div>	
					</p>	

        <!--     <div class="tabbable" style="margin-bottom: 18px;">
              <ul class="nav nav-tabs">
			  <li class="active"><a href="#tab0" data-toggle="tab">Introduction</a></li>
                <li><a href="#tab1" data-toggle="tab">Presentation</a></li>
                <li><a href="#tab2" data-toggle="tab">Plans and pricing</a></li>
              </ul>
              <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;"> -->	
    <!-- First tab
    ================================================== -->			  
             <!--   <div class="tab-pane active" id="tab0"> -->	
					<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object" style="width: 128px;" src="./assets/img/doc-email.png">
									</a>
									<div class="media-body">
										<h2>Exchange documents faster through your messaging system !</h2>
										<p class="marketing-byline">Looking for a simple solution to combine the advantages of messaging systems and the flexibility of cloud based documents exchange systems ? Look no further !</p>
									</div>
					</div>
					<div class="row">
					  <div class="span4">
						<h4>Save money, save time</h4>
						<p>
						Sending large documents is a hassle ? You spend hours recovering space in your inbox ? Archives are a real burden ? It is now all behind you. Smartshare will change your life.
						</p>
					  </div>
					  <div class="span4">
						<h4>Control your document flows</h4>
						<p>Smartshare helps you get control of the documents flows in your organisation with a single channel for all exchanges.</p>
					  </div>
					  <div class="span4">
						<h4>Enjoy the simplicity of a well-thought application</h4>
						<p>Enjoy a painless deployment of Smartshare in SaaS or host the server on your own infrastructure. It's all up to you, we can provide both !
						
						</p>
					  </div>
					</div>

              <!--  </div> -->	
    <!-- Second tab
    ================================================== -->				
			
					<div class="row">
						<div class="span12">					
							<img src="./assets/img/ui1.png" class="img-polaroid">
						</div>						  
					</div>			
			<hr class="bs-docs-separator">					
           <!--     <div class="tab-pane" id="tab1"> -->
					<div class="row">
						<div class="span4">
							<h4 class="text-error" style="text-align:justify">New features for you emails</h4>
						</div>	
						<div class="span8">
							<ul style="text-align:justify">
								<li>Send heavy documents in a glimpse (up to 4Gb)</li>
								<li>Give access to hundreds of documents with a single click</li>
								<li>Secure and protect shared resources with authentification based accesses</li>
							</ul>								
							
						</div>		
					</div>	
					<hr class="bs-docs-separator">
					<div class="row">
						<div class="span4">
							<h4 class="text-error" style="text-align:justify">Along with several benefits
						</div>						
						<div class="span8">
							<ul style="text-align:justify">
								<li>Saves gigabytes of space in the mailbox and significant time for the user</li>
								<li>Gives better control over data exchanged with external entities</li>
								<li>Saves bandwidth and time thanks to caching mechanisms</li>
							</ul>								
							</h4>
						</div>
						
					</div>
					<hr class="bs-docs-separator">
					
					<div class="row">
						<div class="span4">
						<h4 class="text-error" style="text-align:justify">Designed for simplicity</h4>
					
						</div>	
						<div class="span8">
							<ul style="text-align:justify">
								<li>New buttons give direct access to Smartshare's function from your messaging system.</li>
								<li>Standard secured URLs give access to shared resources to avoid attaching plain documents content</li>
								<li>Recipients simply click on the link to access documents</li>
							</ul>						

						</div>						  
					</div>	

					
					<hr class="bs-docs-separator">
					
					<div class="row">
						<div class="span4">
							<h4 class="text-error" style="text-align:justify">Easy to deploy</h4>

						</div>	
						<div class="span8">
						<ul style="text-align:justify">
							<li>Setting up the service on a single computer can be done in less than a minute.</li>
							<li>Deploying the service on hundreds of computer is a matter of minutes with usual deployment tools.</li>	
						</ul>	
						</div>						  
					</div>	
					
					<hr class="bs-docs-separator">
					
					<p>
						<div class="row">	
							<div class="span12">
							<a href="" class="btn btn-primary btn-large contact" >Interested ? Get in touch with us !</a>
							</div>
						</div>	
					</p>					
               <!--  </div> -->
    <!-- 3rd tab
    ================================================== 				
                <div class="tab-pane" id="tab2">
                  <p>
					<div class="row">	
					  <div class="span12">
						<h3>A range of plans tailored to your needs</h3>
						<p>
						</p>
					  </div>
					   <div class="span3">
						<div class="thumbnail">
							<h4>Basic</h4>
							<p>1Gb of storage space</p>
							<p>100Mb maximum file size </p>
							<p>Maximum file availability : 3 month</p>
							<p>Limited support</p>
						</div>
					  </div>
					   <div class="span3">
						<div class="thumbnail">
							<h4>Extended</h4>
							<p>Unlimited storage space</p>
							<p>2Gb maximum file size</p>
							<p>Maximum file availability : 2 years (more upon request)</p>
							<p>Full support</p>
						</div>
					  </div>
					   <div class="span3">
						<div class="thumbnail">
							<h4>Business</h4>
							<p>Unlimited storage space</p>
							<p>4Gb maximum file size</p>
							<p>Unlimited file availability</p>
							<p>Tracking available</p>
							<p>Admin console available</p>
							<p>Full support</p>
						</div>
					  </div>					  
					  <div class="span3">
						<div class="thumbnail">
							<h4>Corporate</h4>
							<p>Available upon request</p>
							<p>Full system on your own infrastructure</p>
						</div>
					  </div>					  	  
					</div>						
					</p>
					<p>				
					<div class="row">	
					   <div class="span3">
						<div class="thumbnail">
							<p>10$/user/year</p>
						</div>
					  </div>
					   <div class="span3">
						<div class="thumbnail">
							<p>50$/user/year</p>
							<p>Volume discounts available</p>
						</div>
					  </div>
					   <div class="span3">
						<div class="thumbnail">
							<p>100$/user/year</p>
							<p>Volume discounts available</p>
						</div>
					  </div>					  
					  <div class="span3">
						<div class="thumbnail">
							<p>Contact us</p>
						</div>
					  </div>					  	  
					</div>					
				  </p>				  			  
              </div>
			  -->	
            </div> <!-- /tabbable -->

			</div>
  </div>

</div>

      <!-- Footer
    ================================================== -->
  <?php include ("footer.php"); ?>



  

</body></html>
