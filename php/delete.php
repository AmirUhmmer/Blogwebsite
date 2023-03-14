<?php
include ("conn.php");

class delete_post extends db_connect{
    public $id;

    public function delete_in_db($id){
        $con = $this->connect();
        $this->id = $id;

        $sql_del = "SELECT * FROM posts WHERE id = '$this->id'";
            $res = mysqli_query($con, $sql_del);
            
            if (mysqli_num_rows($res) > 0) {
              while($row_data = mysqli_fetch_array($res)){
                unlink('../'.$row_data['picture']);
                echo $row_data['picture'];
              }
            }
    
        $sql = $con->prepare("DELETE FROM posts WHERE id=?");
        $sql->bind_param("s", $this->id);

        if ($sql->execute()) {
            // Insertion was successful
            
          } else {
            // There was an error
            echo "Error: " . $sql->error;
          }
        $sql->close();
    }
}