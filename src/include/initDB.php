<?php
	// Tests connection to database and catches potential errors during connection
	function initDB() {
		try {
			$pdo = new PDO("mysql:host=cab230.sef.qut.edu.au;dbname=n9446826;", "n9446826", "Zc2eaaddt5yy1");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch (PDOException $e) {
			return null;
		}
	}		
?>