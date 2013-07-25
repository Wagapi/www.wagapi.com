<?php
include ($_SERVER["DOCUMENT_ROOT"]."/wgp/wgp.header.php");
if(!empty($_SESSION['session'])){
	$session = unserialize($_SESSION['session']);
	$login = $session->agent->get_login();
	//admin check
	if(!$session->agent->is_admin()){header("Location:./");exit;}else{$sys = new sys();}
}else{header("Location:./");}
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
		<div class="row">
		<div class="span12">
		<h1>Admin Console</h1>
		</div>
		</div>

	
        <div class="tabbable" style="margin-bottom: 18px;">
              <ul class="nav nav-tabs">
			  <li class="active"><a href="#tab0" data-toggle="tab">Service Check</a></li>
                <li><a href="#tab1" data-toggle="tab">Manage Accounts</a></li>
                <li><a href="#tab2" data-toggle="tab">Manage other</a></li>
              </ul> 	
			  <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
    <!-- First tab
    ================================================== -->			  
                <div class="tab-pane active" id="tab0">
					<div class="row">
						<div class="span3 offset4">
						Overall vault size :
						</div>	
						<div class="span3">
						<?php echo round($sys->get_sys_vault_size()/(1024*1024)). 'Mb';?>
						</div>		
					</div>						
				</div>
				<div class="tab-pane" id="tab1">
					<div style="font-size:10px;width:100%;text-align:center">
					<table style = "text-align : center;margin:auto">
					<tr>
						<th>
							Id
						</th>
						<th>
							Login
						</th>
						<th>
							Since
						</th>
						<th>
							First name
						</th>
						<th>
							Last name
						</th>	
						<th>
							Email
						</th>
						<th>
							Last connection
						</th>
						<th>
							IP
						</th>	
						<th>
							Allowed quota
						</th>
						<th>
							Used quota
						</th>	
						<th>
							% used
						</th>		
						<th>
							Exchanged volume
						</th>	
						<th>
							
						</th>	
					</tr>

					<?php
					$users = $sys->list_users();
						//$db_access_info = $sys->get_db_access_info($user['user_id']);
						//$engine_access_data = $db_access_info['user_db_info'];
						//$engine = new engine($engine_access_data);
					$total_size = 0;
					foreach($users as $i => $user){
						$engine = $sys->get_user_engine($user['user_id']);
						$user_id = $user['user_id'];
						$journal = $engine->read_journal_entries();
						$ext_infos = $sys->get_user_ext_info($user['user_id']);
						$quota_info = $sys->get_user_quota_info($user['user_id']);
						$total_size=$total_size+$quota_info['lib_size'];
						$volume = $sys->get_user_exchanged_data_volume($user_id);
						echo '<tr>';
						echo '<td>';
						echo $user['user_id'];
						echo '</td>';
						echo '<td>';
						echo $user['login'];
						echo '</td>';
						echo '<td>';
						echo date('d/m/Y',$user['date_in']);
						echo '</td>';
						echo '<td>';
						if(!empty($ext_infos['first_name'])){echo $ext_infos['first_name'];}
						echo '</td>';		
						echo '<td>';
						if(!empty($ext_infos['last_name'])){echo $ext_infos['last_name'];}
						echo '</td>';		
						echo '<td>';
						if(!empty($ext_infos['email'])){echo $ext_infos['email'];}
						echo '</td>';	
						echo '<td>';
						if(!empty($journal)){echo date('d/m/Y H:i:s',$journal[0]['timestamp']);}
						echo '</td>';	
						echo '<td>';
						if(!empty($journal)){echo $journal[0]['ip'];}
						echo '</td>';	
						echo '<td>';
						echo round($quota_info['quota']/(1024*1024)). 'Mb';
						echo '</td>';
						echo '<td>';
						echo round($quota_info['lib_size']/(1024*1024)). 'Mb';
						echo '</td>';	
						echo '<td>';
						echo round(($quota_info['lib_size']/$quota_info['quota'])*100).' %';
						echo '</td>';
						echo '<td>';
						echo round($volume/(1024*1024)). 'Mb';
						echo '</td>';
						echo '<td>';
						if($sys->get_activation_status($user_id)==0){
							?>
							<div class="user-status"><i class="icon-ban-circle"></i></div>
							<?php
						}else{
							?>
							<div class="user-status"><i class="icon-ok-circle"></i></div>
							<?php							
						}
						echo '</td>';						
						echo '</tr>';
					}
					?>
					</table>
					 
					</div>
					<div class="row" style="padding-top:30px">
						<div class="span3 offset4">
						Apparent total size :
						</div>	
						<div class="span3">
						<?php echo round($total_size/(1024*1024)). 'Mb';?>
						</div>		
					</div>						
				
				</div>
				<div class="tab-pane" id="tab2">
				<h2>Available soon !</h2>	
				</div>				
				
							
				</div>
		</div>
	
  </div>


      <!-- Footer
    ================================================== -->
  <?php include ("helper/footer.php"); ?>

  <script src="assets/js/dateToLocaleFormat.js"></script>
<script>
		function channel_request(request, input, options,callback){
			var channel = {}; //on va stocker dans le tableau les différentes données d'entrée à transmettre au serveur
			channel['request'] = request;
			if(input){channel['input'] = input;}	//request input data
			if(options){channel['options'] = options;}	//request input data
			//channel['selected_docs'] = [];
			var channel_string = JSON.stringify(channel);
			$.ajax({
					type: "POST",
					url: "/wgp/wgp.adm.php",
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
		
		$('.user-status').on('click',function(){
			var that = $(this);
			var id = $(this).parents('tr').first().find('td').first().html();
			var input = {user_id: id};
			channel_request('toggle_account_status', input, '',function(data){
			if(data['toggle_account_status']['status']==200){
				if(data['toggle_account_status']['data']['status']==1){that.html('<i class="icon-ok-circle"></i>');}
				if(data['toggle_account_status']['data']['status']==0){that.html('<i class="icon-ban-circle"></i>');}
			}
			});
		});
		
</script>
  

</body></html>


