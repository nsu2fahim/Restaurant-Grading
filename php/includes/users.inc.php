<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    function changePassword($old_password, $new_password, $user_id){
        $sql = "select password from users where id = $user_id";
        // echo $sql;
        $result = $this->conn->query($sql);
        $old_pass_db = $result->fetch_assoc()['password'];
        if($old_pass_db != $old_password){
            return json_encode(array('status'=>'error', 'message'=>'Old password entered is incorrect.'));
        }
        else{
            $sql = "update users set password = '$new_password' where id = $user_id";
            $this->conn->query($sql);
            return json_encode(array('status'=>'success', 'message'=>'Password Changed Successfully.'));
        }
    }

    function showUserProfile($user_id){
        $sql = "select full_name, email, phone from users where id = $user_id";
        $res = $this->conn->query($sql);
        $row = $res->fetch_assoc();
        return json_encode($row);
    }

    function editUserProfile($name, $email, $phone, $user_id){
        $sql = "update users set full_name = '$name', email = '$email', phone = '$phone' where id = $user_id";
        $this->conn->query($sql);
        return json_encode(array('status'=>'success', 'message'=>'Profile Edited Successfully.'));
    }

    function loginUser($email, $password){
        $sql = "select * from users where email = '". $email . "'";
        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();
        
        if($result->num_rows > 0){
            if($row['email'] == $email && $row['password'] == md5($password)){

                $data = array(
                    'status' => 'success',
                    'email' => $email,
                    'name' => $row['full_name'],
                    'id' => $row['id']
                );
                
                return json_encode($data);
            }
            else{
                $data = array(
                    'status' => 'error',
                    'message' => 'Failed to login.'
                );
                return json_encode($data);
            }
        }
        else{
            $data = array(
                'status' => 'error',
                'message' => 'Failed to login.'
            );
            return json_encode($data);
        }
    }

    function registerUser($email, $username, $password, $phone){
        $sql_email = "SELECT * FROM users where email = '" . $email . "'";
        $res = $this->conn->query($sql_email);

        if($res->num_rows > 0){
            return json_encode(array('status'=>'error', 'message'=>'Email Aready Exists.'));
        }
        else{
            $sql = "INSERT INTO users(full_name, email, password, phone) VALUES ('$username','$email','$password', '$phone')";
            $this->conn->query($sql);
            return json_encode(array('status'=>'success', 'message'=>'Registered Successfully.'));
        }
    }

}
?>