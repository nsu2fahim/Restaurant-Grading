<?php 
include_once "includes/db.inc.php";
include_once "includes/users.inc.php";
$database = new DB();
$db = $database->getConnection();
$user_id = 8;
$email = '96koushikroy@gmail.com';
$old_pass = '123456789';
$bookings = new User($db);
$res = $bookings->loginUser($email, $old_pass);
$ss = json_decode($res, true);
if($ss['status'] == 'success'){
    echo($ss['name'].' '.$ss['id'].' '.$ss['status']);
}
else{
    echo $ss['status'];
}

?>