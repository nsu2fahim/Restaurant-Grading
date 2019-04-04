<?php require_once('connection.php') ?>
<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
    $old_password = md5($_POST['cur_pass']);
    $new_password = md5($_POST['new_pass']);

    $sql = "select password from users where id = $user_id";
    $result = mysqli_query($conn, $sql);
    $old_pass_db = mysqli_fetch_array($result, MYSQLI_ASSOC)['password'];
    if($old_pass_db != $old_password){
        echo json_encode(array('status'=>'error', 'message'=>'Old password entered is incorrect.'));
    }
    else{
        $sql = "update users set password = '$new_password' where id = $user_id";
        $result = mysqli_query($conn, $sql);
        echo json_encode(array('status'=>'success', 'message'=>'Password Changed Successfully.'));
    }
?>