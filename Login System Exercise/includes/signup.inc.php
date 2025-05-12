<?php

// Check if access was legitimate
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";
        // General order for adding MVC files is in the order of the acronym
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        // ERROR HANDLING
        $errors = [];

        if (isInputEmpty($username, $password, $email)) {
            $errors["emptyInput"] = "Please fill in all the fields.";
        }
        if (isEmailInvalid($email)) {
            $errors["invalidEmail"] = "Please enter a valid email address.";
        }
        if (isUsernameTaken($pdo, $username)) {
            $errors["usernameTaken"] = "Username is already taken.";
        }
        if (isEmailRegistered($pdo, $email)) {
            $errors["emailTaken"] = "Email is already registered.";
        }

        require_once "config_session.inc.php";

        // Returns true if there is data within the array
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signupData"] = $signupData;
            header("location: index.php");
            die();
        }

        createUser($pdo, $username, $password, $email);

        header("location: index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Database Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}