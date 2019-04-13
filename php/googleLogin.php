<?php 
    include_once ('includes/db.inc.php');
    include_once ('includes/users.inc.php');
    session_start();

    $email = $_POST['email'];

    $database = new DB();
    $conn = $database->getConnection();
    $users = new User($conn);
    $res = $users->googleLoginUser($email);
    $ss = json_decode($res, true);

    if($ss['status'] == 'success'){
        $_SESSION['name'] = $ss['name'];
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $ss['id'];
    }

    echo $res;

?>