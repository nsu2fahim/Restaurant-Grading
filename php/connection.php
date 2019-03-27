<?php 
    $servername = "localhost";
    $username = "root";
    $password = "Qwert3201";
    $db = "restaurant_grader";
    
    $conn = mysqli_connect($servername, $username, $password, $db);
    
    if(!$conn){
        die("Connection Failed: " . mysqli_connect_error());
    }
?>