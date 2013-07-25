<?php
if(!empty($_SESSION['session'])){
?>


<a class="btn btn-large btn-block btn-primary" href="/wgp/" target="_blank">Access SimpleCloud</a>
<a class="btn btn-large btn-block btn-primary" href="./account.php">Settings</a>
<?php
if($session->agent->is_admin()){
?>
<a class="btn btn-large btn-block btn-primary" href="./admin.php">Admin console</a>
<?php
}
?>
<?php
}else{
?>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
	<script type="text/javascript">

/*	$('#signup-user').focusout(function(eventObject){
		
		value = $(this).attr('value');	
		if(!usernameIsValid(value)){
					$(this).parent().addClass("warning");
					$('#signup-user').next('.help-inline').html('<i class="icon-remove-circle"></i>');
					$(this).tooltip({title:'Invalid username',trigger:"focus",placement:"top"});
					return false;
				}
		var data=new Array();
		data.push('action=is_username_available');		
			$.ajax({
					type: "POST",
					url: "/wgp/wgp.signup.php",
					data: channel_string,
					dataType: "JSON",
					success: function(data){
						if(data['is_error']!=0){
							//$('#msg_bar').find('p').first().text(data['error_msg']);
							//$('#msg_bar').attr('display','inline');
							$('#mg_box').text(data['error_msg']);
							
						}else{
							$("#signup-area").fadeOut("fast");
							$('#myModal').modal();
						}
						
				   }
				 });				
					
	});*/
	
	
	function signup(){
		var flag=0;
		var data=new Array();
		data.push('action=signup_fast');
		$('#signup-form').find('input').each(function(index){
			if($(this).attr('type')!='submit'){
				len = $(this).prop('maxlength'); //interdiction d'utiliser length comme nom de variable pour ie
				if($(this).is('#signup-email')){
					v = $(this).attr('value');
					value = v.toLowerCase();		
				}else{
					value = $(this).attr('value');				
				}				
				id = $(this).attr('id');
				if(value.length>len){
					$(this).parent().addClass("warning");
					$(this).tooltip({title:'Max length exceeded,'+value.length+' instead of '+length,trigger:"focus",placement:"top"});
					$(this).tooltip('show');
					flag = 1;
				}else if(value.length==0){
					$(this).parent().addClass("warning");
					$(this).tooltip({title:'Field cannot be empty',trigger:"focus",placement:"top"});				
					$(this).tooltip('show');
					flag = 1;
				}else{
					$('#'+id+'_comment').text('');
					data.push($(this).attr('name')+'='+value);	
				}
			}
		});
		if(flag==0){
			channel_string = data.join('&');
			
			$.ajax({
					type: "POST",
					url: "/wgp/wgp.signup.php",
					data: channel_string,
					dataType: "JSON",
					success: function(data){
						$('.help-inline').html('');
						if(data['error']===undefined){
							$("#signup-area").fadeOut("fast",function(){$("#signup-area").load('helper/signup-success.php',$("#signup-area").fadeIn('fast'));});
							
						}else{

							if(data['error']['email']!=undefined && data['error']['email']['invalid']!=undefined){
								$('#signup-email').next('.help-inline').html('<i class="icon-remove-circle"></i>');
								$('#signup-email').tooltip({title:'Invalid email',trigger:"hover",placement:"left",delay:{show: 500, hide: 100}});
								//$('#signup-user').next('.help-inline').tooltip('show');
							}
							if(data['error']['email']!=undefined && data['error']['email']['unavailable']!=undefined){
								$('#signup-email').next('.help-inline').html('<i class="icon-remove-circle"></i>');
								$('#signup-email').tooltip({title:'This email is already connected to another account - Please pick up another one.',trigger:"hover",placement:"left",delay:{show: 500, hide: 100}});
								//$('#signup-user').next('.help-inline').tooltip('show');
							}
							if(data['error']['email']!=undefined && data['error']['email']['empty']!=undefined){
								$('#signup-email').next('.help-inline').html('<i class="icon-remove-circle"></i>');
								$('#signup-email').tooltip({title:"This field cannot be empty.",trigger:"hover",placement:"left",delay:{show: 500, hide: 100}});
								//$('#signup-user').next('.help-inline').tooltip('show');
							}
							if(data['error']['password']!=undefined && data['error']['password']['empty']!=undefined){
								$('#signup-password').next('.help-inline').html('<i class="icon-remove-circle"></i>');
								$('#signup-password').tooltip({title:"This field cannot be empty.",trigger:"hover",placement:"left",delay:{show: 500, hide: 100}});
								//$('#signup-user').next('.help-inline').tooltip('show');
							}	
	
						}
						
				   }
				 });
		}				 
					
	}
	
	function hasWhiteSpace(s) {
	  return s.indexOf(' ') >= 0;
	}	
	function usernameIsValid(username) {
		return /^[0-9a-z_.-]+$/.test(username);
	}	
	</script>  	
				<div class="span3" id="signup-area"> 
				<h3>Sign up for a free 2Gb account !</h3>  
				
				<form action="javascript:signup();" method="POST" id="signup-form" class="form-horizontal">
      <!-- 

					<div class="control-group controls-row">
						<input class="span2" type="text" name="first_name" id="signup-first_name" maxlength="40" placeholder="First Name"/>					
						<input class="span2" type="text" name="last_name" id="signup-last_name" maxlength="40" placeholder="Last Name"/>								
					</div>	
    ================================================== -->					
					<div class="control-group">
						<input  type="email" name="email" id="signup-email" value="" maxlength="100" placeholder="Email" required />
						<span class="help-inline"></span>						
					</div>	
					<div class="control-group">
						<input type="password" name="password" id="signup-password" value="" maxlength="20" placeholder="password" />	
						<span class="help-inline"></span>
					</div>
					<div class="">
					  <button type="submit" class="btn btn-primary">Sign up</button>
					</div>
					
				</form>		
</div>				
<script>  	
$('#signup-user').tooltip({title:"Max 20 characters - no space and no capitals", trigger:"focus", placement:"right"})
</script>  					

<?php
}
?>
