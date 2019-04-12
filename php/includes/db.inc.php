<?php 
    class DB {
        private $server;
        private $user;
        private $pass;
        private $db;
        
        public function getConnection() {
            $this->server = "localhost";
            $this->user = "root";
            $this->pass = "Qwert3201";
            $this->db = "restaurant_grader";
            $conn = new mysqli($this->server, $this->user, $this->pass, $this->db);
            return $conn;
        }

    }

?>