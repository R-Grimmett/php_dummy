<?php

declare(strict_types=1);

require "model/Observation.php";

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
        $init_id = (int)$_SESSION['data_variables']['observation_id'];
        $start = 0;
        $observations = [];

//        Fetch existing observations
        if(isset($_SESSION['data_variables']['observations'])) {
            $observations = $_SESSION['data_variables']['observations'];
            if(count($observations) != $count) {
                $start = count($observations);
            }
        }

//      Generate new observations if required
        if ($count > $start) {
            for ($i = $start; $i < $count; $i++) {
                $new_observation = new Observation($i + $init_id, $name_placeholder, $data_placeholder, []);
                array_push($observations, $new_observation->store());
            }
        }

        $_SESSION['data_variables']['observations'] = $observations;

        foreach ($observations as $observation) {
            if(empty($observation['tags'])) {
                $observation['tags'] = [];
            }
            $current = new Observation($observation['id'], $observation['name'], $observation['data'], $observation['tags']);
            $current->render();
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