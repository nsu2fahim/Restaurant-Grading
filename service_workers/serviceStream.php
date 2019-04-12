<?php 
    header('Cache-Control: no-cache');
    header("Content-Type: text/event-stream\n\n");
    session_start();

    if(isset($_SESSION['name']) && isset($_SESSION['email'])){
        echo "event: push\n";
        $name = $_SESSION['name'];
        echo "data: $name\n\n";
        echo "retry: 10000\n";
        ob_flush();
    }
    
    
?>