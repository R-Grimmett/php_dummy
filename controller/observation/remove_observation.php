<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../session_config.php";
    unset($_SESSION['data_variables']['observation_count']);
    unset($_SESSION['data_variables']['observations']);

    header("location: ../../index.php");
}

die();