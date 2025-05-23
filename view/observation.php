<?php

declare(strict_types=1);

$observation_card = '<div class="card mb-3">
                        <div class="row g-2">
                            <div class="card-body col-8">
                                <h5 class="card-title">Observation Title</h5>
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
                        Set the Observation Count above in Variable Setup to generate placeholder observations.
                    </div>';

function displayObservations(): void
{
    global $observation_card;
    global $observation_none;

    if (isset($_SESSION['data_variables']['observation_count']) && !isset($_SESSION['error_variables']['invalidCount'])) {
        $count = (int)$_SESSION['data_variables']['observation_count'];
        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {
                echo $observation_card;
            }
        }
    } else {
        echo $observation_none;
    }
}