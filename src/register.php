<!DOCTYPE html>
<html>
	<?php
		$title = "Register";
		include "include/header.php";
	?>
	<body>
	<div class="nav_bar">
		<?php
			include "displayNavBar.php";
		?>

		<div id="wrapper">
			<div id="header">
				<h1> Register </h1>
			</div>
			
			<div id="content">
				<?php
					if (isset($_POST['Register'])) {
				        //Server side validation
			    	} else {
			    		include "register_form.php";
			    	}
				?>
			</div>

			<?php
				include "include/footer.php";
			?>
		</div>
	</div>

	</body>

</html>