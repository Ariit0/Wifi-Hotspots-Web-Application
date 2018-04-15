// Validate the form by checking against all tests.
function Validate(form) {
    isValid = true;

    // Validate firstname: REQUIRED and alphabetic only
    if(CheckValueNotEmpty(form.firstname.value) === false) {
        DisplayError("firstnameError", "First name is a required field.");
        isValid = false;
    } else if (CheckValueAlphabeticOnly(form.firstname.value) === false) {
        DisplayError("firstnameError", "First name must be alphabetic only.");
        isValid = false;
    }

    // Validate lastname: OPTIONAL and alphabetic only
    if (CheckValueNotEmpty(form.lastname.value) && CheckValueAlphabeticOnly(form.lastname.value) === false) {
        DisplayError("lastnameError", "Last name must be alphabetic only.");
        isValid = false;
    }

    // Validate date of birth: OPTIONAL and must be of format dd/mm/yyyy
    if (CheckValueNotEmpty(form.dob.value) && CheckValidDate(form.dob.value) === false) {
        DisplayError("dobError", "Date of birth must follow the correct format (dd/mm/yyyy).");
        isValid = false;
    }

    // Validate mobile number: OPTIONAL and must contain 10 digits
    if (CheckValueNotEmpty(form.mobilenum.value) && CheckValidMobileNumber(form.mobilenum.value) === false) {
        DisplayError("mobilenumError", "Mobile number must be 10 digits.");
        isValid = false;
    }

    // Validate email address: REQUIRED and must be of an email format
    if(CheckValueNotEmpty(form.emailaddress.value) === false) {
        DisplayError("emailError", "Email is a required field.");
        isValid = false;
    } else if (CheckValidEmail(form.emailaddress.value) === false) {
        DisplayError("emailError", "Please use the correct format for an email address.");
        isValid = false;
    }

    // Validate password: REQUIRED, must MATCH confirmation password, and must follow a general FORMAT
    if(CheckValidPassword(form.password1.value) === false){
        DisplayError("passwordError", "Password must be at least 8 characters long, with at least 1 being uppercase, 1 lowercase, and 1 number.");
        isValid = false;
    } else if (CheckPasswordsMatch(form.password1.value, form.password2.value) === false){
        DisplayError("passwordmatchError", "Passwords do not match.");
        isValid = false;
    }

    return isValid;
}

// Event handler to hide the error text on value changed.
function OnChangeElement(id) {
    document.getElementById(id).style.visibility = "hidden";
}

// Display error message text for an element id.
function DisplayError(errorID, errorMSG) {
    document.getElementById(errorID).textContent = errorMSG;
    document.getElementById(errorID).style.visibility = "visible";
}

// Check if value is not empty.
function CheckValueNotEmpty(value) {
    if(value !== ""){
        return true;
    }
    return false;
}

// Check if value is alphabetic only.
function CheckValueAlphabeticOnly(value) {
    var pattern = new RegExp("[a-z]+");
    if(pattern.test(value)){
        return true;
    }
    return false;
}

// Check if the user's password is valid. Must be at least 8 characters, 1 uppercase, 1 lowercase, and 1 number.
function CheckValidPassword(pwd) {
    var pattern_MinLength = new RegExp("^.{8,}$");
    var pattern_OneUpper = new RegExp("[A-Z]+");
    var pattern_OneLower = new RegExp("[a-z]+");
    var pattern_OneNumber = new RegExp("[0-9]+");

    if(pattern_MinLength.test(pwd) && pattern_OneUpper.test(pwd) && pattern_OneLower.test(pwd) && pattern_OneNumber.test(pwd)){
        return true;
    }
    return false;
}

// Check if the user's date input is valid. Must be of format (dd/mm/yyyy).
function CheckValidDate(date) {
    // Regex obtained from: https://stackoverflow.com/questions/15491894/regex-to-validate-date-format-dd-mm-yyyy
    var pattern = new RegExp("(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\\d\\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)");

    if(pattern.test(date)){
        return true;
    }
    return false;
}

// Check if the user's mobile number is valid. Must be 10 digits long.
function CheckValidMobileNumber(num) {
    var pattern = new RegExp("^[0-9]{10}$");

    if(pattern.test(num)){
        return true;
    }
    return false;
}

// Check if both pw1 and pw2 match.
function CheckPasswordsMatch(pwd1, pwd2) {
    if(pwd1 === pwd2){
        return true;
    }
    return false;
}

// Check if the user's email is valid.
function CheckValidEmail(email){
    // Regex obtained from: http://blog.gerv.net/2011/05/html5_email_address_regexp/
    var pattern = new RegExp("^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?)*$");
    if(pattern.test(email)) {
        return true;
    }
    return false;
}
