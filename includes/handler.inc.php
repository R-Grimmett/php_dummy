<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        require_once "db_init.php";

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
} else {
    header('location: ../index.php');
}