<nav id="nav_centre">	
	<div id="logo"><a id="logoLink" href="index.php"><img src="img/logo.png" id="logoImg" alt="logo"></a></div>
	<ul id="menu">	
		<li><a href="index.php">Home</a></li> 
		<li><a href="aboutus.php">About</a></li> 
		<li><a href="contactus.php">Contact</a></li>
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
</nav>

<span id="header_shadow"></span>