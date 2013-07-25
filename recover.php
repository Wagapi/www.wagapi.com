<?php
include ($_SERVER["DOCUMENT_ROOT"]."/wgp/wgp.header.php");
//security check

	if(isset($_GET['token'])){
		$token_value = htmlspecialchars($_GET['token'],ENT_QUOTES);
		//$agent = new agent('external','pwd',$token_value);
		//$token_content = $agent->read_token($token_value);
		//if($token_content['type']!=2){exit;}
		//$data = unserialize($token_content['source']);
		//$_SESSION['token'] = $token_value;
		$session = new session($token_value,'');		
		
		//$agent = new agent('external','pwd',$token_value);
		//$token_content = $agent->read_token($token_value);
		$token = new token($token_value,$session);
		//if($token_content['type']!='invitation'){exit;}
		
		//we check if this is a password recovery process token
		//If not, we return a 404 error
		if(($token->get_type()!=4) || !$token->is_valid()){
			header("HTTP/1.0 404 Not Found");
			exit;
		}
		$_SESSION['auth_token']['token']=$token_value;
	}else{exit;}
	$_SESSION['session'] = serialize($session);
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



<div class="container ">
<div class="row" style="padding-top:50px; text-align:center">
<h3>Password recovery procedure</h3>
</div>
	<div class="row" style="padding-top:100px;text-align:center">
	<div class="span3 offset4 well">
	<h4>Enter your new password</h4>
		<form action="javascript:reset_pwd();" method="POST" id="pwd-submit" class="form-horizontal">	
					<div class="control-group">
						<input type="password" name="password" id="reset-password" value="" maxlength="20" placeholder="password" />	
						<span class="help-inline" id="password_comment"></span>
					</div>
					<div class="control-group">
						<input type="password" name="repassword" id="reset-repassword" value="" maxlength="20" placeholder="retype password" />	
						<span class="help-inline" id="repassword_comment"></span>
					</div>					

			<h3 id="mg_box" style="text-align:center;color:red;"></h3>					
					<div class="">
					  <button type="submit" class="btn btn-primary">Send</button>
					</div>
		</form>	
	</div>
	</div>
          <div id="success-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:1583">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Documents</h3>
            </div>
            <div class="modal-body">
				<p>
					You successfully updated your password. Click on the button to be redirected to the main page..
				</p>	
			</div>
            <div class="modal-footer">
              <a href="./" class="btn btn-primary" >Close</a>
            </div>
          </div>		
	

</div><!-- /page one -->
</div>

      <!-- Footer
    ================================================== -->
  <?php include ("helper/footer.php"); ?>

	<script type="text/javascript">
			function channel_request(request, input, options,callback){
			var channel = {}; //on va stocker dans le tableau les différentes données d'entrée à transmettre au serveur
			channel['request'] = request;
			if(input){channel['input'] = input;}	//request input data
			if(options){channel['options'] = options;}	//request input data
			channel['selected_docs'] = [];
			var channel_string = JSON.stringify(channel);
			$.ajax({
					type: "POST",
					url: "/wgp/w_axm.php",
					data: "channel=" + channel_string,
					dataType: "JSON",
					success: function(data){
						if(data!=null && data['redirect']=='auth'){
							window.location('./');
						}else{
							callback(data);
						}

				   }
				 });					
		}
	function reset_pwd(){
			var pwd = $('input#reset-password').attr('value');
			if($('input#reset-password').attr('value')!=$('input#reset-repassword').attr('value')){
				$('#repassword_comment').text('Passwords do not match !');	
				$('#mg_box').text('Passwords do not match !');
				return false;
			}
			channel_request('set_pwd', pwd, '',function(data){
				$('#success-modal').modal('show');		
			});							
	}
	/*$('.redirect').on('click',function(){window.location('/');});*/
	
		function send_login(){
			var login = document.getElementById('login').value;
			if(login.length==0){
				$('#msg').html("Username empty");
			}else{
				var data = 'action=recovery_link&login=' + login;	
				$.ajax({
					type: "POST",
					url: "/wgp/wgp.signup.php",
					data: data,
					dataType: "JSON",
					success: function(data){
						$('#msg').html("You should receive in a few minutes at the provided email address a message detailing the password recovery procedure.");
				   }
				});	
			}
		}	
	
	</script>
  

</body></html>