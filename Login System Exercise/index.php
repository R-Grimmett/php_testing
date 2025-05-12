<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Rachael Grimmett">
    <meta name="description" content="Login System following PHP course by Dani Krossing on YouTube">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simple User System</title>

    <!-- Bootstrap CSS Import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>

<body>
<div class="container-fluid">
    <div class="row mt-5 mb-3">
        <h1 class="ms-5">Simple PHP User System</h1>
    </div>
    <div class="row row-cols-2 g-5 p-3">
        <div class="col-6">
            <h2>Login</h2>
            <form action="includes/signup.inc.php" method="post">
                <div class="mb-3">
                    <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="email" name="email" placeholder="Email Address">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <h2>Signup</h2>
            <form action="includes/signup.inc.php" method="post">
                <?php
                signupInput();
                ?>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Signup</button>
                </div>
            </form>

            <?php
            checkSignupErrors();
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS Import -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>
</html>


