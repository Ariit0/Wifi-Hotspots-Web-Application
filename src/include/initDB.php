<?php
	// tests connection to database and catches potential errors during connection
	try {
		$pdo = new PDO("mysql:host=cab230.sef.qut.edu.au;dbname=n9446826;", "n9446826", "Zc2eaaddt5yy1");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>