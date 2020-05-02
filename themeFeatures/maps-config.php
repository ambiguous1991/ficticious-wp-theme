<?php
include 'API_KEYS.php';

function register_map_api_key ($api) {
    global $GOOGLE_MAPS_API_KEY;

    $api['key'] = $GOOGLE_MAPS_API_KEY;
    return $api;
}

add_filter('acf/fields/google_map/api', 'register_map_api_key');