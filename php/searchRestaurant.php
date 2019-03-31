<?php require_once('connection.php') ?>

<?php 
    $area_name = $_GET['area_name'];
    $type = $_GET['type'];
    $sql = "SELECT * FROM restaurants where location = '$area_name' and type LIKE '%$type%'";
    $results = mysqli_query($conn, $sql);
?>