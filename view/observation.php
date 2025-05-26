<?php

declare(strict_types=1);

$observation_card_1 = '<div class="card mb-3"><div class="row g-2"><div class="card-body col-8"><h5 class="card-title">';

$observation_card_2 = 'Observation Title</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam libero
                                    lacus, congue ut fermentum quis, gravida in nulla. Suspendisse sollicitudin nisl sed quam
                                    cursus aliquam. Duis eget feugiat ante. Curabitur euismod ante orci, et ornare nunc commodo
                                    eu. Aliquam sed faucibus eros. Pellentesque non ipsum quam.</p>
                            </div>
                            <div class="card-body col-4">
                                <h5 class="card-subtitle">Themes</h5>
                                <h5 class="card-subtitle">Tags</h5>
                            </div>
                        </div>
                    </div>';

$observation_none = '<div class="alert alert-primary mt-5" role="alert">
                        Set the Observation Count in Variable Setup to generate placeholder observations.
                    </div>';

/**
 * Generates a number of placeholder observations based on the number stored in $_SESSION['data_variables']['observation_count'].
 */
function displayObservations(): void
{
    global $observation_card_1, $observation_card_2, $observation_none;

    if (isset($_SESSION['data_variables']['observation_count']) && !isset($_SESSION['error_variables']['invalidCount'])) {
        $count = (int)$_SESSION['data_variables']['observation_count'];
        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {
                echo $observation_card_1 . ($i + 1) . " | " . $observation_card_2;
            }
        }
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
            <button type="submit" class="btn btn-danger" formaction="controller/observation/remove_observation.php">
                Remove all observations
            </button>
          </div>';
}