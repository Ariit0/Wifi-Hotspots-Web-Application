<?php

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// Validates login information (Server-side).
	function ValidateLoginForm_Server() {
	    $isValid = true;

	    if(empty($_POST['emailaddress'])) {
	        $isValid = false;
	    } else {
	    	global $emailaddress;
	    	$emailaddress = test_input($_POST['emailaddress']);

		    if (CheckValidEmail($emailaddress) === false) {
		        $isValid = false;
		    }
	    }

	    if(empty($_POST['password'])){
	        $isValid = false;
	    } else {
	    	global $password;
	    	$password = test_input($_POST['password']);
	    }

	    return $isValid;
	}

	// Check if the email is valid.
	function CheckValidEmail($email) {
	    return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	// Check if login information is valid (exists in database).
	function TryLogin($email, $password) {
		require 'include/initDB.php';

		try {
	        $stmt = $pdo->prepare("SELECT * FROM members WHERE email = :email and password = SHA2(CONCAT(:password, salt), 0)");
	        $stmt->bindValue(":email", $email);
	        $stmt->bindValue(":password", $password);

	        $stmt->execute();
        	return $stmt->rowCount() > 0;

    	} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
?>
