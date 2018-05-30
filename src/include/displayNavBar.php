<!-- Displays the WifiFinder logo -->
<div id="logo"><a id="logoLink" href="index.php"><img src="img/logo.png" id="logoImg" alt="logo"></a></div>

<nav id="nav_centre">	
	<!-- Displays the mobile menu icon if the css media query condition is met -->
	<div id="mobile-button"><a href="#" id="menu-icon"></a></div>

	<!-- Displays the menu buttons -->
	<div id="menu-buttons">
		<ul id="menu">	
			<li><a href="index.php">Home</a></li> 
			<li><a href="aboutus.php">About</a></li> 
			<li><a href="contactus.php">Contact</a></li>
			<!-- Display appropiate menu buttons depending on whether the user is logged in or not -->
			<?php
				if(!empty($_SESSION['userID'])) {
					echo '<li><a href="profile.php">My Profile</a></li>';
					echo '<li><a href="logout.php">Logout</a></li>';
				} else {
					echo '<li><a href="login.php">Login</a></li>';
					echo '<li><a href="register.php">Register</a></li>';
				}
			?>
		</ul>
	</div>
</nav>

<!-- Displays simple shadow effect under the header -->
<span id="header_shadow"></span>