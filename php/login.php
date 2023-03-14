<?php
include ("conn.php");

class login extends db_connect{
    public $username;
    public $password;

    public function login_user($uname, $upass){
        $con = $this->connect();
        $this->username = mysqli_real_escape_string($con, $uname);
        $this->password = mysqli_real_escape_string($con, $upass);

        $sql = "SELECT * FROM user_info WHERE username = '$this->username' LIMIT 1";
        $result = mysqli_query($con, $sql);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            $hashed_password = $user_data['u_password'];

            if (password_verify($this->password, $hashed_password)) {
                $_SESSION['username'] = $user_data['username'];
                echo json_encode($user_data['username']);
            } else {
                echo json_encode("error");
            }
        }
        else {
            echo json_encode("error");
        }
    }
}
