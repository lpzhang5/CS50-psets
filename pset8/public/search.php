<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    // search database for places matching $_GET["geo"]   
    $places = query("SELECT * FROM places WHERE MATCH(place_name, admin_name1, postal_code) AGAINST(?)", $_GET["geo"]);   

    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>
