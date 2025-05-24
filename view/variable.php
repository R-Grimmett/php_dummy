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
    if (isset($_SESSION["data_variables"]["python_url"])) {
        echo '<div class="mb-3"><input class="form-control" type="text" name="python_url" placeholder="External Python Link" value="'
            . $_SESSION["data_variables"]["python_url"] . '"></div>';
    } else {
        echo '<div class="mb-3"><input class="form-control" type="text" name="python_url" placeholder="External Python Link" value=""></div>';
    }
    if (isset($_SESSION["data_variables"]["observation_count"]) && !isset($_SESSION["error_variables"]["invalidCount"])) {
        echo '<div class="mb-3"><input class="form-control" type="number" name="observation_count" placeholder="Observation Count" value="'
            . $_SESSION["data_variables"]["observation_count"] . '"></div>';
    } else {
        echo '<div class="mb-3"><input class="form-control" type="number" name="observation_count" placeholder="Observation Count" value=""></div>';
    }
    if (isset($_SESSION["data_variables"]["observation_id"]) && !isset($_SESSION["error_variables"]["invalidID"])) {
        echo '<div class="mb-3"><input class="form-control" type="number" name="observation_id" placeholder="Observation ID" value="'
            . $_SESSION["data_variables"]["observation_id"] . '"></div>';
    } else {
        echo '<div class="mb-3"><input class="form-control" type="number" name="observation_id" placeholder="Observation ID" value=""></div>';
    }
    if (isset($_SESSION["data_variables"]["tag_group_id"]) && !isset($_SESSION["error_variables"]["invalidID"])) {
        echo '<div class="mb-3"><input class="form-control" type="number" name="tag_group_id" placeholder="Tag Group ID" value="'
            . $_SESSION["data_variables"]["tag_group_id"] . '"></div>';
    } else {
        echo '<div class="mb-3"><input class="form-control" type="number" name="tag_group_id" placeholder="Tag Group ID" value=""></div>';
    }
    if (isset($_SESSION["data_variables"]["tag_id"]) && !isset($_SESSION["error_variables"]["invalidID"])) {
        echo '<div class="mb-3"><input class="form-control" type="number" name="tag_id" placeholder="Tag ID" value="'
            . $_SESSION["data_variables"]["tag_id"] . '"></div>';
    } else {
        echo '<div class="mb-3"><input class="form-control" type="number" name="tag_id" placeholder="Tag ID" value=""></div>';
    }


}