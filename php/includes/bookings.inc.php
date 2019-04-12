<?php
class Booking{
 
    // database connection and table name
    private $conn;
    private $table_name = "bookings";
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    function showHistory($user_id){
        $sql = "SELECT b.id, b.date_time, b.no_of_guests, r.name, r.address FROM bookings b INNER JOIN restaurants r ON b.restaurant_id = r.id where b.user_id = $user_id";
        $results = $this->conn->query($sql);
        $dbdata = array();
        while($row = $results->fetch_assoc()) {
            $dbdata[] = $row;
        }
        return (json_encode($dbdata));
    }

    function getRestaurantName($restaurant_id){
        $sql = "SELECT name FROM restaurants WHERE id = $restaurant_id";
        $results = $this->conn->query($sql);
        $restaurant_name = $results->fetch_assoc()['name'];
        return $restaurant_name;
    }

    function processBooking($user_id, $res_id, $booking_date_time, $person_count){
        $sql = "insert into bookings(user_id, restaurant_id, date_time, no_of_guests) values ($user_id, $res_id, '$booking_date_time', $person_count)";
        // echo $sql
        $this->conn->query($sql);
        return json_encode(array('status'=>'success', 'message'=>'Restaurant Booked Successfully.'));
    }
 
}
?>