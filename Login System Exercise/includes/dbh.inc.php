<?php

$dsn = 'mysql:host=localhost;dbname=phptestdatabase';
$dbusername = 'root';
$dbpassword = '';

try {
    // pdo stands for PHP Data Object, handles the connection to the database
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    // if we get an error, throw an exception to deal with in the catch block
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}