<?php

// Check if access was legitimate
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";

    } catch (PDOException $e) {
        die("Database Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}