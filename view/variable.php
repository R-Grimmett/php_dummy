<?php

declare(strict_types=1);

function checkVariableErrors(): void
{

    if (isset($_SESSION["error_variables"])) {
        $errors = $_SESSION["error_variables"];
        unset($_SESSION["error_variables"]);

        foreach ($errors as $error) {
            echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong>" . $error . "</div>";
        }
    }
}

function variableInput(): void
{
//    PYTHON URL
    echo '<div class="mb-3"><label for="python_url" class="form-label">External Python URL:</label>';
    if (isset($_SESSION["data_variables"]["python_url"])) {
        echo '<input class="form-control" type="text" name="python_url" id="python_url" placeholder="External Python Link" value="'
            . $_SESSION["data_variables"]["python_url"] . '">';
    } else {
        echo '<input class="form-control" type="text" name="python_url" id="python_url" placeholder="External Python Link" value="">';
    }

//    OBSERVATION COUNT
    echo '</div><div class="mb-3"><label for="observation_count" class="form-label">Number of Observations to Generate:</label>';
    if (isset($_SESSION["data_variables"]["observation_count"]) && !isset($_SESSION["error_variables"]["invalidCount"])) {
        echo '<input class="form-control" type="number" name="observation_count" id="observation_count" placeholder="Observation Count" value="'
            . $_SESSION["data_variables"]["observation_count"] . '">';
    } else {
        echo '<input class="form-control" type="number" name="observation_count" id="observation_count" placeholder="Observation Count" value="">';
    }

//    OBSERVATION ID
    echo '</div><div class="mb-3"><label for="observation_id" class="form-label">Initial Observation ID:</label>"';
    if (isset($_SESSION["data_variables"]["observation_id"]) && !isset($_SESSION["error_variables"]["invalidID"])) {
        echo '<input class="form-control" type="number" name="observation_id" id="observation_id" placeholder="Observation ID" value="'
            . $_SESSION["data_variables"]["observation_id"] . '">';
    } else {
        echo '<input class="form-control" type="number" name="observation_id" id="observation_id" placeholder="Observation ID" value="">';
    }

//    TAG GROUP ID
    echo '</div><div class="mb-3"><label for="tag_group_id" class="form-label">Tag Group ID:</label>';
    if (isset($_SESSION["data_variables"]["tag_group_id"]) && !isset($_SESSION["error_variables"]["invalidID"])) {
        echo '<input class="form-control" type="number" name="tag_group_id" id="tag_group_id" placeholder="Tag Group ID" value="'
            . $_SESSION["data_variables"]["tag_group_id"] . '">';
    } else {
        echo '<input class="form-control" type="number" name="tag_group_id" id="tag_group_id" placeholder="Tag Group ID" value="">';
    }

//    TAG ID
    echo '</div><div class="mb-3"><label for="tag_id" class="form-label">Tag ID:</label>';
    if (isset($_SESSION["data_variables"]["tag_id"]) && !isset($_SESSION["error_variables"]["invalidID"])) {
        echo '<input class="form-control" type="number" name="tag_id" id="tag_id" placeholder="Tag ID" value="'
            . $_SESSION["data_variables"]["tag_id"] . '">';
    } else {
        echo '<input class="form-control" type="number" name="tag_id" id="tag_id" placeholder="Tag ID" value="">';
    }
    echo '</div>';

}