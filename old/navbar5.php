﻿<!-- Navbar
    ================================================== -->
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./">Wagapi</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./">Home</a>
              </li>
              <li class="">
                <a href="./getting-started.html">Products</a>
              </li>
              <li class="">
                <a href="./scaffolding.html">Services</a>
              </li>
              <li class="">
                <a href="./base-css.html">Developers Corner</a>
              </li>
              <li class="">
                <a href="./components.html">Support</a>
              </li>
              <li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					Language: English
					<span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu">
					<li class="">
						<a href="./">English</a>
					</li>	
					<li class="">
						<a href="./">Français</a>
					</li>					
				  </ul>
              </li>			  
            </ul>
<?php
if(!empty($_SESSION['session'])){
?>
				<!-- The drop down menu -->
				<ul class="nav pull-right">
				  <li><a href="#" class="account-btn">Logged in as <?php	echo($login) ?></a></li>
				  <li class="divider-vertical"></li>
				  <li><a href="#" class="signout-btn">Sign Out</a></li>
				</ul>	

<?php	
}else{
?>
				<!-- The drop down menu -->
				<ul class="nav pull-right">
				  <li><a href="#" class="signup-btn">Sign Up</a></li>
				  <li class="divider-vertical"></li>
				  <li class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
					<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
					  <!-- Login form here -->
						<form action="javascript:auth();" method="post" accept-charset="UTF-8">
						<input id="user" style="margin-bottom: 15px;" type="text" name="user[username]" size="30" placeholder="Username" />
						<input id="password" style="margin-bottom: 15px;" type="password" name="user[password]" size="30" placeholder="Password" />
						<input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="user[remember_me]" value="1" />
						<label class="string optional" for="user_remember_me"> Remember me</label>
						 
						<input id="login" class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
						</form>
					</div>
				  </li>
				</ul>		
<?php
}
?>			
		
          </div>
        </div>
      </div>
    </div>