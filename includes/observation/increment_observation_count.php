<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../db_observations.php";
    createObservation("", "");

    require_once "../session_init.php";
    $count = (int)$_SESSION['data_variables']['observation_count'];
    $count++;
    $_SESSION['data_variables']['observation_count'] = $count;

    header("location: ../../index.php");
}

die();