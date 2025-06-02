<?php
declare(strict_types=1);

require "db_init.php";

$dsn = 'mysql:host=localhost;dbname=phpplaceholder';
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$name_placeholder = "Observation Name";

$data_placeholder = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam libero lacus, congue ut fermentum 
    quis, gravida in nulla. Suspendisse sollicitudin nisl sed quam cursus aliquam. Duis eget feugiat ante. Curabitur 
    euismod ante orci, et ornare nunc commodo eu. Aliquam sed faucibus eros. Pellentesque non ipsum quam.';

function createObservation(string $name, string $data): void
{
    global $pdo, $name_placeholder, $data_placeholder;
    $dbname = "";
    $dbdata = "";

    if ($name == "") {
        $dbname = $name_placeholder;
    } else {
        $dbname = $name;
    }
    if ($data == "") {
        $dbdata = $data_placeholder;
    } else {
        $dbdata = $data;
    }

    try {

        $query = "INSERT INTO observations (name, data) VALUES (:name, :data)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $dbname);
        $stmt->bindParam(':data', $dbdata);

        $stmt->execute();

    } catch (PDOException $e) {
        echo 'Unable to create observation: ' . $e->getMessage();
    }
}

function fetchObservations(): ?array
{
    global $pdo;

    try {
        $query = "SELECT * FROM observations";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    catch (PDOException $e) {
        echo 'Unable to fetch observations: ' . $e->getMessage();
    }
    return null;
}

function generateObservations(): void
{
    createObservation("", "");
}

function truncateObservations(): void
{
    global $pdo;
    try {
        $query = "TRUNCATE TABLE observations";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error deleting table: " . $e->getMessage();
    }
}