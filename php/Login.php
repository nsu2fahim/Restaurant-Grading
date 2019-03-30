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
        
        //query
        $result = mysqli_query($conn, "select * from users where email = '". $email . "'")
            or die ("Failed to query database ".mysqli_error());

        $row = mysqli_fetch_array($result);
        
        if(mysqli_num_rows($result) > 0){
            if($row['email'] == $email && $row['password'] == md5($password)){
                $data = array(
                    'status' => 'success',
                    'email' => $email,
                    'name' => $row['full_name']
                );
                $_SESSION['name'] = $row['full_name'];
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $row['id'];
                echo json_encode($data);
            }else{
                $data = array(
                    'status' => 'error',
                    'message' => 'Failed to login.'
                );
                echo json_encode($data);
            }
        }
        else{
            $data = array(
                'status' => 'error',
                'message' => 'Failed to login.'
            );
            echo json_encode($data);
        }
    }
    

?>
