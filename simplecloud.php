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
    <title>SimpleCloud</title>
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
	.block {
		background: -moz-linear-gradient(center top , #F6F6F6, #DFDFDF) repeat scroll 0 0 transparent;
		background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#F6F6F6), to(#DFDFDF));
		-webkit-box-shadow: 0 0 3px #999999;
		border: 1px solid #999999;
		border-radius: 5px 5px 5px 5px;
		box-shadow: 0 0 3px #999999;
		margin-bottom: 12px;
		padding: 10px;
		position: relative;
		-o-background-size: 100% 100%;
		-moz-background-size: 100% 100%; 
		-webkit-background-size: 100% 100%
	}			
</style>


<?php include ("helper/google-analytics.php"); ?>
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">

      <!-- Navbar
    ================================================== -->
  <?php include ("helper/navbar.php"); ?>


<div class="jumbotron subhead">
  <div class="container">
  
	<div class="row">
		<div class="span7">
			<h1>SimpleCloud</h1>
			<p>A simple html interface to leverage the power of cloud storage !</p>		
		</div>
		<div class="span5" >
			<div style="margin: auto; text-align:center;">
			<img src="/ui/icons/iCloud-arrow-nowhite.png" style="max-width:230px">
			</div>
		</div>	
	</div>
    <ul class="masthead-links">
      <li>
        Version 0.6
      </li>
	  <li>
	  </li>
    </ul>
  </div>
</div>

<div class="container" >
<img src="/com/rsc/dgn/beta-en.png" style="position:absolute;top:30px;left:0px;" >
  <div class="marketing">
					<p>
						<div class="row">	
							<div class="span12">
							<a href="/wgp/" class="btn btn-primary btn-large" >Access SimpleCloud</a>
							</div>
						</div>	
					</p>	
					
 </div>
 
        <div class="tabbable" style="margin-bottom: 18px;">
              <ul class="nav nav-tabs">
			  <li class="active"><a href="#tab0" data-toggle="tab">Introduction</a></li>
                <li><a href="#tab1" data-toggle="tab">Presentation</a></li>
                <li><a href="#tab2" data-toggle="tab">Tutorial</a></li>
              </ul> 	
			  <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
    <!-- First tab
    ================================================== -->			  
                <div class="tab-pane active" id="tab0">
	<div class="row">	
	<div class="span12" style="text-align:center;">
	<h2 >Share, broadcast, sort and retrieve documents instantly with SimpleCloud !</h2>	
		<div style="text-align:center;margin:auto; padding:0px 0px 30px 0px">
			<img src="/ui/icons/iCloud-arrow.png" style="max-width:230px">
			<img src="/ui/icons/all-terminals2.png" style="max-width:300px">
		</div>								
	</div>						
		

	</div>
	<div class="row">
		<div class="span12" style="text-align:center;">
		<h3 class="wgp-color" >Why experiencing SimpleCloud ?</h3>
		</div>	
		<div class="span10 offset2">
		<ul>
			<li style=" display : list-item; list-style-image : url(/ui/icons/check.png); padding:1px 0px 1px 0px">
				<div style="text-align:center;">
					<h4 class="wgp-color" style="text-align:left;vertical-align:middle" >A simple but powerful interface to quickly get your documents online.</h4>
				</div>							
			</li>					
			<li style=" display : list-item; list-style-image : url(/ui/icons/check.png); padding:1px 0px 1px 0px">
				<div style="text-align:center;margin:auto; padding:0px 0px 0px 0px">
					<h4 class="wgp-color" style="text-align:left;vertical-align:middle" >No client software, no headache. As simple as a webmail !</h4>
				</div>							
			</li>
			<li style=" display : list-item; list-style-image : url(/ui/icons/check.png); padding:1px 0px 1px 0px">
				<div style="text-align:center;">
					<h4 class="wgp-color" style="text-align:left;vertical-align:middle" >A great user experience on most devices including tablets and through any recent web navigator.</h4>
				</div>	
			</li>
		</ul>
		</div>	
	</div>	
	<div style="text-align:center;">
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >
					<img src="/ui/logos/firefox-medium.png" width=42 style="width:42px">
				</span>							
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >				
					<img src="/ui/logos/chrome-medium.png" width=42 style="width:42px">
				</span>					
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >								
					<img src="/ui/logos/safari-medium.png" width=42 style="width:42px">
				</span>						
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >	
					<img src="/ui/logos/iexplorer-medium.png" width=42 style="width:42px">
				</span>												
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >			
					<img src="/ui/logos/opera-medium.png" width=42 style="width:42px">
				</span>													
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >			
					<img src="/ui/logos/linux-medium.png" width=42 style="width:42px">
				</span>						
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >						
					<img src="/ui/logos/macos-medium.png" width=42 style="width:42px">
				</span>													
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >					
					<img src="/ui/logos/windows-medium.png" width=42 style="width:42px">
				</span>											
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >				
					<img src="/ui/logos/android-medium.png" width=42 style="width:42px">
				</span>					
				<span class="block" style="padding:1px 1px 1px 1px; width:42px; height:42px; display: inline-block;" >
					<img src="/ui/logos/ios-medium.png" width=42 height=42 style="width:42px; height:42px">
				</span>							
		</div>				
				</div>
				<div class="tab-pane" id="tab1">
				
					<h3 class="wgp-color" style="text-align:center;padding:10px 0px 10px 0px">Main features</h3>

					<div style="text-align: justify;font-size:12px; padding:10px 0px 10px 0px">
						<div style="width:50%;float:left;text-align: center;">
							<div style="padding:0px 20px 0px 20px;">
								<div style="text-align:center"><img src="/ui/icons/bulb-small.png" style="vertical-align:middle;height:69px;" class="block"></div>
								<h3 class="wgp-color" style="padding:0px 0px 10px 0px">The idea behind the service</h3>
								<h4 class="wgp-color">Wagapi is designed to help you store, manage and exchange your documents through a simple and straightforward interface.</h4>
								<p class="wgp-color" style="text-align: justify;font-size:12px;" >
								Wagapi works as an email service dedicated not to emails, but to documents. It can be used as a tool for collaborative work.
								</p>
								<p class="wgp-color" style="text-align: justify;font-size:12px;" >It brings an answer to several issues : 
									<ul class="wgp-color">
									<li>
									<h4 class="wgp-color" style="text-align: justify;font-size:12px;">getting rid of the technical limits of classical mailing systems</h4>
									</li>
									<li>
									<h4 class="wgp-color" style="text-align: justify;font-size:12px;">having a dedicated and optimized interface to manage documents</h4>
									</li>
									<li>
									<h4 class="wgp-color" style="text-align: justify;font-size:12px;">share documents from anywhere in a few clicks and in no time</h4>
									</li>							
								</ul>
								</p>		
								<p class="wgp-color" style="text-align: justify;font-size:12px;" >
								<h4 class="wgp-color" style="text-align: justify;">Wagapi suits individuals as well as organizations.</h4>
								</p>		
							</div>
						</div>
						<div style="width:50%;float:left;margin:auto;height:auto">
							<div style="border-width:0px 0px 0px 3px; border-style:solid; border-color:#999;padding:0px 20px 0px 20px;height:100%">
							<div style="text-align:center"><img src="/ui/icons/black-gears-small.png" style="vertical-align:middle" class="block"></div>
							<h3 class="wgp-color" style="text-align: center;">Key features</h3>
							<ul style="padding:0px 0px 0px 20px; margin:12px 0px 12px 20px">							
							<li style=" display : list-item; list-style-image : url(/ui/icons/check-smaller.png); list-style-position: outside; list-style-type: none;">
								<h4 class="wgp-color" style="font-size:14px;">Store safely on the long term documents to be exchanged or published over internet.</h4>
							</li>
							<li style=" display : list-item; list-style-image : url(/ui/icons/check-smaller.png); list-style-position: outside; list-style-type: none;">
								<h4 class="wgp-color" style="font-size:14px;">Send instantly documents of any size to as many people as needed</h4>
							</li>	
							<li style=" display : list-item; list-style-image : url(/ui/icons/check-smaller.png); list-style-position: outside; list-style-type: none;">
								<h4 class="wgp-color" style="font-size:14px;">Exchange documents with other wagapi users with the benefits of wagapi's automatic sorting system</h4>
							</li>
							<li style=" display : list-item; list-style-image : url(/ui/icons/check-smaller.png); list-style-position: outside; list-style-type: none;">								
								<h4 class="wgp-color" style="font-size:14px;">Create document galeries to be accessed for a limited or unlimited amount of time by a limited or unlimited number of people !</h4>
							</li>
							</ul>
							<h4>All this with only a few clicks !</h4>
							</div>
						</div>
						<div style="clear:both;">
						</div>							
					</div>					
					


					<div style="text-align: justify;font-size:12px; padding:10px 0px 10px 0px">
						<div style="width:50%;float:left;text-align: center;">
							<div style="padding:0px 20px 0px 20px;">
								<div style="text-align:center"><img src="/ui/icons/gpu-small.png" style="vertical-align:middle;max-width:69px;max-height:69px;" class="block"></div>
								<h3 class="wgp-color" style="text-align: center;">Technical aspects</h3>							
								
								<div style="text-align: justify;font-size:12px; padding:10px 0px 10px 0px">
									<p>
									<img src="/ui/icons/all-terminals2.png" style="width:80px; float:left; margin:0px 6px 0px 0px">
									<span style="font-weight:bold">Ease of deployment </span> – The service is a web application that can be accessed from any recent web browser. It was successfully tested with :
									<ul class="wgp-color">
										<li>
										<h4 class="wgp-color" style="text-align: justify;font-size:14px;">Android 2.2+.</h4>
										</li>
										<li>
										<h4 class="wgp-color" style="text-align: justify;font-size:14px;">iOS on iPhone3/3+/4/4s and iPad.</h4>
										</li>
										<li>
										<h4 class="wgp-color" style="text-align: justify;font-size:14px;">Opera 10+, Firefox 4+, Chrome under Windows and MacOS</h4>
										</li>	
										<li>
										<h4 class="wgp-color" style="text-align: justify;font-size:14px;">Internet Explorer 7+ under Windows</h4>
										</li>										
										<li>
										<h4 class="wgp-color" style="text-align: justify;font-size:14px;">Firefox12+ under Linux</h4>
										</li>										
									</ul>									
									</p>	
					
								</div>

								<div style="text-align: justify;font-size:12px; padding:10px 0px 10px 0px">
									<p>
									<img src="/ui/icons/mobile-small.png" style="width:40px; float:left; margin:0px 16px 0px 10px">
									<span style="font-weight:bold">Mobile apps </span> – Dedicated mobile applications are under development for iOS and Android systems. While they will keep the logic of the web application, they will give access to devices native functions and an imporved user experience.
									</p>				
								</div>								
								
								<div style="text-align: justify;font-size:12px; padding:10px 0px 10px 0px">
									<p>
									<img src="/ui/icons/combination-padlock-smaller.png" style="width:60px; float:left; margin:0px 6px 0px 0px">
									<span style="font-weight:bold">Protection and confidentiality </span> – All connections to the service are secured and ciphered through SSL with a 256 bits certificate, the same technology used to secured online banking. Data hosted on the service are as secured as on any web mail service. Data are stored on protected infrastructures. 
									</p>				
								</div>

								<div style="text-align: justify;font-size:12px; padding:10px 0px 10px 0px">
									<p>
									<img src="/ui/icons/stack-small.png" style="width:60px; float:left; margin:0px 6px 0px 0px" >
									<span style="font-weight:bold">Protecting physical intergrity of data </span> – Data hosted on the platform are protected against physical loss which is usually not the case on individual devices like phones or personal computers.
									</p>
								</div>
								
								<div style="text-align: justify;font-size:12px;padding:10px 0px 10px 0px">
									<p>
									<img src="/ui/icons/diag-small.png" style="width:60px; float:left; margin:0px 6px 0px 0px;" >
									<span style="font-weight:bold">Availability</span> – We have full and deep control over our infrastructure from A to Z which guarantees a high level of availability.
									</p>
								</div>
							</div>
						</div>	
						<div style="width:50%;float:left;margin:auto;height:auto">
							<div style="border-width:0px 0px 0px 3px; border-style:solid; border-color:#999;padding:0px 20px 0px 20px;height:100%">
							<div style="text-align:center"><img src="/ui/icons/avantage.png" style="vertical-align:middle;max-width:69px;max-height:69px;" class="block"></div>
							<h3 class="wgp-color" style="text-align: center;">Main advantages</h3>
							
								<div class="block" style="width:50%; margin:30px auto auto auto;" >
									<p style="text-align: center;font-size:12px;margin:0px 0px 0px 0px">
									For individuals
									</p>
								</div>
								<div style="text-align: justify;font-size:12px; padding:0px 0px 0px 0px">
									<p>
										<span style="font-weight:bold">Sharing gets more simple</span> – Once uploaded, documents can be shared instantly with anybody. Publishing galleries of documents is as easy as sending an email, the system takes care of formatting everything. User don't need to store their documents locally on their devices anymore.
									</p>	
								</div>									
								<div style="text-align: justify;font-size:12px; padding:0px 0px 0px 0px">
									<p>
										<span style="font-weight:bold">Ease of use and access </span> – The User Interface is meant to be simple and homogenous under all kind of devices and systems in order. The learning processus is supported by video tutorials and new signed up users are only minutes away from mastering the whole interface.
									</p>	
								</div>	
								<div style="text-align: justify;font-size:12px; padding:0px 0px 0px 0px">
									<p>
										<span style="font-weight:bold">Stored and exchanged documents can be accessed in no time</span> – Wagapi provides a powerful tagging system to help users find back their documents faster.
									</p>	
								</div>								
								<div style="text-align: justify;font-size:12px; padding:0px 0px 0px 0px">
									<p>
										<span style="font-weight:bold">Access your data everywhere and anytime </span> – Documents can be accessed, viewed and sent from anywhere, it requires only a limited internet access. 
									</p>	
								</div>								
								<div class="block" style="width:50%; margin:30px auto auto auto;" >
									<p style="text-align: center;font-size:12px;margin:0px 0px 0px 0px">
									For corporations
									</p>
								</div>									
								<div style="text-align: justify;font-size:12px; padding:0px 0px 0px 0px">
										<p>					
											<span style="font-weight:bold">Optimizing resources usage </span> – Usual means of exchange like emails lead to the uncontrolled duplication of files, which in return increase the need for infrastructure resources. Wagapi partly solves this issue and additionally reduces the need for backups.
										</p>						
								</div>									
								<div style="text-align: justify;font-size:12px; padding:0px 0px 0px 0px">
										<p>					
											<span style="font-weight:bold">Saving bandwidth </span> – By decreasing file transfers over the network, the service decreases the overall need for bandwidth and allows thus either for cost savings or for a more comfortable overall user experience with existing resources.
										</p>						
								</div>	
								<div style="text-align: justify;font-size:12px; padding:0px 0px 0px 0px">
										<p>					
											<span style="font-weight:bold">Simplifying infrastructures </span> – Exchanging documents between companies is made simple through Wagapi and eliminates the need for hosted ftp services, while bringing the advantages of a platform as a service : no maintenance is required, users benefit of regular upgrades and improvments. 
										</p>						
								</div>									
							</div>
						</div>
						<div style="clear:both;">
						</div>														
					</div>
					
					<div style="text-align: justify;font-size:12px; padding:10px 0px 10px 0px">
						<div style="width:50%;float:left;text-align: center;">
							<div style="padding:0px 20px 0px 20px;">
								<div style="text-align:center"><img src="/ui/icons/search-documents-small.png" style="vertical-align:middle;max-width:69px;max-height:69px;" class="block"></div>
								<h3 class="wgp-color" style="text-align: center;">Interface</h3>							
								
								<div style="text-align: justify;font-size:12px; padding:10px 0px 10px 0px">
									<h4 class="wgp-color" style="font-size:14px;">Wagapi's interface is based on state of the art frameworks and technologies leading to a better responsiveness for an improved user experience</h4>
									<ul>							
									<li style=" display : list-item; list-style-image : url(/ui/icons/check-smaller.png); ">
										<h4 class="wgp-color" style="font-size:14px;">The interface is homogeneous from one device to another which makes it easy to switch from your PC to your tablet or your phone.</h4>
									</li>
									<li style=" display : list-item; list-style-image : url(/ui/icons/check-smaller.png); ">
										<h4 class="wgp-color" style="font-size:14px;">Selecting, tagging, sharing hundreds of documents at once is not only possible but also easy to perform</h4>
									</li>	
									<li style=" display : list-item; list-style-image : url(/ui/icons/check-smaller.png); ">
										<h4 class="wgp-color" style="font-size:14px;">The embedded tagging system saves a lot of time when it comes to looking up for documents or characterizing new documents. It allows in particular for tags sharing between users.</h4>
									</li>										
									<li style=" display : list-item; list-style-image : url(/ui/icons/check-smaller.png); ">
										<h4 class="wgp-color" style="font-size:14px;">Several types of documents can be viewed directly through the applications thanks to internal and external viewing services. (pictures, several text formats including MS Office .doc and .docx....)</h4>
									</li>
									<li style=" display : list-item; list-style-image : url(/ui/icons/check-smaller.png); ">							
										<h4 class="wgp-color" style="font-size:14px;">The interface is light and very responsive even on old material.</h4>
									</li>
									</ul>
									<div style="text-align:center;margin:30px auto 40px auto"><img src="/com/rsc/pic/search.jpg" style="vertical-align:middle;max-width:80%;" class="block"></div>
								</div>
							</div>
						</div>	
						<div style="width:50%;float:left;margin:auto;height:auto">
							<div style="border-width:0px 0px 0px 3px; border-style:solid; border-color:#999;padding:0px 20px 0px 20px;height:100%">
							<div style="text-align:center"><img src="/ui/icons/search-documents-small.png" style="vertical-align:middle;max-width:69px;max-height:69px;" class="block"></div>
							<h3 class="wgp-color" style="text-align: center;">A few screenshots</h3>
							<div style="text-align:center;margin:30px auto 40px auto"><img src="/com/rsc/pic/wagapi-sc1.jpg" style="vertical-align:middle;max-width:80%;" class="block"></div>
							<div style="text-align:center;margin:30px auto 40px auto"><img src="/com/rsc/pic/actions.jpg" style="vertical-align:middle;max-width:80%;" class="block"></div>
							</div>
						</div>
						<div style="clear:both;">
						</div>														
					</div>									
				
				
				
				
				</div>
				<div class="tab-pane" id="tab2">
				<h2>Available soon !</h2>	
				</div>				
				
				</div>				
		</div>
		</div>

	
						

</div>

      <!-- Footer
    ================================================== -->
  <?php include ("helper/footer.php"); ?>



  

</body></html>