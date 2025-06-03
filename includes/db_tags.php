<?php

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

function createTag(int $group_id, string $tag_name): void
{
    global $pdo;
    try {
        $query = "INSERT INTO tags (tag_group_id, tag_name) VALUES (:group_id, :tag_name)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':tag_name', $tag_name);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Unable to create tag: ' . $e->getMessage();
    }
}

/**
 * Fetches a tag with the specified group ID and name and returns an array containing the data for that tag.
 * Creates a tag with the group ID and name if it doesn't exist.
 * @param int $group_id Should be assigned to $_SESSION['data_variables']['tag_group_id']
 * @param string $name The name of the tag to search for
 * @return array An array containing the data of the tag.
 */
function fetchTag(int $group_id, string $name): array
{
    global $pdo;

    try {
        $query = "SELECT * FROM tags WHERE tag_group_id = :group_id AND tag_name = :name";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

    }

    if ($result == null) {
        createTag($group_id, $name);
        $result = fetchTag($group_id, $name);
    }
    return $result;
}

function printTag(string $tag): string
{
    $tagData = explode(":", $tag);
    if($tagData[0] != null && $tagData[1] != null) {
        $group_id = (int)$tagData[0];
        $tag_id = (int)$tagData[1];
    }
    $result = "";
    global $pdo;

    try {
        $query = "SELECT * FROM tags WHERE tag_group_id = :group_id AND id= :id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':id', $tag_id);
        $stmt->execute();
        $query_result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
    if ($query_result != null) {
        $result = '<button type="button" class="btn btn-primary btn-sm">' . $query_result["tag_name"] . '</button>';
    }
    return $result;
}

/**
 * Deletes all data from the 'tags' table in the connected database by using the 'TRUNCATE' SQL command.
 */
function truncateTags(): void
{
    global $pdo;
    try {
        $query = "TRUNCATE TABLE tags";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error deleting table: " . $e->getMessage();
    }
}