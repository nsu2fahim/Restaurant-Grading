<?php 
    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['email'])){
        $data = array(
            'status' => True
        );
        echo json_encode($data);
    }
    else{
        $data = array(
            'status' => False
        );
        echo json_encode($data);
    }

?>