<?php
// Allows us to require specific variable types for functions, requires PHP 7.0 or later
declare(strict_types=1);

// ERROR HANDLING FUNCTIONS

// Returns true if the $username, $password, or $email is empty
function isInputEmpty(string $username, string $password, string $email)
{
    if (empty($username) || empty($password) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Returns true if the provided $email is not a valid email address.
 * @param string $email A string containing an email to check.
 * @return bool True if the email provided is not a valid email address.
 */
function isEmailInvalid(string $email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Returns true if the provided $username already exists within the database.
 * @param object $pdo PHP Database Object with a connection to the database to query.
 * @param string $username Username to search the database for.
 * @return bool True if the username provided already exists within the provided database.
 */
function isUsernameTaken(object $pdo, string $username)
{
    if (getUsername($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function isEmailRegistered (object $pdo, string $email)
{
    if (getEmail($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Creates a new user by calling the setUser in the model file with the provided variables.
 * @param object $pdo The PDO for the database containing the site data.
 * @param string $username The username of the user.
 * @param string $password The user's password, will be hashed before storage.
 * @param string $email The email address of the user.
 */
function createUser(object $pdo, string $username, string $password, string $email) {
    setUser($pdo, $username, $password, $email);
}