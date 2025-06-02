<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "../session_init.php";
    require_once "../db_observations.php";
    require_once "../db_tags.php";

    $tag_name = "testing tag";
    $testing = [];


//    Generate tag if it doesn't exist


//  Fetch all observations
    $observations = fetchObservations();

    $ch = curl_init('https://dafryingpan.pythonanywhere.com/generate');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);

//    Assign the tag to each observation
    foreach ($observations as $observation) {
        $postData = http_build_query([
            'observations' => $observation['data']
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $testing['curl_error'] = 'ERROR: ' . curl_error($ch);
        } else  {
            $decodedResponse = json_decode($response, true);
            if (is_array($decodedResponse)) {
                $returned = $decodedResponse;
                foreach ($returned as $res) {
                    $tag = fetchTag((int)$_SESSION["data_variables"]["tag_group_id"], $res);
                    assignTag((int)$observation['id'], (int)$tag['tag_group_id'], (int)$tag['id']);
                }
            } else {
                $returned = 'unknown response';
            }
        }
        //
    }
    curl_close($ch);

    $testing["generate"] ="Generating placeholder tags...";
    $_SESSION["data_testing"] = $testing;

    header("location: ../../index.php");
}

die();