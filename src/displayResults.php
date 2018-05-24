<?php
	session_start(); 

	function displayResults($searchQuery) {
		include 'results.php';

		$_id = 0;
		foreach ($searchQuery as $suburb) {
			echo "<div class=\"results\" id = \"res$_id\">";
			echo "<a href=\"sampleitem.php\"><h1>".$suburb['name']."</h1>";
			echo "<p>".$suburb['address']."";
			echo ", ".$suburb['suburb']. "</p></a>";
			echo "</div> <!-- end results -->";
			$_id++;
		}

		echo "					


							</div> <!-- end resultList -->
					</div>
					
					<?php
						include \"include/footer.php\";
					?>
				</div>
			</body>
		</html>

		";
	}
?>

