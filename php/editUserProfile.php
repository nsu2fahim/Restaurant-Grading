<?php //require_once('connection.php') ?>

<?php
    include_once ('includes/db.inc.php');
    include_once ('includes/users.inc.php'); 
    session_start();
    
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    $database = new DB();
    $conn = $database->getConnection();
    $users = new User($conn);
    $res = $users->editUserProfile($name, $email, $phone, $user_id);
    echo $res;
    
    // $sql = "update users set full_name = '$name', email = '$email', phone = '$phone' where id = $user_id";
    // mysqli_query($conn, $sql);
    // echo json_encode(array('status'=>'success', 'message'=>'Profile Edited Successfully.'));
?>