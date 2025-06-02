<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../session_init.php";
    $testing = [
        "generate" => "Generating placeholder tags..."
    ];
    $_SESSION["data_testing"] = $testing;

    header("location: ../../index.php");
}

die();