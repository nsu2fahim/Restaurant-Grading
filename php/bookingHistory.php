<?php require_once('connection.php') ?>


<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT b.id, b.date_time, b.no_of_guests, r.name, r.address FROM bookings b INNER JOIN restaurants r ON b.restaurant_id = r.id where b.user_id = $user_id";
    $results = mysqli_query($conn, $sql);
    $dbdata = array();
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
        $dbdata[] = $row;
    }
    echo (json_encode($dbdata));


?>