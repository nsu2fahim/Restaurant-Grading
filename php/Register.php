<?php //require_once('connection.php') ?>
<?php
    include_once ('includes/db.inc.php');
    include_once ('includes/users.inc.php');
    
    session_start();
    
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $password = md5($password); // hash password before storing for security purpose

    $database = new DB();
    $conn = $database->getConnection();
    $users = new User($conn);
    $res = $users->registerUser($email, $username, $password, $phone);
    echo $res;

    // $sql_email = "SELECT * FROM users where email = '" . $email . "'"; 
    // $res = mysqli_query($conn, $sql_email);

    // if(mysqli_num_rows($res) > 0){
    //     echo json_encode(array('status'=>'error', 'message'=>'Email Aready Exists.'));
    // }
    // else{
    //     $sql = "INSERT INTO users(full_name, email, password, phone) VALUES ('$username','$email','$password', '$phone')";
    //     mysqli_query($conn, $sql);
    //     echo json_encode(array('status'=>'success', 'message'=>'Registered Successfully.'));
    // }

    
?>