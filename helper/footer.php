    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">

					<div class="row">
						<div class="span2 offset1">
							<h5>Home</h5>
							<p>About us</p>
							<p><a href="legal.php">Legal notice</a></p>	
							<p><a href="credits.php">Credits</a></p>	
						</div>
						<div class="span2">
							<h5>Applictions</h5>
							<p><a href="simplecloud.php">SimpleCloud</a></p>
							<p><a href="smartshare.php">SmartShare [Outlook]</a></p>
						</div>
						<div class="span2">
							<h5>Resources</h5>
							<p>Wiki</p>
							<p><a href="api.php">Developer Api</a></p>	
							<p><a href="https://github.com/wagapi">Git</a></p>
						</div>	
						<div class="span2">
							<h5>Support</h5>
							<p><a href="https://wagapi.zendesk.com/home">Support</p>
							<p><a href="https://wagapi.zendesk.com/forums">Forums</p>	
							<p><a href="#" class="contact">Contact</a></p>							
						</div>	
						<div class="span2">
							<h5>Follow us !</h5>
							<p>Blog</p>
							<p><a href="http://www.facebook.com/wagapi">Facebook</a></p>
							<p><a href="https://twitter.com/Wagapi">Twitter</a></p>
							
						</div>							
					</div>

       <p style="padding-top:10px">Copyright Wagapi &#0153; 2010-2013</p>
      </div>
    </footer>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <!--     
	<script src="assets/js/application.js"></script>
	<script src="assets/js/holder/holder.js"></script>
	<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    ================================================== -->
	
	<script type="text/javascript" src="//assets.zendesk.com/external/zenbox/v2.5/zenbox.js"></script>
	<style type="text/css" media="screen, projection">
	  @import url(//assets.zendesk.com/external/zenbox/v2.5/zenbox.css);
	</style>
	<script type="text/javascript">
	  if (typeof(Zenbox) !== "undefined") {
		Zenbox.init({
		  dropboxID:   "20133173",
		  url:         "https://wagapi.zendesk.com",
		  tabID:       "Support",
		  tabColor:    "black",
		  tabPosition: "Left"
		});
	  }
	</script>

	<script>
		
		$('.signup-btn').live('click',function(event){
				event.preventDefault();
				var data = 'action=signup_link';	
				$.ajax({
					type: "POST",
					url: "/wgp/wgp.signup.php",
					data: data,
					dataType: "JSON",
					success: function(data){
								if(data['signup_link'] && data['signup_link']!=''){
									window.location = data['signup_link'];
									//Let's initialize the interface		
								}
							}
				});	
		});

			function auth(){
				var data = 'user=' + document.getElementById('user').value +  '&password=' + document.getElementById('password').value;	
				$.ajax({
					type: "POST",
					url: "/wgp/login.php",
					data: data,
					dataType: "JSON",
					success: function(data){
						if(data['auth']['code']==0){
							//Let's initialize the interface
							$('.message-auth').html('');
							//$.mobile.changePage( $('/wgp/index.php#loading-box'));
							window.location.reload();
						}else{
							$('.message-auth').html(data['auth']['message']);
						}
						$('#user').attr('value','');
						$('#password').attr('value','');
				   }
				});	
			}
			
			function unauth(){
				var data = '';	
				$.ajax({
					type: "POST",
					url: "/wgp/unlog.php",
					data: data,
					success: function(){
						//window.location.reload(true);
						//window.location ="/wgp/#login-box";
						//window.location = "www.wagapi.com"
						window.location.reload();
				   }
				});			
			}	

		$('.signout-btn').live('click',function(event){
				event.preventDefault();
				unauth();
		});

		$('.contact').live('click',function(event){
				event.preventDefault();
				window.Zenbox.show();
		});		
			
	</script>	
