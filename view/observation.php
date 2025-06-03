<?php

declare(strict_types=1);

require "includes/db_observations.php";

$observation_none = '<div class="alert alert-primary mt-5" role="alert">
                        Set the Observation Count in Variable Setup to generate placeholder observations.
                    </div>';

function displayObservations(): void
{
    global $observation_none;

    if (isset($_SESSION['data_variables']['observation_count']) && !isset($_SESSION['error_variables']['invalidCount'])) {
        $observations = fetchObservations();
        foreach ($observations as $observation) {
            echo '<div class="card mb-3"><div class="row g-2"><div class="card-body col-8"><h5 class="card-title">'
                . $observation['id'] . ' | ' . $observation['name'] . '</h5><p class="card-text">' . $observation['data'] .
                '</p></div><div class="card-body col-4"><div class="row mb-3"><h5 class="card-subtitle">Themes</h5></div>' .
                '<div class="row mb-3"><h5 class="card-subtitle">Tags</h5></div><div class="row row-cols-2 mb-3">' .
                fetchTagString((int)$observation['id']) . '</div></div></div></div>';
        }

    } else {
        echo $observation_none;
    }
}

function displayObservationControls(): void
{
    echo '<div class="col">
            <button type="submit" class="btn btn-primary" formaction="includes/observation/generate_tag.php">
                Generate AI Tags
            </button>
          </div>';

    echo '<div class="col">
            <button type="submit" class="btn btn-info" formaction="includes/observation/increment_observation_count.php">
                Add Observation
            </button>
          </div>';

    echo '<div class="col">
            <button type="submit" class="btn btn-warning" formaction="includes/observation/remove_tag.php">
                Remove all tags
            </button>
          </div>';

    echo '<div class="col">
            <button type="submit" class="btn btn-danger" formaction="includes/observation/remove_observation.php">
                Remove all observations
            </button>
          </div>';
}

