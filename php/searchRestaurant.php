<?php //require_once('connection.php') ?>

<?php
    include_once ('includes/db.inc.php');
    include_once ('includes/restaurants.inc.php'); 
    
    $area_name = $_GET['area_name'];
    $type = $_GET['type'];

    $database = new DB();
    $conn = $database->getConnection();
    $restaurants = new Restaurant($conn);
    $results = $restaurants->getRecommendations($area_name, $type);

?>