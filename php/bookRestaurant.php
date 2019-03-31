<?php require_once('connection.php') ?>

<?php
    $restaurant_id = $_GET['res_id'];
    $sql = "SELECT name FROM restaurants WHERE id = $restaurant_id";
    $results = mysqli_query($conn, $sql);
    $restaurant_name = mysqli_fetch_array($results)['name'];
?>