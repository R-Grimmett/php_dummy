<?php

global $pdo;
try {
    require_once "dbh.inc.php";

    $query = "CREATE TABLE IF NOT EXISTS tags (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                tag_group_id INT UNSIGNED NOT NULL,
                tag_name VARCHAR(30) NOT NULL)";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $query = "CREATE TABLE IF NOT EXISTS observations (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                data TEXT NOT NULL,
                tags VARCHAR(255))";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $pdo = null;
    $stmt = null;
} catch (PDOException $e) {

}