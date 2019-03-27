<?php require_once('connection.php') ?>
<?php
    session_start();
    if(isset($_SESSION['email'])){
        $data = array(
            'status' => 'success',
            'email' => $_SESSION['email'],
            'name' => $_SESSION['name']
        );
        echo json_encode($data);
    }
    else{
        $email =    $_POST['email'];
        $password = $_POST['password'];

        $email = stripcslashes($email);
        $password = stripcslashes($password);

        $email = mysqli_real_escape_string($email);
        $password = mysqli_real_escape_string($password);

        //query
        $result = mysqli_query("select * from users where email = '". $email . "'")
            or die ("Failed to query database ".mysqli_error());

        $row = mysqli_fetch_array($result);

        if($row['email'] == $email && $row['password'] == md5($password)){
            $data = array(
                'status' => 'success',
                'email' => $email,
                'name' => $row['full_name']
            );
            echo json_encode(data);
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Failed to login.'
            );
            echo json_encode($data);
        }
    }
    

?>
