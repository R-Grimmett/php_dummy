<?php

declare(strict_types=1);

require_once "includes/db_init.php";

$name_placeholder = "Observation Name";

$data_placeholder = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam libero lacus, congue ut fermentum 
    quis, gravida in nulla. Suspendisse sollicitudin nisl sed quam cursus aliquam. Duis eget feugiat ante. Curabitur 
    euismod ante orci, et ornare nunc commodo eu. Aliquam sed faucibus eros. Pellentesque non ipsum quam.';

$observation_none = '<div class="alert alert-primary mt-5" role="alert">
                        Set the Observation Count in Variable Setup to generate placeholder observations.
                    </div>';

/**
 * Generates a number of placeholder observations based on the number stored in $_SESSION['data_variables']['observation_count'].
 */
function displayObservations(): void
{
    global $name_placeholder, $data_placeholder, $observation_none;

    if (isset($_SESSION['data_variables']['observation_count']) && !isset($_SESSION['error_variables']['invalidCount'])) {
        $count = (int)$_SESSION['data_variables']['observation_count'];

        createObservation($name_placeholder, $data_placeholder);

    } else {
        echo $observation_none;
    }
}

function displayObservationControls(): void
{
    echo '<div class="col">
            <button type="submit" class="btn btn-primary" formaction="controller/observation/generate_tag.php">
                Generate AI Tags
            </button>
          </div>';

    echo '<div class="col">
            <button type="submit" class="btn btn-info" formaction="controller/observation/increment_observation_count.php">
                Add Observation
            </button>
          </div>';

    echo '<div class="col">
            <button type="submit" class="btn btn-warning" formaction="controller/observation/remove_tag.php">
                Remove all tags
            </button>
          </div>';

    echo '<div class="col">
            <button type="submit" class="btn btn-danger" formaction="includes/observation/remove_observation.php">
                Remove all observations
            </button>
          </div>';
}

function createObservation(string $name, string $data): void {
    try {
        require_once "includes/db_init.php";
//        require_once "includes/dbh.inc.php";

        $dsn = 'mysql:host=localhost;dbname=phpplaceholder';
        $dbusername = 'root';
        $dbpassword = '';

        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO observations (name, data) VALUES (:name, :data)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':data', $data);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        echo 'Unable to create observation: ' . $e->getMessage();
    }
}