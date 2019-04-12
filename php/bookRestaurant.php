<?php //require_once('connection.php') ?>

<?php
    include_once ('includes/db.inc.php');
    include_once ('includes/bookings.inc.php');

    $restaurant_id = $_GET['res_id'];
    $database = new DB();
    $conn = $database->getConnection();
    $bookings = new Booking($conn);
    $restaurant_name = $bookings->getRestaurantName($restaurant_id);
    
    
    // $sql = "SELECT name FROM restaurants WHERE id = $restaurant_id";
    // $results = mysqli_query($conn, $sql);
    // $restaurant_name = mysqli_fetch_array($results)['name'];
?>