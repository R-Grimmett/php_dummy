<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../session_init.php";
    require_once "../db_observations.php";
    require_once "../db_tags.php";

    $testing = [
        "remove" => "Removing tags..."
    ];
    $_SESSION["data_testing"] = $testing;

    // Remove tags from observations
    removeTags();
    // Remove data from the tags database
    truncateTags();

    header("location: ../../index.php");
}

die();