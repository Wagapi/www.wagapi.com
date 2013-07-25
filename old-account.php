<?php
include ($_SERVER["DOCUMENT_ROOT"]."/wgp/wgp.header.php");
require_once 'lib/Services/Paymill/Payments.php';
require_once 'lib/Services/Paymill/Clients.php';
require_once 'lib/Services/Paymill/Subscriptions.php';
require_once 'lib/Services/Paymill/Offers.php';
include(W_PHP.'wgp.smrt.php');
if(!empty($_SESSION['session'])){
	$session = unserialize($_SESSION['session']);
	$login = $session->agent->get_login();
}else{header("Location:./");exit;}
$smrt = new smartshare($session->engine);
?>
<?php $info = $session->agent->get_account_info(); ?>


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

<?php include ("helper/google-analytics.php"); ?>
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">

      <!-- Navbar
    ================================================== -->
	<?php include ("helper/navbar.php"); ?>

  <div class="container" style="padding:40px;" >
		<h1>Your account</h1>
		


	
        <div class="tabbable" style="margin-bottom: 18px;">
              <ul class="nav nav-tabs">
			  <li class="active"><a href="#tab0" data-toggle="tab">General</a></li>
                <li><a href="#tab1" data-toggle="tab">Manage Links</a></li>
                <li><a href="#tab2" data-toggle="tab">Subscription</a></li>
				<li><a href="#tab3" data-toggle="tab">Devices</a></li>
              </ul> 	
			  <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
    <!-- First tab
    ================================================== -->			  
                <div class="tab-pane active" id="tab0">
					<h3 style="padding-top:20px;">Identity</h3>
					<div class="row" style="text-align:center;padding-top:20px;">
					<div class="span3">Email</div>
					<div class="span6"><?php echo($info['email']); ?></div>		
					</div>
					<h4>Change password</h4>
					
					<div class="row " style="text-align:center;padding-top:20px;" >
					
<div class="span9 offset1 well well-large">					

						<form class="form-horizontal" id="pwd-submit" method="POST" action="javascript:reset_pwd()">	
							<div class="control-group">
								<label for="formerpassword" class="control-label">Current password</label>
								<div class="controls controls-row">
								<input type="password" maxlength="20" value="" id="formerpassword" name="formerpassword" class="input-medium span2" placeholder="(max 20 characters)">
								<span class="help-inline span4" id="formerpassword_comment"></span>	
								</div>									
							</div>				
							<div class="control-group">
								<label for="newpassword" class="control-label">New password</label>
								<div class="controls controls-row">
								<input type="password" maxlength="20" value="" id="newpassword" name="newpassword" class="input-medium span2" placeholder="(max 20 characters)">
								<span class="help-inline  span4" id="newpassword_comment"></span>	
								</div>									
							</div>
							<div class="control-group">
								<label for="renewpassword" class="control-label">Retype new password</label>
								<div class="controls controls-row">
								<input type="password" maxlength="20" value="" id="renewpassword" name="renewpassword" class="input-medium span2" placeholder="(max 20 characters)">
								<span class="help-inline  span4" id="renewpassword_comment"></span>
								</div>
							</div>
							<div class="control-group controls-row" >
							<div class="span4">
								<button type="submit" class="btn" id="npwd-submit" >Update password</button>
							</div>
							</div>
						</form>		
					
</div>	
          <!-- sample modal content -->
          <div id="npwd-modal" class="modal hide fade modal-docs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4>Password change</h4>
            </div>
            <div class="modal-body">
				<p class="npwd-modal-msg"></p>
			</div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
            </div>
          </div>					
					</div>
					
					<h3 style="padding-top:20px;">Storage</h3>	
					<div class="row" style="text-align:center;padding-top:20px;">
						<div class="span6 offset3">
							<div class="progress">
							  <div class="bar" style="width: <?php echo(round(100*$info['quota']['used']/$info['quota']['allowed'])); ?>%;"></div>
							</div>		
						</div>	
					</div>			
					<div class="row" style="text-align:center;padding-top:20px;">
					<div class="span3">Used</div>
					<div class="span6"><?php echo(formatBytes($info['quota']['used'])); ?></div>		
					</div>		
					<div class="row" style="text-align:center;padding-top:20px;">
					<div class="span3">Allowed</div>
					<div class="span6"><?php echo(formatBytes($info['quota']['allowed'])); ?></div>		
					</div>	
					<h3 style="padding-top:20px;">API</h3>			
					<div class="row" style="text-align:center;padding-top:20px;">
					<div class="span3">API key</div>
					<div class="span6" id="api-key-box">
					<?php 
						$api_key = $session->agent->get_user_api_key();
						if($api_key ==-1){
							echo("<div><p class='well'>You don't have an API key yet</p></div>");
							echo('<a href="" class="btn btn-primary"  id="api-gen">	Generate your Api key</a>');
						}else{
							echo("<p class='well'>".$api_key."</p>");
						}
					 ?>		
					
					</div>		
					</div>						
				</div>
				
				
				<div class="tab-pane" id="tab1">
				
					<h3 class="wgp-color" style="text-align:center;padding:10px 0px 10px 0px">Manage links</h3>
					<p style="text-align:center">You can retrieve here all shared documents, and destroy the sharing link if need be.</p>
					<div>
					<div class="row">
						<div class="span1 offset3">
							Validity
						</div>	
						<div class="span1">
							Original link
						</div>
						<div class="span1">
							Number of documents
						</div>			
						<div class="span1">
							Check documents
						</div>	
						<div class="span2">
							Shared with
						</div>	
						<div class="span1">
							
						</div>		
						
					</div>	
					<?php 
						$links = $session->agent->list_user_open_repositories(); 
						foreach($links as $i=>$link){
							?>
							<div class="row rem-token" id=<?php echo('"'.$link['token'].'"'); ?>>
							
							
								<div class="span1 offset3 date">
									<?php 
									/*if($link['validity']==4294967295){echo('Unlimited');}else{echo($link['validity']);}*/ 
									echo($link['validity']); 
									?>
								</div>							
								<div class="span1">
									<a target="_blank" href=<?php echo('"'.HOST_ADDR."/wgp/api/reach/in/".$link['token'].'"'); ?>><img src="/ui/icons/search-documents-small.png" style="width:30px;"></a>
								</div>	
								<div class="span1">
									<?php 
										$t = new token($link['token'],$session);
										$doc_set = $t->get_allowed_docs();
										echo($doc_set->count_elements());
										$token_value = $link['token'];
									?>
								</div>
								<div class="span1">
									<a data-toggle="modal" href=<?php /*echo('"#doc-modal-'.$i.'"');*/ echo('"helper/modal-docs.php?token='.$token_value.'"'); ?> data-target=<?php echo('"#doc-modal-'.$i.'"'); ?>><i class="icon-search"></i></a>	
								</div>										
								<div class="span2">
									<?php
										$destination = unserialize($link['source']); 
										if(empty($destination)){echo('Public');}else{echo($destination);}
									?>
								</div>	
								<div class="span1">
									<a href="#" class="rem-token"><i class="icon-remove-sign"></i></a>	
								</div>	
							

          <!-- sample modal content -->
          <div id=<?php echo('doc-modal-'.$i); ?> class="modal hide fade modal-docs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:1583">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Documents</h3>
            </div>
            <div class="modal-body">
	
			</div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
            </div>
          </div>
								
							</div>								
							<?php 
						}
					?>
					</div>						
				
				
				
				
				</div>
				<div class="tab-pane" id="tab2">
					Loading...
					<?php 
						//include('helper/account-smartshare.php');
					?>
					
				</div>	
    <!-- First tab
    ================================================== -->			  
                <div class="tab-pane" id="tab3">
					<h3 style="padding-top:20px;">Devices</h3>
					<div class="row" style="text-align:center;padding-top:20px;">
						<div class="span5 offset2">
							<div class="row">
								<div class="span5">
									<h6>Your authorized instances</h6>
								</div>									
							</div>						
							<div class="row">
								<div class="span4">
									<h6>Device ID</h6>
								</div>
								<div class="span1">

								</div>										
							</div>
							<?php 
								$devices = $session->agent->listDevices('WGPSMARTSHARE');
								foreach($devices as $i=>$device){

								?>	
									<div class="row">
										<div class="span4">
											<h6><?php echo($device['deviceId']);	?>	</h6>
										</div>
										<div class="span1">
											<a href="#" class="rem-device" id="<?php echo($device['deviceId']);	?>"><i class="icon-remove-sign"></i></a>	
										</div>										
									</div>	
								<?php 
								}
							?>							
						
							
						</div>

					</div>				
				
				</div>		
				</div>
		</div>
	
  </div>
<script type="text/javascript">

</script>
<script type="text/javascript" src="https://bridge.paymill.com/"></script>

      <!-- Footer
    ================================================== -->
  <?php include ("helper/footer.php"); ?>

  <script src="assets/js/dateToLocaleFormat.js"></script>
<script>
  var PAYMILL_PUBLIC_KEY = '52577497290ecb5843b477007b30e358';
$(document).ready(function() {
  $("#payment-form").submit(function(event) {
	event.preventDefault();
	//We check if something is wrong.
	var cardnumberflag = paymill.validateCardNumber($('.card-number').val());
	var cardexpirydate = paymill.validateExpiry($('.card-expiry-month').val(), $('.card-expiry-year').val());
	var cardcvcflag = paymill.validateCvc($('.card-cvc').val());
	if(!cardnumberflag){$('.card-number').next('span').html('Invalid card number.');};
	if(!cardexpirydate){$('.card-expiry-year').next('span').html('Invalid expiry date.');}; 
	if(!cardcvcflag){$('.card-cvc').next('span').html('Invalid cvc.');};
	//If something is wrong we exit.
	if(!cardnumberflag || !cardexpirydate || !cardcvcflag){return false;}
    // Deactivate submit button to avoid further clicks	
    //$('.submit-button').attr("disabled", "disabled");	
    paymill.createToken({
      number: $('.card-number').val(),   // required, without spaces and hyphens
      exp_month: $('.card-expiry-month').val(),   // required
      exp_year: $('.card-expiry-year').val(),     // required, four digits e.g. "2016"
      cvc: $('.card-cvc').val(),                  // required
      amount_int: $('.card-amount-int').val(),     // required, integer e.g. "15" for 0.15 EUR
      currency: $('.card-currency').val(), // required, ISO 4217 e.g. "EUR" or "GBP"
      cardholder: $('.card-holdername').val()     // optional
    }, PaymillResponseHandler);                   // this function is described below

    return false;
  });
  
 function PaymillResponseHandler(error, result) {
 console.log(error);
 console.log(result);
  if (error) {
    // Shows the error above the form
    $(".payment-errors").text(error.apierror);
    $(".submit-button").removeAttr("disabled");
  } else {
    var form = $("#payment-form");
    // Output token
    var token = result.token;
	//var token = transaction.identification.uniqueId;
    // Insert token into form in order to submit to server
	var request = [
		"paymillToken=" + token,
		"card-amount=" + $('.card-amount-int').val(),     // required, integer e.g. "15" for 0.15 EUR
		"card-currency=" + $('.card-currency').val(), // required, ISO 4217 e.g. "EUR" or "GBP"
    ].join('&');
    form.append("<input type='hidden' name='paymillToken' value='" + token + "'/>");
				$.ajax({
					type: "POST",
					url: "payment.php?action=processPayment",
					data: request,
					//dataType: "JSON",
					success: function(data){

				   }
				 });	
  }
} 
});

$('.modal-billing-info-btn').on('click',function(event){
	/*var request = [
		"name=" + $('#user_name').val(),
		"address1=" + $('#user_address1').val(),
		"address2=" + $('#user_address2').val(),
		"zip=" + $('#user_zip').val(),
		"state=" + $('#user_state').val(),
		"country=" + $('#user_country').val(),
		"city=" + $('#user_city').val()
	].join('&');*/
	var input = {
		name : $('#user_name').val(),
		address1 : $('#user_address1').val(),
		address2 : $('#user_address2').val(),
		zip : $('#user_zip').val(),
		city : $('#user_city').val(),
		state : $('#user_state').val(),
		country : $('#user_country').val()
	};
	channel_request('set_billing_info',input,'',function(data){
						$('#myModalBillingInfo').modal('hide');
						$('#myModal').modal({remote: 'helper/modal-payment.php',show:true});
	});
			/*	$.ajax({
					type: "POST",
					url: "w_axm.php",
					data: request,
					//dataType: "JSON",
					success: function(data){
						$('#myModalBillingInfo').modal('hide');
						$('#myModal').modal('show');
					}
				 });	*/
});

$('.myModalPaymentBackBtn').on('click',function(event){
						$('#myModal').modal('hide');
						$('#myModalBillingInfo').modal('show');
});
$('.myModalPaymentNextBtn').on('click',function(event){
	event.preventDefault();
	//We check if something is wrong.
	var cardnumberflag = paymill.validateCardNumber($('.card-number').val());
	var cardexpirydate = paymill.validateExpiry($('.card-expiry-month').val(), $('.card-expiry-year').val());
	var cardcvcflag = paymill.validateCvc($('.card-cvc').val());
	if(!cardnumberflag){$('.card-number').next('span').html('Invalid card number.');};
	if(!cardexpirydate){$('.card-expiry-year').next('span').html('Invalid expiry date.');}; 
	if(!cardcvcflag){$('.card-cvc').next('span').html('Invalid cvc.');};
	//If something is wrong we exit.
	if(!cardnumberflag || !cardexpirydate || !cardcvcflag){return false;}
    // Deactivate submit button to avoid further clicks	
    //$('.submit-button').attr("disabled", "disabled");	
    paymill.createToken({
      number: $('.card-number').val(),   // required, without spaces and hyphens
      exp_month: $('.card-expiry-month').val(),   // required
      exp_year: $('.card-expiry-year').val(),     // required, four digits e.g. "2016"
      cvc: $('.card-cvc').val(),                  // required
      amount_int: $('.card-amount-int').val(),     // required, integer e.g. "15" for 0.15 EUR
      currency: $('.card-currency').val(), // required, ISO 4217 e.g. "EUR" or "GBP"
      cardholder: $('.card-holdername').val()     // optional
    }, PaymillResponseHandler);                   // this function is described below

    return false;
	
});

 function PaymillResponseHandler(error, result) {
 console.log(error);
 console.log(result);
  if (error) {
    // Shows the error above the form
    $(".payment-errors").text(error.apierror);
    $(".submit-button").removeAttr("disabled");
  } else {
    var form = $("#payment-form");
    // Output token
    var token = result.token;
	//var token = transaction.identification.uniqueId;
    // Insert token into form in order to submit to server
	var request = [
		"paymillToken=" + token,
		"card-amount=" + $('.card-amount-int').val(),     // required, integer e.g. "15" for 0.15 EUR
		"card-currency=" + $('.card-currency').val(), // required, ISO 4217 e.g. "EUR" or "GBP"
    ].join('&');
    form.append("<input type='hidden' name='paymillToken' value='" + token + "'/>");
				$.ajax({
					type: "POST",
					url: "payment.php?action=processPayment",
					data: request,
					//dataType: "JSON",
					success: function(data){
						$('#myModal').modal('hide');
						$('#myModalFinalizeSubscription').modal({remote: 'helper/modal-finalize-subscription.php',show:true});
				   }
				 });	
  }
}

$('.myModalFinalizeNextBtn').on('click',function(event){
				$.ajax({
					type: "POST",
					url: "payment.php?action=finalizeSubscription",
					data: '',
					//dataType: "JSON",
					success: function(data){
						//$('#myModal').modal('hide');
						$('#myModalFinalizeSubscription').modal('hide');
						$("#tab2").html('');	//Let's empty the tab and reload its content
						$("#tab2").load('helper/account-smartshare.php')
						
						
				   }
				   });
});

	/*$('a[href="#tab2"]').on('shown','#tab2',function(event){
		$("#tab2").load('helper/account-smartshare.php');
	});*/

$('a[data-toggle="tab"]').on('show', function (e) {
	//$("#tab2").html('<div class="row"><div class="span1 offset5"><img href="assets/img/icon_waiting.gif"></div></div>');
	if($(e.target).attr('href')=="#tab2"){$("#tab2").load('helper/account-smartshare.php');}
})	
	

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
							window.location('/');
						}else{
							callback(data);
						}

				   }
				 });					
		}
		
	/*	function generate_api_key(){
			channel_request('generate_api_key','','',function(data){
				if(data!=null && data['api_key']!=undefined){
					
					$('api-key-box').html(data['api_key']);
				}
			})
		}*/
		/*
		function rem_token(event){
			event.preventDefault();
			channel_request('rem_token',$(this).parents('div.rem-token').first().attr('id'),'',function(data){
				if(data!=null && data['result']!=undefined){
					if(data['result']==true){
						$(this).parents('div.rem-token').first().remove();
					}
				}
			})		
		}*/
		
		$('#api-gen').on('click', function(event){
			channel_request('generate_api_key','','',function(data){
				if(data!=null && data['api_key']!=undefined){
					
					$('api-key-box').html(data['api_key']);
				}
			})
		}
		);
		$('a.rem-token').on('click',function(event){
			event.preventDefault();
			var that = $(this);
			channel_request('rem_token',$(this).parents('div.rem-token').first().attr('id'),'',function(data){
				if(data!=null && data['result']!=undefined){
					if(data['result']==true){
						that.parents('div.rem-token').first().remove();
					}
				}
			})		
		});
		$('div.date').each(function(index){
			var timestamp = $(this).html();
			if(timestamp==4294967295){
				$(this).html("Unlimited");
			}else{
				var date = new Date(timestamp*1000);
				var str_date = dateToLocaleFormat(date, '%d/%m/%y', 'en_US');
				$(this).html(str_date);
				
			}
		});
		
		$('.modal-docs').on('shown',function(){
			$(".thumbnail").tooltip();
			//alert($(window).width());
			//$(this).attr('width',$(window).width());
			//$(this).attr('height',$(window).height());
		});
		
	function reset_pwd(){
			//We reset comment boxes content
			$('#formerpassword_comment').text('');
			$('#renewpassword_comment').text('');
			
			var fpwd = $('input#formerpassword').attr('value');
			var pwd = $('input#newpassword').attr('value');
			if($('input#newpassword').attr('value')!=$('input#renewpassword').attr('value')){
				$('#renewpassword_comment').text('Passwords do not match !');	
				//$('#mg_box').text('Passwords do not match !');
				//return false;
			}else{
			var input = new Array(fpwd,pwd);
			channel_request('reset_pwd', input, '',function(data){
				var msg;
				if(data['reset_pwd']['error']==0){
					msg = "Password was reset successfully";	
					$('#npwd-modal').find('p.npwd-modal-msg').html(msg);
					$('#npwd-modal').modal('show');					
				}else if (data['reset_pwd']['error']==1){
					msg = "Error : the password provided is empty";
					$('#renewpassword_comment').text(msg);
				}else if (data['reset_pwd']['error']==2){
					msg = "Error : the password provided is too long (max 20 characters)";
					$('#renewpassword_comment').text(msg);
				}else if (data['reset_pwd']['error']==3){
					msg = "Error : the current password provided is wrong.";
					$('#formerpassword_comment').text(msg);
				}
				//notify.add(msg);
	
			});
			$('input#newpassword').attr('value','');
			$('input#formerpassword').attr('value','');
			$('input#renewpassword').attr('value','');				
			}		
	}

	/*$('#npwd-submit').on('click',function(event){
	event.preventDefault();
	reset_pwd();
	});*/

$('.rem-device').on('click',function(event){
	var id = $(this).attr("id");
	var request = 'rem_device';
	var options = "";
	var that = $(this);
	//$(this).parents('div.row').first().css('background-color', 'red');
	//return true;
	channel_request(request, id, options,function(data){
		/*if(typeof data != 'undefined' ){
			if(typeof data['error'] != 'undefined'){
				//alert("An error happened trying to remove a device: "+data['error']);
			}
		*///}else{
			//var element = $('#'+id).parent('div.row').first();
			//console.log(element);
			//element.remove();
			that.parents('div.row').first().remove();
		//}
	})
});
	
</script>
  

</body></html>