<?php
require_once 'controller/session_config.php';
require_once 'view/variable.php';
require_once 'view/observation.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Rachael Grimmett">
    <meta name="description" content="Dummy Application View page for testing purposes only">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dummy Reme Applicaiton View</title>

    <!-- Bootstrap CSS Import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>

<body>
<?php
print_r($_SESSION);
?>
<div class="container-fluid">
    <div class="row mt-5 mb-3">

    </div>
    <div class="row mb-3 g-3">
        <h2>Variable Setup</h2>
        <?php
        checkVariableErrors();
        ?>
        <form action="controller/variable_store.php" method="post">
            <?php
            variableInput();
            ?>
            <div class="m-3">
                <button type="submit" class="btn btn-primary">Set Variables</button>
            </div>
        </form>
    </div>
    <div class="row mb-3 g-3">
        <h2>Analysis & Observations</h2>
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-8">
                <h3>Observations</h3>
                <?php
                displayObservations();
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Import -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>
</html>