<?php
class Restaurant{
 
    // database connection and table name
    private $conn;
    private $table_name = "restaurants";
 
    public function __construct($db){
        $this->conn = $db;
    }

    function getRecommendations($area_name, $type){
        $sql = "SELECT * FROM restaurants where location = '$area_name' and type LIKE '%$type%' order by rating desc";
        $results = $this->conn->query($sql);
        return ($results);
    }
 
 
}
?>