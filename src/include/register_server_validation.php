<?php
    require 'include/sanitize_data.php';
    require_once 'include/initDB.php';

    $pdo = initDB();

    // Validate the form by checking against all tests (Server-side).
    function ValidateRegisterForm_Server() {        
        $isValid = true;

        // Validate firstname: REQUIRED and alphabetic only
        global $firstname;
        if(empty($_POST['firstname'])) {
            $isValid = false;
        } else {
            $firstname = sanitize_data($_POST['firstname']);
            if (CheckValueAlphabeticOnly($firstname) === false) {
                $isValid = false;
            }
        }

        // Validate lastname: OPTIONAL and alphabetic only
        global $lastname;
        if (!empty($_POST['lastname'])) {
            $lastname = sanitize_data($_POST['lastname']);
            if (CheckValueAlphabeticOnly($lastname) === false) {
                $isValid = false;
            }
        } else {
            $lastname = '';
        }

        // Validate date of birth: OPTIONAL and must be of format dd/mm/yyyy
        global $dob;
        if (!empty($_POST['dob'])) {
            $dob = sanitize_data($_POST['dob']);
            if (CheckValidDate($dob) === false) {
                $isValid = false;
            }
        } else {
            $dob = '';
        }

        // Validate mobile number: OPTIONAL and must contain 10 digits
        global $mobile;
        if (!empty($_POST['mobile'])) {
            $mobile = sanitize_data($_POST['mobile']);
            if (CheckValidMobileNumber($mobile) === false) {
                $isValid = false;
            }
        } else {
            $mobile = '';
        }

        // Validate email address: REQUIRED and must be of an email format, AND must not be already registered.
        global $email;
        if(empty($_POST['email'])) {
            $isValid = false;
        } else {
            $email = sanitize_data($_POST['email']);
            if (CheckValidEmail($email) === false) {
                $isValid = false;
            } else if (CheckEmailNotRegistered($email) == false) {
                $isValid = false;
            }
        }

        // Validate password: REQUIRED, must MATCH confirmation password, and must follow a general FORMAT
        global $password;
        global $confirm_password;
        if(empty($_POST['password1']) || empty($_POST['password2'])) {
            $isValid = false;
        } else {
            $password = sanitize_data($_POST['password1']);
            $confirm_password = sanitize_data($_POST['password2']);

            if(CheckValidPassword($password) === false){
                $isValid = false;
            } else if (CheckPasswordsMatch($password, $confirm_password) === false){
                $isValid = false;
            }
        }

        return $isValid;
    }

    // Check if value is alphabetic only.
    function CheckValueAlphabeticOnly($value) {
        return preg_match("/[a-zA-Z]+/", $value);
    }

    // Check if the user's password is valid. Must be at least 8 characters, 1 uppercase, 1 lowercase, and 1 number.
    function CheckValidPassword($pwd) {
        $pattern_MinLength = "/^.{8,}$/";
        $pattern_OneUpper = "/[A-Z]+/";
        $pattern_OneLower = "/[a-z]+/";
        $pattern_OneNumber = "/[0-9]+/";

        if(preg_match($pattern_MinLength, $pwd) && preg_match($pattern_OneUpper, $pwd) && preg_match($pattern_OneLower, $pwd) && preg_match($pattern_OneNumber, $pwd)) {
            return true;
        }
        return false;
    }

    // Check if the user's date input is valid. Must be of format (dd/mm/yyyy).
    function CheckValidDate($date) {
        // Regex obtained from: https://stackoverflow.com/questions/15491894/regex-to-validate-date-format-dd-mm-yyyy
        return preg_match("/(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\\d\\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/", $date);
    }

    // Check if the user's mobile number is valid. Must be 10 digits long.
    function CheckValidMobileNumber($num) {
        return preg_match("/^[0-9]{10}$/", $num);
    }

    // Check if both pw1 and pw2 match.
    function CheckPasswordsMatch($pwd1, $pwd2) {
        if($pwd1 === $pwd2){
            return true;
        }
        return false;
    }

    // Ensure email is not already registered in the database.
    function CheckEmailNotRegistered($email) {
        global $pdo;
        if(!is_null($pdo)) {
            $stmt = $pdo->prepare('SELECT email FROM members');

            if($stmt->execute()) {
                // Check all emails in database.
                foreach ($stmt as $result) {
                    if(strcasecmp($email, $result['email']) == 0) {
                        global $server_msg;
                        $server_msg = 'Email is already in use.';
                        return false;
                    }
                }
                // If no emails matched, the email is valid.
                return true;
            }
        }
        return false;
    }

    // Check if the email is valid.
    function CheckValidEmail($email) {
        //Regex obtained from: http://blog.gerv.net/2011/05/html5_email_address_regexp/
        return preg_match("/^[a-zA-Z0-9.!#$%&’*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?)*$/", $email);
    }

    // Try register the user after validating information.
    function TryRegister($firstname, $lastname, $dob, $mobile, $email, $password) {
        global $pdo;
        if(is_null($pdo)) {
            return false;
        }
        
        //// Get the DoB value into the correct format for mysql database (yyyy-mm-dd).
        // Replace slashes with dashes.
        $dob = str_replace('/', '-', $dob);
        // Seperate values between dashes into an array.
        $token = strtok($dob, "-");
        while($token !== false) {
            $dob_components[] = $token;
            $token = strtok("-");
        }
        // Reverse the array (dd-mm-yyyy to yyyy-mm-dd format).
        $dob_components = array_reverse($dob_components);
        // Glue the array back together seperated with dashes.
        $dob = implode("-", $dob_components);

        try {
            $stmt = $pdo->prepare("INSERT INTO members(firstname, lastname, dateOfBirth, mobileNo, email, password) VALUES(:firstname, :lastname, :dob, :mobile, :email, :password)");
            $stmt->bindValue(":firstname", $firstname);
            $stmt->bindValue(":lastname", $lastname);
            $stmt->bindValue(":dob", $dob);
            $stmt->bindValue(":mobile", $mobile);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":password", password_hash($password, PASSWORD_DEFAULT));

            return $stmt->execute();

        } catch (PDOException $e) {
            return false;
        }
    }
?>