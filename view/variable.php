<?php

declare(strict_types=1);

function variableInput() : void
{
    echo '<div class="mb-3"><input class="form-control" type="text" name="python_url" placeholder="External Python Link" value=""></div>';
    echo '<div class="mb-3"><input class="form-control" type="number" name="observation_count" placeholder="Observation Number" value=""></div>';
}