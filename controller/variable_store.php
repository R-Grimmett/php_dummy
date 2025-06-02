<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $python_url = $_POST['python_url'];
    $observation_count = $_POST['observation_count'];
    $observation_id = $_POST['observation_id'];
    $tag_group_id = $_POST['tag_group_id'];
    $tag_id = $_POST['tag_id'];

    require_once "variable.php";

    $errors = [];
    if (isInputEmpty($python_url, $observation_count)) {
        $errors["emptyInput"] = "Please fill in all fields.";
    }
    if (!isNumberValid((int)$observation_count)) {
        $errors["invalidCount"] = "Observation Count should be a number greater than 0.";
    }
    if(!isNumberValid((int)$observation_id) || !isNumberValid((int)$tag_group_id) || !isNumberValid((int)$tag_id)) {
        $errors["invalidID"] = "All IDs should be a number greater than 0.";
    }

    require_once "session_init.php";

    $data = [
        "python_url" => $python_url,
        "observation_count" => $observation_count,
        "observation_id" => $observation_id,
        "tag_group_id" => $tag_group_id,
        "tag_id" => $tag_id
    ];
    $_SESSION["data_variables"] = $data;


    if ($errors) {
        $_SESSION["error_variables"] = $errors;
    }
    header("location: ../index.php");
}

die();
