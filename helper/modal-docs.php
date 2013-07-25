<?php
include ($_SERVER["DOCUMENT_ROOT"]."/wgp/wgp.header.php");
if(!empty($_SESSION['session'])){
	$session = unserialize($_SESSION['session']);
	session_write_close(); //to avoid blocking the session
}else{exit;}
if(isset($_GET['token'])){	
	$token_value = htmlspecialchars($_GET['token'],ENT_QUOTES);
}else{exit;}
										$t = new token($token_value,$session);
										$doc_set = $t->get_allowed_docs();
?>
				<ul class="thumbnails">
					<?php 
						foreach($doc_set as $i=>$doc){
							?>				
				  <li class="span1">
					<div class="thumbnail" data-toggle="tooltip" data-placement="bottom" title="<?php echo($doc->get_name().'.'.$doc->get_extension())?>">
					  <img src="/wgp/get.php?action=preview&id=<?php echo($doc->get_id())?>&token=<?php echo($token_value)?>&ext=.jpg" alt="<?php echo($doc->get_name())?>" width=150 height=150 />

					</div>
				  </li>
							<?php 
						}
					?>
				
				</ul>	