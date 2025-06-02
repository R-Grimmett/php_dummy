<?php
declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../db_init.php";
//    require_once "includes/dbh.inc.php";
    $dsn = 'mysql:host=localhost;dbname=phpplaceholder';
    $dbusername = 'root';
    $dbpassword = '';

    try {
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "TRUNCATE TABLE observations";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error deleting table: " . $e->getMessage();
    }

    require_once "../session_init.php";
    unset($_SESSION['data_variables']['observation_count']);
    unset($_SESSION['data_variables']['observations']);

    header("location: ../../index.php");
}

die();