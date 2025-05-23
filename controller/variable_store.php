<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $python_url = $_POST['python_url'];
    $observation_count = $_POST['observation_count'];

    require_once "variable.php";

    $errors = [];
    if (isInputEmpty($python_url, $observation_count)) {
        $errors["emptyInput"] = "Please fill in all fields.";
    }
    if (!isCountValid((int)$observation_count)) {
        $errors["invalidCount"] = "Observation Count should be a number greater than 0.";
    }

    require_once "session_config.php";

    $data = [
        "python_url" => $python_url,
        "observation_count" => $observation_count
    ];
    $_SESSION["data_variables"] = $data;


    if ($errors) {
        $_SESSION["error_variables"] = $errors;
    }
    header("location: ../index.php");
}

die();
