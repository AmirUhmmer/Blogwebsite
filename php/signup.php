<?php
include ("conn.php");

class sign_up extends db_connect{
    public $username;
    public $password;
    public $password_verify;

    public function add_user($uname, $upass, $upass1){
        $con = $this->connect();
        $this->username = $uname;
        $this->password = $upass;
        $this->password_verify = $upass1;

        //verify password
        if($this->password == $this->password_verify){
            //verify if username exists
            $sql = "SELECT * FROM user_info WHERE username = '$this->username' LIMIT 1";
            $result = mysqli_query($con, $sql);
            if($result && mysqli_num_rows($result) > 0) {
                echo json_encode("error username");
            }
            else {
                $this->password = password_hash($upass1, PASSWORD_DEFAULT);
                $sql_add = $con->prepare("INSERT INTO user_info (username, u_password) VALUES (?, ?)");
                $sql_add->bind_param("ss", $this->username, $this->password);
        
                if ($sql_add->execute()) {
                    // Insertion was successful
                    echo json_encode("Success"); 
                  } else {
                    // There was an error
                    echo json_encode( "Error: " . $sql_add->error); 
                  }
                  
                $sql_add->close();
            }
        }
        else {
            echo json_encode("error password");
        }

        
        
    }
}