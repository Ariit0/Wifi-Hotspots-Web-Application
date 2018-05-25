<?php
    require 'include/sanitize_data.php';

    // Validate the form by checking against all tests (Server-side).
    function ValidateReviewForm_Server() {    
        $isValid = true;

        // Validate description: REQUIRED
        if(empty($_POST['description'])) {
            $isValid = false;
        } else {
            global $description;
            $description = sanitize_data($_POST['description']);
        }

        global $rating;
        $rating = sanitize_data($_POST['rating']);

        return $isValid;
    }

    // Try register the user after validating information.
    function TryCreateReview($itemID, $userID, $rating, $description) {
        require_once 'include/initDB.php';

        try {
            $stmt = $pdo->prepare("INSERT INTO reviews(userID, itemID, dateOfReview, description, rating) VALUES(:userID, :itemID, :dateOfReview, :description, :rating)");
            $stmt->bindValue(":userID", $userID);
            $stmt->bindValue(":itemID", $itemID);
            $stmt->bindValue(":dateOfReview", date("Y-m-d"));
            $stmt->bindValue(":description", $description);
            $stmt->bindValue(":rating", intval($rating));

            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
?>