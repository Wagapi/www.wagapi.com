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
	.footer {
		position: fixed;
		bottom: 0;
		width: 100%;
	}		
</style>

<?php include ("helper/google-analytics.php"); ?>
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">

      <!-- Navbar
    ================================================== -->
	<?php include ("helper/navbar.php"); ?>



	<div class="container" >
	<div class="row" style="padding-top:50px; text-align:center">

	<h3 >Password recovery procedure</h3>

	</div>
	<div class="row" style="padding-top:100px;text-align:center">
	<div class="span3 offset4 well">
			
			<h4>Enter your login/email</h4>
			<form action="javascript:send_login();" method="POST" id="form-submit">
			<div data-role="fieldcontain">
				
				<input type="text" name="login" id="reset-login" value="" maxlength="20"/>		
			</div>
			<button id="submit" type="submit" class="btn btn-primary">Send</button>	
			</form>
	</div>
	</div>
			  <div id="success-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
				<div class="modal-header">
				  
				  <h3>Documents</h3>
				</div>
				<div class="modal-body">
					<p>
						You should receive in a few minutes at the provided email address a message detailing the password recovery procedure.
					</p>	
				</div>
				<div class="modal-footer">
				  <a href="./" class="btn btn-primary redirect" >Close</a>
				</div>
			  </div>		
		

	</div>

      <!-- Footer
    ================================================== -->
  <?php include ("helper/footer.php"); ?>

	<script type="text/javascript">
		function send_login(){
			var login = document.getElementById('reset-login').value;
			if(login.length==0){
				$('#msg').html("Username empty");
			}else{
				var data = 'action=fast_recovery_link&login=' + login;	
				$.ajax({
					type: "POST",
					url: "/wgp/wgp.signup.php",
					data: data,
					dataType: "JSON",
					success: function(data){
						$('#success-modal').modal('show');	
						$('#msg').html("");
				   }
				});	
			}
		}

	/*$('.redirect').on('click',function(e){
		e.preventDefault();
		window.location('http://127.0.0.1/test/web/');
		});*/
	</script>
  

</body></html>