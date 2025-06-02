<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $python_url = $_POST['python_url'];
    $observation_count = $_POST['observation_count'];
    $tag_group_id = $_POST['tag_group_id'];

    require_once "variable.php";

    $errors = [];
    if (isInputEmpty($python_url, $observation_count)) {
        $errors["emptyInput"] = "Please fill in all fields.";
    }
    if (!isNumberValid((int)$observation_count)) {
        $errors["invalidCount"] = "Observation Count should be a number greater than 0.";
    }
    if(!isNumberValid((int)$tag_group_id)) {
        $errors["invalidID"] = "All IDs should be a number greater than 0.";
    }

    require_once "../includes/session_init.php";
    require_once "../includes/db_observations.php";

    $data = [
        "python_url" => $python_url,
        "observation_count" => $observation_count,
        "tag_group_id" => $tag_group_id,
    ];
    $_SESSION["data_variables"] = $data;

    for($i = 0; $i < $observation_count; $i++) {
        generateObservations();
    }

    if ($errors) {
        $_SESSION["error_variables"] = $errors;
    }
    header("location: ../index.php");
}

die();
