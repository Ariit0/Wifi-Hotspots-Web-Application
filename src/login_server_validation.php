<?php
	require 'include/sanitize_data';

	// Validates login information (Server-side).
	function ValidateLoginForm_Server() {
	    $isValid = true;

	    //Ensure email address required.
	    if(empty($_POST['emailaddress'])) {
	        $isValid = false;
	    } else {
	    	global $emailaddress;
	    	$emailaddress = sanitize_data($_POST['emailaddress']);

	    	//Validate email address format.
		    if (filter_var($emailaddress, FILTER_VALIDATE_EMAIL) === false) {
		        $isValid = false;
		    }
	    }

	    //Ensure password is required.
	    if(empty($_POST['password'])){
	        $isValid = false;
	    } else {
	    	global $password;
	    	$password = sanitize_data($_POST['password']);
	    }

	    return $isValid;
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