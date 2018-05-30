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
    var pattern = new RegExp("[a-zA-Z]+");
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
