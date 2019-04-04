<?php require_once('connection.php') ?>

<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "select full_name, email, phone from users where id = $user_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    echo json_encode($row);
?>