<?php require_once('connection.php') ?>


<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
    $res_id = $_POST['restaurant_id'];
    $booking_date_time = $_POST['booking_date_time'];
    $person_count = $_POST['person_count'];

    $sql = "insert into bookings(user_id, restaurant_id, date_time, no_of_guests) values ($user_id, $res_id, '$booking_date_time', $person_count)";
    // echo $sql
    mysqli_query($conn, $sql);
    echo json_encode(array('status'=>'success', 'message'=>'Restaurant Booked Successfully.'));
?>