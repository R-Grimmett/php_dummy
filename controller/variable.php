<?php

declare(strict_types=1);

/**
 * Checks if the provided variables are empty and returns true if they are. Otherwise returns false.
 * @param string $python_url
 * @param string $observation_count
 * @return bool True if any of the provided variables are empty according to the empty() function. Otherwise returns false.
 */
function isInputEmpty(string $python_url, string $observation_count) : bool {
    if(empty($python_url) || empty($observation_count)){
        return true;
    }
    return false;
}

/**
 * Checks if $observation_count is valid by ensuring it is a number greater than 0. Returns true if it is.
 * @param int $observation_count
 * @return bool Returns true if $observation_count is greater than 0, otherwise returns false.
 */
function isCountValid(int $observation_count) : bool {
    if($observation_count > 0){
        return true;
    }
    return false;
}