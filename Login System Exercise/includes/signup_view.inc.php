<?php

declare(strict_types=1);

/**
 * Checks if the Signup form has already been submitted, and populates the input fields if the username and email were
 * valid but the form was not accepted. Otherwise, creates empty input fields for the Signup form.
 *
 * Relies on $_SESSION["signupData"].
 */
function signupInput() :void
{
    if ((isset($_SESSION["signupData"]["username"])) && (!isset($_SESSION["errors_signup"]["usernameTaken"]))) {
        echo '<div class="mb-3"><input class="form-control" type="text" name="username" placeholder="Username" value="'
            . $_SESSION["signupData"]["username"] . '"></div>';
    } else {
        echo '<div class="mb-3"><input class="form-control" type="text" name="username" placeholder="Username"></div>';
    }

    echo '<div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>';

    if ((isset($_SESSION["signupData"]["email"])) && (!isset($_SESSION["errors_signup"]["invalidEmail"])) && (!isset($_SESSION["errors_signup"]["emailTaken"]))) {
        echo '<div class="mb-3"><input class="form-control" type="text" name="email" placeholder="Email Address" value="'
            . $_SESSION["signupData"]["email"] . '"></div>';
    } else {
        echo '<div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email Address"></div>';
    }
}

function checkSignupErrors(): void
{
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];

        foreach ($errors as $error) {
            echo "<div class='alert alert-danger mt-2 mb-2' role='alert'><strong>Error!</strong> " . $error . "</div>";
        }
        unset($_SESSION["errors_signup"]);
    } else if ((isset($_GET["signup"])) && ($_GET["signup"] == "success")) {
        echo "<div class='alert alert-success mt-2 mb-2' role='alert'><strong>Success!</strong> You have created an account and can now login.</div>";
    }
}