<?php
	require 'include/sanitize_data.php';

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
	        $stmt = $pdo->prepare("SELECT * FROM members WHERE email = :email");
	        $stmt->bindValue(":email", $email);

	        $stmt->execute();

        	if($stmt->rowCount() > 0){
        		$row = $stmt->fetch();
        		if(password_verify($password, $row['password'])) {
        			return true;
        		}
        	}
        	return false;

    	} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
?>