<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../session_init.php";
    require_once "../db_observations.php";
    require_once "../db_tags.php";

    $tag_name = "testing tag";

//    Generate tag if it doesn't exist
    $tag = fetchTag((int)$_SESSION["data_variables"]["tag_group_id"], $tag_name);

//    Fetch all observations
    $observations = fetchObservations();

//    Assign the tag to each observation
    foreach ($observations as $observation) {
        assignTag((int)$observation['id'], (int)$tag['tag_group_id'], (int)$tag['id']);
    }

    $testing = [
        "generate" => "Generating placeholder tags...",
    ];
    $_SESSION["data_testing"] = $testing;

    header("location: ../../index.php");
}

die();