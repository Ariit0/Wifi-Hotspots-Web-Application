<?php 
	session_start(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Contact Us";
			include "include/header.php";
		?>
	</head>
	
	<body>
		<div class="nav_bar">
			<?php
				include "displayNavBar.php";
			?>
		</div>
		
		<div id="wrapper">
			<div id="header">
				<h1> Contact us</h1>
			</div>
			
			<div id="content">
		        <p>
			    	Sed pretium eros eu mi bibendum, ac venenatis enim facilisis. Vestibulum euismod convallis justo, volutpat accumsan nisi lobortis et. Phasellus aliquam lacinia quam, in consequat erat posuere eu. Etiam libero erat, porta at mauris ut, tristique ultrices odio. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean finibus leo id tempor ultrices. Integer erat libero, placerat quis tortor nec, ornare egestas turpis. Vivamus finibus tincidunt turpis in tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque condimentum pretium auctor. Mauris condimentum orci nisl, a placerat neque laoreet eget.
			    </p>

			    <p>
			    	Nulla volutpat lacus ac mauris congue, ut facilisis odio gravida. Aliquam aliquet viverra interdum. Cras imperdiet nisi molestie, porta felis et, faucibus sapien. Nam rutrum augue id elementum porttitor. Suspendisse semper non mauris non elementum. Cras sed urna ultrices, dictum lacus eu, facilisis arcu. Vivamus pulvinar imperdiet aliquet. Pellentesque faucibus tellus quis libero suscipit porttitor.
		        </p>

		        <p>
			    	Aenean non consequat lacus. Vestibulum nec viverra sapien. Sed pharetra blandit nibh nec iaculis. Vestibulum at lorem malesuada, pulvinar risus vehicula, ultrices enim. Phasellus varius tortor sit amet dignissim placerat. Vestibulum feugiat ex at quam pretium, nec bibendum massa auctor. Quisque eu justo nec erat venenatis lacinia ut nec metus.
		        </p>
			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>