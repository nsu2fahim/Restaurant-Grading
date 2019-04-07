<?php 
    //li.blocked__content__body__grid__item
    $restaurant_link = $_GET['res_link'];
    $path = parse_url($restaurant_link, PHP_URL_PATH);
    $tok = strtok($path, "/");
    $restaurant = '';
    while ($tok !== false) {
        $restaurant = $tok;
        $tok = strtok("/");
    }
    $api = 'http://api.harriken.com/api/v4/outlet/'.$restaurant.'/reviews';
    $response = file_get_contents($api);
    $response = json_decode($response);
    $response = json_encode($response, JSON_UNESCAPED_SLASHES);
    echo($response);
?>