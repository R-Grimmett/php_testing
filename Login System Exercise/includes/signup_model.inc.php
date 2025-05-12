<?php

declare(strict_types=1);

/**
 * Searches the provided database for a reference to the provided username.
 *
 * @param object $PDO The PDO for the currently active database connection.
 * @param string $username The username string to query the database with.
 * @return mixed An array containing the data returned from the database.
 */
function getUsername(object $PDO, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";

    // Preparing the statement helps prevent SQL injection
    $stmt = $PDO->prepare($query);
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    // FETCH_ASSOC returns the data as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Queries the provided database for the provided email address.
 * @param object $PDO The PDO for the currently active database connection.
 * @param string $email The email string to query the database with.
 * @return mixed
 */
function getEmail(object $PDO, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";

    $stmt = $PDO->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Adds a new user to the database in the users table.
 * @param object $PDO The PDO for the database containing the site data.
 * @param string $username The username of the user.
 * @param string $password The user's password, will be hashed before storage.
 * @param string $email The email address of the user.
 */
function setUser(object $PDO, string $username, string $password, string $email) {
    $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email);";

    $stmt = $PDO->prepare($query);

    $options = [
        'cost' => 12,
    ];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $hashedPassword);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
}