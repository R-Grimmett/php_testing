<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Rachael Grimmett">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simple PHP Calculator</title>

    <!-- Bootstrap CSS Import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>

<body>
<div class="container text-center">
    <div class="row m-5">
        <div class="col">
            <!-- Having the action set to $_SERVER["PHP_SELF"] means we just return to the same page after form submission -->
            <!-- Using htmlspecialschars() helps prevent html code injection -->
            <form class="mb-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="number" name="num01" placeholder="First Number" aria-label="First Number" required>
                <select name="operator" aria-label="Operator">
                    <option value="addition">+</option>
                    <option value="subtraction">-</option>
                    <option value="multiplication">*</option>
                    <option value="division">/</option>
                    <option value="modulus">%</option>
                    <option value="exponentiation">**</option>
                </select>
                <input type="number" name="num02" placeholder="Second Number" aria-label="Second Number" required>
                <button type="submit" class="btn btn-primary">Calculate!</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // GRAB DATA
                // Always sanatise data submitted by users
                $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_INT);
                $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_INT);
                $operator = htmlspecialchars($_POST["operator"]);

                // ERROR HANDLING
                // Should always be handled by the backend
                $errors = false;

                if (empty($num01) || empty($num02) || empty($operator)) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>Error!</strong> Please enter all fields.</div>";
                    $errors = true;
                }
                if (!is_numeric($num01) || !is_numeric($num02)) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>Error!</strong> Only enter numbers.</div>";
                    $errors = true;
                }

                // CALCULATE
                // Will only run if $errors is false
                if (!$errors) {
                    $result = null;
                    switch ($operator) {
                        case "addition":
                            $result = $num01 + $num02;
                            break;
                        case "subtraction":
                            $result = $num01 - $num02;
                            break;
                        case "multiplication":
                            $result = $num01 * $num02;
                            break;
                        case "division":
                            $result = $num01 / $num02;
                            break;
                        case "modulus":
                            $result = $num01 % $num02;
                            break;
                        case "exponentiation":
                            $result = $num01 ** $num02;
                            break;
                        default:
                            echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>Error!</strong> Operation not recognised.</div>";
                            break;
                    }
                    if ($result != null) {
                        echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Result:</strong> ".$result."</div>";
                    }

                }

            }
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


