<?php

declare(strict_types=1);

require "includes/db_observations.php";

$observation_none = '<div class="alert alert-primary mt-5" role="alert">
                        Set the Observation Count in Variable Setup to generate placeholder observations.
                    </div>';

/**
 * Generates a number of placeholder observations based on the number stored in $_SESSION['data_variables']['observation_count'].
 */
function displayObservations(): void
{
    global $observation_none;

    if (isset($_SESSION['data_variables']['observation_count']) && !isset($_SESSION['error_variables']['invalidCount'])) {
        $count = (int)$_SESSION['data_variables']['observation_count'];

        createObservation("", "");

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
            <button type="submit" class="btn btn-info" formaction="includes/observation/increment_observation_count.php">
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

