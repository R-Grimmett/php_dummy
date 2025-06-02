<?php
declare(strict_types=1);

//require "db_init.php";
require "db_tags.php";

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

/**
 * @param int $observation_id The int ID of the observation in the database
 * @param int $tag_group_id The tag group ID
 * @param int $tag_id The tag ID
 * @return void
 */
function assignTag(int $observation_id, int $tag_group_id, int $tag_id) {
    global $pdo;

//    Fetch the required observation
    try {
        $query = "SELECT * FROM observations WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $observation_id);
        $stmt->execute();
        $observation = $stmt->fetch(PDO::FETCH_ASSOC);
        echo print_r($observation);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
//    Update the tags string
    $tags = $observation['tags'];
    $tags = $tags . ',' . $tag_group_id . ':' . $tag_id;

//    Update the observation
    try {
        $query = "UPDATE observations SET tags = :tags WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':tags', $tags);
        $stmt->bindParam(':id', $observation_id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

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

function fetchTagString(int $id): string {
    global $pdo;
    $result = "";

    try {
        $query = "SELECT tags FROM observations WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $dbres = $stmt->fetchAll();
    } catch (PDOException $e) {}

    if($dbres[0]['tags'] != null) {
        $tags = explode(",",$dbres[0]['tags']);
        foreach ($tags as $tag) {
            $result = $result . printTag($tag);
        }
    }
    return $result;
}

//TODO: Implement random names + data instead of just lorem ipsum.
function generateObservations(): void
{
    createObservation("", "");
}

/**
 * Deletes all data from the 'observations' table in the connected database by using the 'TRUNCATE' SQL command.
 */
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