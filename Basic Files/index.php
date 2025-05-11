<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Rachael Grimmett">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Basic PHP Information</title>

    <!-- Bootstrap CSS Import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>

<body>

<div class="container-fluid">
    <div class="row m-5">
        <?php
        // Variables are declared with a $
        $firstName = "Rachael";
        // Output to html using echo
        echo $firstName;

        // Arrays are declared using () in older PHP (5.4 or lower) not [], newer PHP can use either
        $sampleArray = [];

        // Object types (class instances)
        // $object = new basicClass();
        ?>
    </div>
    <div class="row m-5">
        <div class="col-8">
            <h2>Pre-Defines or Built-In Variables</h2>
            <p>
                <?php
                // These are known as Super-Globals, and can be accessed from anywhere within the code
                echo $_SERVER["DOCUMENT_ROOT"];
                echo "<br>";
                echo $_SERVER["PHP_SELF"];
                echo "<br>";
//                Gets the name of the server
                echo $_SERVER["SERVER_NAME"];
                echo "<br>";
//                Gets the type of html request used
                echo $_SERVER["REQUEST_METHOD"];
                ?>
            </p>


        </div>
    </div>
</div>

<!-- Bootstrap JS Import -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>
</html>


