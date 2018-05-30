// Validate the form by checking against all tests.
function ValidateReviewForm_Client(form) {
    isValid = true;

    // Validate firstname: REQUIRED
    if(CheckValueNotEmpty(form.description.value) === false) {
        DisplayError("descriptionError", "Description is a required field.");
        isValid = false;
    }

    return isValid;
}