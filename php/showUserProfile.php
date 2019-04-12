<?php //require_once('connection.php') ?>

<?php 
    include_once ('includes/db.inc.php');
    include_once ('includes/users.inc.php');
    session_start();
    $user_id = $_SESSION['user_id'];
    $database = new DB();
    $conn = $database->getConnection();
    $users = new User($conn);
    $res = $users->showUserProfile($user_id);
    echo $res;
?>